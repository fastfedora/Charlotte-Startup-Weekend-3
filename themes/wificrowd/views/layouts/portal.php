<?php
$portal = Portal::model()->findByPk($_GET['portal_id']);
?>
<!DOCTYPE html> <!-- The new doctype -->
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>WiFi Crowd: <?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php
        if ($this->getAction()->getId() == "verified")
        {
            echo '<meta http-equiv="refresh" content="5;url=' . $portal->landing_url . '">';
        }
    ?>
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
    <!-- Internet Explorer HTML5 enabling code: -->
    
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    
    <style type="text/css">
    .clear {
      zoom: 1;
      display: block;
    }
    </style>

    
    <![endif]-->
</head>

<body class="portal" style="background: url(<?php echo Yii::app()->createUrl("portal/getBackground", array("id"=>$portal->id)) ?>)">
    
    <div class="logoBar">
        <a href="/"><img id="logo" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-small.png" /></a>
    </div>
    
    <div class="portalBox">
        <div class="title">Welcome to <?php echo $portal->title; ?></div>

        <div class="portalContent">
        <?php echo $content; ?>
        </div>
    </div>
    
    <div class="portalSponsors">
    
        <?php 
            foreach ($portal->sponsors as $sponsor) 
            {
                if ($sponsor->name == 'Microsoft')
                {
                    echo '<a href="#" onClick="shadowBox()">';
                }
                else if ($sponsor->url)
                {
                    echo '<a href="' . $sponsor->url . '" title="' . $sponsor->name . '" target="_blank">';
                }
                
                echo '<img class="sponsor" src="' . Yii::app()->createUrl("sponsor/getLogo", array("id"=>$sponsor->id)) . '" />';
                
                if ($sponsor->url)
                {
                    echo '</a>';
                }
            }
        ?>
    </div>
</body>
</html>
