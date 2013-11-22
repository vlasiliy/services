<?php
/* @var $this MainController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('UserModule.user', 'Users') => array('admin'),
	Yii::t('UserModule.user', 'Create'),
);

Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview').'/styles.css');
?>

<h3>
    <?php echo Yii::t('UserModule.user', 'Create User');?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/user/main/admin'), array('class' => 'butLink'));?>
</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>