<?php
/* @var $this MainController */
/* @var $model Category */

$this->breadcrumbs=array(
	Yii::t('CategoryModule.category', 'Categories') => array('admin'),
	Yii::t('CategoryModule.category', 'Create'),
);

Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview').'/styles.css');
?>

<h3>
    <?php echo Yii::t('CategoryModule.category', 'Create Category');?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/category/main/admin'), array('class' => 'butLink'));?>
</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'isRoot'=>$isRoot, 'parent' => $parent)); ?>