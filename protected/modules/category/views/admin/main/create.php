<?php
/* @var $this MainController */
/* @var $model Category */

$this->breadcrumbs=array(
	Yii::t('CategoryModule.category', 'Categories') => array('admin'),
	Yii::t('CategoryModule.category', 'Create'),
);

$url = CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview');
Yii::app()->clientScript->registerCssFile($url.'/styles.css');
?>

<h3><?php echo Yii::t('CategoryModule.category', 'Create Category');?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>