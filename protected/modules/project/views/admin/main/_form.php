<?php
/* @var $this MainController */
/* @var $model Project */
/* @var $form CActiveForm */
//echo '<pre>';print_r($model);
?>
<div id="contentController">

    <h6  class="underline"><?php echo Yii::t('app', 'Values');?></h6>
    
    <div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'project-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
    )); ?>
            <?php echo $form->hiddenField($model, 'user_id'); ?>
            <?php echo $form->hiddenField($model, 'category_id'); ?>
            <?php echo $form->hiddenField($model, 'sort'); ?>
        
            <p class="note"><?php echo Yii::t('app', 'Fields with * are required.')?></p>

            <?php echo $form->errorSummary($model); ?>

            <table class="detail-view">
                <tr class="even">
                    <td class="label">
                        <label><?php echo Yii::t('UserModule.user', 'User');?> *</label>
                    </td>
                    <td>
                        <?php echo CHtml::link($model->user->name.' '.$model->user->surname, '/admin/user/main/update/id/'.$model->user_id);?>
                    </td>
                </tr>

                <tr class="odd">
                    <td class="label">
                        <label><?php echo Yii::t('CategoryModule.category', 'Category');?> *</label>
                    </td>
                    <td>
                        <?php echo $model->category->name;?>    
                    </td>
                </tr>

                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'name'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'name',array('size'=>52,'maxlength'=>256)); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </td>
                </tr>

                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'date_finished'); ?>
                    </td>
                    <td>
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
                    </td>
                </tr>
                
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'price'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'price',array('size'=>20,'maxlength'=>10)); ?>
                        <?php echo $form->error($model,'price'); ?>
                    </td>
                </tr>

                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'currency'); ?>
                    </td>
                    <td>
                        <?php echo $form->dropDownList($model, 'currency', array_combine(Yii::app()->params['currency'], Yii::app()->params['currency'])); ?>
                        <?php echo $form->error($model,'currency'); ?>
                    </td>
                </tr>

                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'unit'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'unit',array('size'=>20,'maxlength'=>32)); ?>
                        <?php echo $form->error($model,'unit'); ?>
                    </td>
                </tr>
                
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'description'); ?>
                    </td>
                    <td>
                        <?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
                            'model' => $model,
                            'attribute' => 'description',
                            'toolbar' => Yii::app()->params['toolBarAdminUserData'],
                        ));?>
                        <?php echo $form->error($model,'description'); ?>
                    </td>
                </tr>
            </table>

            <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')); ?>
            </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->
    
    <h6 class="underline" style="position: relative;">
        <?php echo Yii::t('ProjectModule.project', 'Photos')?>
        <?php echo CHtml::link(Yii::t('app', 'Add'), $this->createUrl('/'), array('class' => 'butLink', 'id' => "addPhoto", 'onclick' => 'return false;'));?>
        <?php $this->widget('application.extensions.EAjaxUpload.EAjaxUpload',
        array(
                'id'=>'uploadFile',
                'config'=>array(
                       'action' => Yii::app()->createUrl('/admin/project/main/upload/id/'.$model->id),
                       'allowedExtensions' => array("jpg", "png", "gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
                       'sizeLimit' => 2*1024*1024,// maximum file size in bytes
                       //'minSizeLimit' => 0,1*1024*1024,// minimum file size in bytes
                       'onComplete'=>"js:function(id, fileName, responseJSON){"
                            ."
                                fullName = '/users/".$model->id."/tmp/'+responseJSON.filename+'?".md5(time())."';
                                im = document.getElementById('imageId');
                                im.onload = function(){
                                    $('#imageHeightId').val(responseJSON.height);
                                    $('#imageWidthId').val(responseJSON.width).change();                                                
                                }
                                im.src = fullName;
                            "
                            ."}",
                       'messages'=>array(
                                         'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                         'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                         'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                         'emptyError'=>"{file} is empty, please select files again without it.",
                                         'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                        ),
                       'showMessage'=>"js:function(message){ alert(message); }"
                      )
        )); ?>
    </h6>
    
    <?php print_r($photos);?>
    
    <h6  class="underline"><?php echo Yii::t('ProjectModule.project', 'Videos')?></h6>
    
</div>