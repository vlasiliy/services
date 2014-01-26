<?php
/* @var $this MainController */
/* @var $model Project */
/* @var $form CActiveForm */
//echo '<pre>';print_r($model);
?>
<div id="contentController">

    <div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'project-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
    )); ?>
            <h6  class="underline"><?php echo Yii::t('app', 'Values');?></h6>
            
            <p class="note"><?php echo Yii::t('app', 'Fields with * are required.')?></p>

            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                    <label><?php echo Yii::t('UserModule.user', 'User');?></label>
                    <div class="textForm">
                        <a href="#"><?php echo $model->user->name.' '.$model->user->surname;?></a>
                    </div>
            </div>

            <div class="row">
                    <label><?php echo Yii::t('CategoryModule.category', 'Category');?></label>
                    <div class="textForm">
                        <?php echo $model->category->name;?>    
                    </div>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'name'); ?>
                    <?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>256)); ?>
                    <?php echo $form->error($model,'name'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'date_finished'); ?>
                    <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                                    $this->widget('CJuiDateTimePicker',
                                                            array(
                                                                'model'=>$model,
                                                                'attribute'=> 'date_finished',
                                                                'mode'=>'datetime',
                                                                'options'=>array(
                                                                    'dateFormat'=>'yy-mm-dd',
                                                                    'timeFormat' => 'hh:mm:ss',
                                                                )
                                                    ));
                                            ?>
                    <?php echo $form->error($model,'date_finished'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'price'); ?>
                    <?php echo $form->textField($model,'price',array('size'=>20,'maxlength'=>10)); ?>
                    <?php echo $form->error($model,'price'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'currency'); ?>
                    <?php echo $form->textField($model,'currency',array('size'=>0,'maxlength'=>0)); ?>
                    <?php echo $form->error($model,'currency'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'unit'); ?>
                    <?php echo $form->textField($model,'unit',array('size'=>32,'maxlength'=>32)); ?>
                    <?php echo $form->error($model,'unit'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'description'); ?>
                    <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
                    <?php echo $form->error($model,'description'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'sort'); ?>
                    <?php echo $form->textField($model,'sort',array('size'=>10,'maxlength'=>10)); ?>
                    <?php echo $form->error($model,'sort'); ?>
            </div>

            <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
            </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>