<?php
/* @var $this MainController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('UserModule.user', 'Users') => array('admin'),
	$model->name.' '.$model->surname,
);

$url = CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview');
Yii::app()->clientScript->registerCssFile($url.'/styles.css');
//Yii::app()->clientScript->registerScriptFile('http://maps.googleapis.com/maps/api/js?key='.Yii::app()->params['googleMapsApiKey'].'&sensor=true');

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

<h3><?php echo Yii::t('UserModule.user', 'Update User').' '.$model->name.' '.$model->surname; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>