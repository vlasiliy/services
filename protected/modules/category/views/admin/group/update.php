<?php
/* @var $this GroupController */
/* @var $model Groupcategory */

$this->breadcrumbs=array(
	Yii::t('CategoryModule.category', 'Categories') => array('/admin/category/main/admin'),
	Yii::t('CategoryModule.category', 'Groups') => array('/admin/category/group/admin'),
	$model->name,
);

Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview').'/styles.css');
?>

<h5>
    <?php echo Yii::t('CategoryModule.category', 'Update group of categories').' - '.$model->name;?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/category/group/admin'), array('class' => 'butLink'));?>
</h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>