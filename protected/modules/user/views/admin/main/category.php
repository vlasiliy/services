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
/*
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
 * 
 */
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
                        <?php //echo $form->labelEx($model,'email'); ?>
                    </td>
                    <td>
                        <?php //echo $form->textField($model,'email',array('size'=>32,'maxlength'=>128)); ?>
                        <?php //echo $form->error($model,'email'); ?>
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