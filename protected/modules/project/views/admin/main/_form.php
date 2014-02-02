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
    
    <h6 class="underline ttl6">
        <?php echo Yii::t('ProjectModule.project', 'Photos')?>
        <div class="btnBlock6">
            <?php $this->widget('application.extensions.EAjaxUpload.EAjaxUpload',
            array(
                    'id'=>'uploadFile',
                    'config'=>array(
                           'action' => Yii::app()->createUrl('/admin/project/main/upload/id/'.$model->id),
                           'allowedExtensions' => array("jpg", "png", "gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
                           'sizeLimit' => Yii::app()->params['imageMaxSize'] * 1024 * 1024,// maximum file size in bytes
                           //'minSizeLimit' => 0,1*1024*1024,// minimum file size in bytes
                           'onComplete'=>"js:function(id, fileName, responseJSON){"
                                ."
                                    if(responseJSON.success)
                                    {
                                        fullName = '/users/".$model->user->nick."/tmp/'+responseJSON.filename+'?".md5(time())."';
                                        im = document.getElementById('imageId');
                                        im.onload = function(){
                                            $('#imageHeightId').val(responseJSON.height);
                                            $('#imageWidthId').val(responseJSON.width).change();
                                        }
                                        im.src = fullName;
                                    }
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
        </div>    
    </h6>
    
        <?php 
            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                'id' => 'imgCropDialog',
                'options' => array(
                    'open' => 'js:function(event, ui) {'.
                            '$("#imgCropDialog").parent().find(".ui-dialog-titlebar-close").hide();'.
                        '}',
                    'title' => Yii::t('app', 'Crop image'),
                    'autoOpen' => false,
                    'modal' => true,
                    'resizable'=> false,
                    //'height' => 400,
                    'draggable' => false,
                    'width' => 500,
                    'closeOnEscape' => false,
                    'buttons' => array(
                            array('text'=>'Ok','click'=> 'js:function(){$(this).dialog("close");cropAjax();}'),
                        ),
                ),
            ));

            //кроп рисунка
            $this->widget('ext.Jcrop.Jcrop',array(
                'startImg' => '/img/upload.gif',
                'idImg' => 'imageId',
                'idWidthImg' => 'imageWidthId',
                'idHeightImg' => 'imageHeightId',
                'htmlWidthImg' => 470,
                'scriptOpenDialog' => "$('#imgCropDialog').dialog('open');",
            ));
        ?>    
            <input type="text" />
        <?php    
            $this->endWidget('zii.widgets.jui.CJuiDialog');
        ?>

        <script type="text/javascript">
            function cropAjax(){
                filename = $("#imageId").attr('src').split('/').pop().split('?').shift();
                dataCrop = "projectId=<?php echo $model->id;?>&filename="+filename+"&width="+$('#w').val()+"&height="+$('#h').val()+"&x="+$('#x1').val()+"&y="+$('#y1').val();
                $.ajax({
                  url: "/admin/project/main/cropPhoto",
                  type: "post",
                  data: dataCrop,
                  success: function(fn){
                      $.fn.yiiGridView.update("photos-grid");
                  }
                });
            }
        </script>

        <?php 
            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                'id' => 'updPhoto',
                'options' => array(
                    'open' => 'js:function(event, ui) {'.
                            '$("#updPhoto").parent().find(".ui-dialog-titlebar-close").hide();'.
                        '}',
                    'title' => Yii::t('app', 'Update photo'),
                    'autoOpen' => false,
                    'modal' => true,
                    'resizable'=> false,
                    //'height' => 400,
                    'draggable' => false,
                    //'width' => 500,
                    'closeOnEscape' => false,
                    'buttons' => array(
                            array('text'=>'Ok','click'=> 'js:function(){$(this).dialog("close");updPhotoAjax();}'),
                        ),
                ),
            ));
        ?>
            
        <label><?php echo Yii::t('ProjectModule.project', 'Name');?> *</label>
        <input type="text" id="photoName" />
        <input type="hidden" id="photoId" />
         
        <?php
            $this->endWidget('zii.widgets.jui.CJuiDialog');
        ?>        
        
        <script type="text/javascript">
            function updPhotoAjax(){
//                dataPhoto = "photoId=<?php echo $model->id;?>&filename="+filename+"&width="+$('#w').val()+"&height="+$('#h').val()+"&x="+$('#x1').val()+"&y="+$('#y1').val();
//                $.ajax({
//                  url: "/admin/project/main/cropPhoto",
//                  type: "post",
//                  data: dataCrop,
//                  success: function(fn){
//                      if(fn)
//                      {
//                          function(data) {$.fn.yiiGridView.update("photos-grid");}
//                      }
//                  }
//                });
            }
        </script>
        
        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'photos-grid',
            'dataProvider'=>$modelPhoto->search(),
            'filter'=>$modelPhoto,
            'template' => '{items}',
            'columns'=>array(
                    array(
                        'name' => 'id',
                        'htmlOptions' => array(
                            'width' => '30',
                        ),
                    ),
                    'name',
                    array(
                        'name' => 'filename',
                        'htmlOptions' => array(
                            'width' => '94',
                        ),
                        'value' => function($data) use($model) {
                            echo Chtml::image("/users/".$model->user->nick."/projects/".$model->id."/thumbnail/".$data->filename, '', array('width' => 90));
                        },
                        'filter' => false,
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{update}{delete}',
                        'buttons'=>array(
                            'delete' => array(
                                'url'=>'"/admin/project/main/delphoto/id/$data->id"',
                            ),
                            'update' => array(
                                'url'=> '"#"',
                                //'click' => 'function() { alert(1); return false;}',
                                //'click' => function ($data) { echo Chtml::value($data, 'id');},
//                                'click' => 'js:'
//                                    . '$("#photoName").value("$data->name");'
//                                    . '$("#photoId").value($data->id);'
//                                    . '$("#updPhoto").dialog("open");'
//                                    . 'return false;',
//                                'options' => array(
//                                    'onclick' => "js:"
//                                    . "$('#photoName').value('');"
//                                    . "$('#photoId').value();"
//                                    . "$('#updPhoto').dialog('open');"
//                                    . "return false;",
//                                    'data-name' => '$data->name',
//                                    'data-id' => '$data->id',
//                                ),
                            ),
                        ),
                    ),
            ),
    )); ?>
    
    <h6  class="underline"><?php echo Yii::t('ProjectModule.project', 'Videos')?></h6>
    
</div>