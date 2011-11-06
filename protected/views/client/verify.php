<h1>Enter Verfication Code</h1>

<p>Please the access code sent to your phone below.

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'verify-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'auth_code',array('size'=>20,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'auth_code'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Get Access'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</p>
