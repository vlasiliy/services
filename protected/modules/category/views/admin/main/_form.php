<?php
/* @var $this MainController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div id="contentController">

    <div class="form crtUpdFrm">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'category-form',
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
                        <?php echo $form->label($model, 'root'); ?>
                    </td>
                    <td>
                        <?php echo CHtml::dropDownList('isRoot', 0, array(0 => 'Нет', 1 => 'Да'));?>
                        <?php echo CHtml::decode(
                                CHtml::dropDownList('parent', '', 
                                        CHtml::listData(CTree::tree(Category::model()->findAll(array('order'=>'root, lft'))), 'id', 'name')
                                )
                        );?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'name'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'url'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'url'); ?>
                    </td>
                </tr>
            </table>    

            <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')); ?>
            </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>

<script type="text/javascript">
    function edParent()
    {
        if($("#isRoot").val() == 1)
        {
            $("#parent").prop('disabled', true);
        }
        else
        {
            $("#parent").prop('disabled', false);
        }
    }
    
    
    $(document).ready(function(){
        edParent();
        $("#isRoot").click(function(){
            edParent();
        });
    });
</script>