<?php
/* @var $this MainController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('UserModule.user', 'Users') => array('admin'),
	$model->name.' '.$model->surname,
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
    <?php echo Yii::t('UserModule.user', 'Update User').' - '.$model->name.' '.$model->surname; ?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/user/main/admin'), array('class' => 'butLink'));?>
</h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->renderPartial('_links'); ?>

<div class="clr"></div>