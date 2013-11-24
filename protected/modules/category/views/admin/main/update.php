<?php
/* @var $this MainController */
/* @var $model Category */

$this->breadcrumbs=array(
	Yii::t('CategoryModule.category', 'Categories') => array('admin'),
	$model->name,
);

Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview').'/styles.css');
?>

<h5>
    <?php echo Yii::t('CategoryModule.category', 'Update Category').' - '.$model->name;?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/category/main/admin'), array('class' => 'butLink'));?>
</h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>