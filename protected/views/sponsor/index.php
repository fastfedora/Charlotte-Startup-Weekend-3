<?php
$this->breadcrumbs=array(
	'My Portals'=>array('portal/index'),
	'Sponsors',
);

$this->menu=array(
	array('label'=>'Create Sponsor', 'url'=>Yii::app()->createUrl('sponsor/create', array('portal_id'=>$_GET['portal_id'])))
);
?>

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
        ),
		'name',
		'url',
		array(
			'class'=>'CButtonColumn',
            'buttons'=>array
            (
                'update' => array
                (
                    'url'=>'Yii::app()->createUrl("sponsor/update", array("portal_id"=>$_GET["portal_id"], "id"=>$data->id))'
                )
            )
		),
	),
)); ?>
