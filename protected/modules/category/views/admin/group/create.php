<?php
/* @var $this GroupController */
/* @var $model Groupcategory */

$this->breadcrumbs=array(
	Yii::t('CategoryModule.category', 'Categories') => array('admin'),
	Yii::t('CategoryModule.category', 'Create group'),
);

Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview').'/styles.css');
?>

<h5>
    <?php echo Yii::t('CategoryModule.category', 'Create group');?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/category/group/admin'), array('class' => 'butLink'));?>
</h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>