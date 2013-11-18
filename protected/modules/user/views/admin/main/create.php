<?php
/* @var $this MainController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('UserModule.user', 'Users') => array('admin'),
	Yii::t('UserModule.user', 'Create'),
);

$url = CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview');
Yii::app()->clientScript->registerCssFile($url.'/styles.css');
?>

<h3><?php echo Yii::t('UserModule.user', 'Create User');?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>