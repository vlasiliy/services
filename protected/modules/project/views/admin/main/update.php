<?php
/* @var $this MainController */
/* @var $model Project */

$this->breadcrumbs=array(
	Yii::t('ProjectModule.project', 'Projects') => array('admin'),
	$model->name,
);
?>

<h5>
    <?php echo Yii::t('ProjectModule.project', 'Update project').' - '.$model->name;?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/category/main/admin'), array('class' => 'butLink'));?>
</h5>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>