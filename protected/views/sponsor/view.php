<h1>View Sponsor</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'url',
		'status',
		'logo',
	),
)); ?>
