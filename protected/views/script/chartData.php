<?php
$rows = Yii::app()->db->createCommand()
            ->select('YEAR( view_time ) AS data_year, MONTH( view_time ) AS data_month, DAY( view_time ) AS data_day, COUNT( * ) AS data_value')
            ->from('tbl_sponsor_view')
            ->join('tbl_sponsor', 'tbl_sponsor.id=tbl_sponsor_view.sponsor_id')
            ->join('tbl_bar', 'tbl_bar.id=tbl_sponsor.bar_id')
            ->join('tbl_user', 'tbl_user.id=tbl_bar.user_id')
            ->where('tbl_user.id=:id AND DATEDIFF(NOW(),tbl_sponsor_view.view_time) <= 30', array(':id'=>Yii::app()->user->id))
            ->group('YEAR( view_time ) , MONTH( view_time ) , DAY( view_time )')
            ->queryAll();

$date = new DateTime();

date_modify($date, '-30 day');

// initialize the array
for ($i = 0; $i < 30; $i++)
{
    $key        = $date->format('m-d');
    $data[$key] = rand (0, 400);

    date_modify($date, '+1 day');
}            

// insert the data            
foreach ($rows as $row)
{
    $key        = $row['data_month'] . '-' . $row['data_day'];
    $data[$key] = $row['data_value'];
}

// format for the chart            
$values = '';
$labels = '';
$count = 0;
            
foreach ($data as $key => $value)
{
    if ($count > 0)
    {
        $values .= ",";
        $labels .= ",";
    }
    
    $labels .= '"' . $key . '"';
    $values .= $value;
    
    $count++;
}
?>
{
  "title":{
    "text":  "Past 30 Days",
    "style": "{font-size: 20px; color:#0F729E; font-family: Verdana; text-align: center;}"
  },
 
  "y_legend":{
    "text": "# Views",
    "style": "{color: #000000; font-size: 12px;}"
  },
 
  "elements":[
    {
      "type":      "line",
      "alpha":     0.5,
      "colour":    "#9F79EE",
      "text":      "Views",
      "font-size": 10,
      "values" :   [<?php echo $values ?>]
    }
  ],
 
  "x_axis":{
    "stroke":1,
    "set_vertical":true,
    "tick_height":10,
    "colour":"#000000",
    "grid_colour":"#000000",
    "labels": {
        "rotate": 270,
        "labels": [<?php echo $labels ?>]
    }
   },
 
  "y_axis":{
    "stroke":      1,
    "tick_length": 3,
    "colour":      "#000000",
    "grid_colour": "#000000",
    "offset":      1,
    "max":         400
  }
}