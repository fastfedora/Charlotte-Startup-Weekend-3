<div id="toolbar">
    <a href="<?php echo $url=$this->createUrl("sponsor/create"); ?>">Add a New Sponsor</a>
</div>

<?php 
$app = $this;
//'value'=>'CHtml::image($app->createUrl("sponsor/getLogo", array("id"=>$data->id)), $data->name)'

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sponsor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'summaryText'=>'',
    'filterPosition'=>'',
	'columns'=>array(
        array(
            'name'=>'logo',
            'type'=>'image',
            'value'=>'Yii::app()->request->baseUrl."/index.php?r=sponsor/getLogo&id=".$data->id',
            'cssClassExpression'=>'logo'
        ),
		'name',
		'url',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
