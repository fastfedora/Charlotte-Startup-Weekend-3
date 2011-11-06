<?php
$this->breadcrumbs=array(
	'My Portals'=>array('portal/index'),
	'Sponsors'=> Yii::app()->request->baseUrl."/index.php?r=sponsor/index&portal_id=".$_GET['portal_id'],
	'Create Sponsor',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>