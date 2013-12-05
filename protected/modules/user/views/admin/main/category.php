<?php
/* @var $this MainController */
/* @var $model UserCatgory */

$selectCats = CHtml::listData($model->categories, 'id', 'name');
//print_r($selectCats);die;

$this->breadcrumbs=array(
	Yii::t('UserModule.user', 'Users') => array('admin'),
	$model->name.' '.$model->surname => array('update', 'id' => $model->id),
        Yii::t('CategoryModule.category', 'Categories') => array('categories', 'id' => $model->id),
        $selectCats[$category['category_id']]
);

Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview').'/styles.css');

?>

<h5>
    <?php echo Yii::t('UserModule.user', 'Update user category').' - '.$selectCats[$category['category_id']]; ?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/user/main/admin'), array('class' => 'butLink'));?>
</h5>

<div id="contentController">

    <div class="form crtUpdFrm">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'user-category-form',
            'enableAjaxValidation'=>false,
    )); ?>

            <p class="note"><?php echo Yii::t('app', 'Fields with * are required.')?></p>

            <?php echo $form->errorSummary($category); ?>

            <table class="detail-view">
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($category, 'begin_year'); ?>
                    </td>
                    <td>
                        <?php echo $form->dropDownList($category, 'begin_year', UserCategory::model()->getListExperience()); ?>
                        <?php echo $form->error($category, 'begin_year'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($category, 'area_operations'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($category, 'area_operations',array('size'=>32,'maxlength'=>128)); ?>
                        <?php echo $form->error($category, 'area_operations'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->label($category, 'awards'); ?>
                    </td>
                    <td>
                        <?php echo $form->textArea($category, 'awards', array('maxlength' => 256, 'cols' => 50, 'rows' => 6)); ?>
                        <?php echo $form->error($category, 'awards'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->label($category, 'agent'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($category, 'agent',array('size'=>32,'maxlength'=>32)); ?>
                        <?php echo $form->error($category, 'agent'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($category, 'service'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($category, 'service',array('size'=>32,'maxlength'=>128)); ?>
                        <?php echo $form->error($category, 'service'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->label($category, 'description'); ?>
                    </td>
                    <td>
                        <?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
                            'model' => $category,
                            'attribute' => 'description',
                            'toolbar' => Yii::app()->params['toolBarAdminUserData'],
                        ));?>
                        <?php echo $form->error($category, 'description'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->label($category, 'tags'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($category, 'tags',array('size'=>32,'maxlength'=>128)); ?>
                        <?php echo $form->error($category, 'tags'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->label($category, 'price'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($category, 'price', array('size'=>32, 'maxlength'=>10, 'value'=> $category->price == 0 ? '' : $category->price)); ?>
                        <?php echo $form->error($category, 'price'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->label($category, 'currency'); ?>
                    </td>
                    <td>
                        <?php echo $form->dropDownList($category, 'currency', Yii::app()->params['currency']); ?>
                        <?php echo $form->error($category, 'currency'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->label($category, 'unit'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($category, 'unit', array('size'=>32, 'maxlength'=>32)); ?>
                        <?php echo $form->error($category, 'unit'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->label($category, 'price_description'); ?>
                    </td>
                    <td>
                        <?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
                            'model' => $category,
                            'attribute' => 'price_description',
                            'toolbar' => Yii::app()->params['toolBarAdminUserData'],
                        ));?>
                        <?php echo $form->error($category, 'price_description'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->label($category, 'scheme_work'); ?>
                    </td>
                    <td>
                        <?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
                            'model' => $category,
                            'attribute' => 'scheme_work',
                            'toolbar' => Yii::app()->params['toolBarAdminUserData'],
                        ));?>
                        <?php echo $form->error($category, 'scheme_work'); ?>
                    </td>
                </tr>
            </table>


            <div class="row buttons">
                    <?php echo CHtml::submitButton(Yii::t('app', 'Save')); ?>
            </div>

    <?php $this->endWidget('CActiveForm'); ?>

    </div><!-- form -->

</div>

<div class="clr"></div>