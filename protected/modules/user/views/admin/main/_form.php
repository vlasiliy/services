<?php
/* @var $this MainController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div id="contentController">

    <div class="form crtUpdFrm">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
    )); ?>

            <p class="note"><?php echo Yii::t('app', 'Fields with * are required.')?></p>

            <?php echo $form->errorSummary($model); ?>

            <table class="detail-view">
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'role'); ?>
                    </td>
                    <td>
                        <?php echo $form->dropDownList($model,'role',User::model()->getRoles()); ?>
                        <?php echo $form->error($model,'role'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'email'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'email',array('size'=>32,'maxlength'=>128)); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'password'); ?>
                    </td>
                    <td>
                        <?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32, 'value' => '')); ?>
                        <?php echo $form->error($model,'password'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'nick'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'nick',array('size'=>32,'maxlength'=>16)); ?>
                        <?php echo $form->error($model,'nick'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'name'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'surname'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'surname',array('size'=>32,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'surname'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'sex'); ?>
                    </td>
                    <td>
                        <?php echo $form->dropDownList($model,'sex', array('1' => Yii::t("UserModule.user", 'male'), '0' => Yii::t("UserModule.user", 'women'))); ?> 
                        <?php echo $form->error($model,'sex'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'company'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'company',array('size'=>32,'maxlength'=>128)); ?>
                        <?php echo $form->error($model,'company'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'city'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'city',array('size'=>32,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'city'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'postcode'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'postcode',array('size'=>16,'maxlength'=>16)); ?>
                        <?php echo $form->error($model,'postcode'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'address'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'address',array('size'=>32,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'address'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'tel1'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'tel1',array('size'=>16,'maxlength'=>16)); ?>
                        <?php echo $form->error($model,'tel1'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'tel2'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'tel2',array('size'=>16,'maxlength'=>16)); ?>
                        <?php echo $form->error($model,'tel2'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'site'); ?>                        
                    </td>
                    <td>
                        <?php echo $form->textField($model,'site',array('size'=>32,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'site'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'skype'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'skype',array('size'=>32,'maxlength'=>32)); ?>
                        <?php echo $form->error($model,'skype'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'icq'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'icq',array('size'=>10,'maxlength'=>10)); ?>
                        <?php echo $form->error($model,'icq'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'lat'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'lat'); ?>
                        <?php echo $form->error($model,'lat'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'lng'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'lng'); ?>
                        <?php echo $form->error($model,'lng'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'date_create'); ?>
                    </td>
                    <td>
                        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('CJuiDateTimePicker',
                                        array(
                                            'model'=>$model,
                                            'attribute'=> 'date_create',
                                            'mode'=>'datetime',
                                            'options'=>array(
                                                'dateFormat'=>'yy-mm-dd',
                                                'timeFormat' => 'hh:mm:ss',
                                            )
                                ));
                        ?>
                        <?php echo $form->error($model,'date_create'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'date_update'); ?>
                    </td>
                    <td>
                        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('CJuiDateTimePicker',
                                        array(
                                            'model'=>$model,
                                            'attribute'=> 'date_update',
                                            'mode'=>'datetime',
                                            'options'=>array(
                                                'dateFormat'=>'yy-mm-dd',
                                                'timeFormat' => 'hh:mm:ss',
                                            )
                                ));
                        ?>
                        <?php echo $form->error($model,'date_update'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'date_last_visit'); ?>
                    </td>
                    <td>
                        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('CJuiDateTimePicker',
                                        array(
                                            'model'=>$model,
                                            'attribute'=> 'date_last_visit',
                                            'mode'=>'datetime',
                                            'options'=>array(
                                                'dateFormat'=>'yy-mm-dd',
                                                'timeFormat' => 'hh:mm:ss',
                                            )
                                ));
                        ?>
                        <?php echo $form->error($model,'date_last_visit'); ?>
                    </td>
                </tr>
            </table>


            <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')); ?>
            </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->

</div>