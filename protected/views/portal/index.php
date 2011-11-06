<?php
$this->breadcrumbs=array(
	'My Portals'=>array('index')
);

$this->menu=array(
	array('label'=>'Create Portal', 'url'=>array('create')),
);

?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'portal-grid',
	'dataProvider'=>$model->search(),
    'summaryText'=>'',
    'filterPosition'=>'',
	'columns'=>array(
        'title',
		array(
			'class'=>'CButtonColumn',
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>'Yii::app()->createUrl("sponsor/index", array("portal_id"=>$data->id))',
                )
            )
		),
	),
)); ?>
