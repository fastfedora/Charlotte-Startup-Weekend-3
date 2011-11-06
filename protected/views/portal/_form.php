<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'portal-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

	<?php echo $form->errorSummary($model); ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'background'); ?>
        <?php echo CHtml::activeFileField($model, 'background'); ?>
		<?php echo $form->error($model,'background'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'auth_message'); ?>
		<?php echo $form->textField($model,'auth_message',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'auth_message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'landing_url'); ?>
		<?php echo $form->textField($model,'landing_url',array('size'=>60,'maxlength'=>2048)); ?>
		<?php echo $form->error($model,'landing_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->