<?php
$this->breadcrumbs=array(
	'Portals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Portal', 'url'=>array('index')),
	array('label'=>'Create Portal', 'url'=>array('create')),
	array('label'=>'Update Portal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Portal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Portal', 'url'=>array('admin')),
);
?>

<h1>View Portal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id'
	),
)); ?>
