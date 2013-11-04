<?php
/* @var $this MainController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('UserModule.user', 'Users') => array('admin'),
	$model->name.' '.$model->surname,
);

/*
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
 * 
 */
?>

<h3><?php echo Yii::t('UserModule.user', 'View User').' '.$model->name.' '.$model->surname; ?></h3>
 
<div id="contentController">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                array(
                   'name' => 'role',
                   'value' => User::model()->getNameRole($model->role),
                ),
		'email',
		'nick',
		'name',
		'surname',
		array(
                    'name' => 'sex',
                    'value' => Yii::t("UserModule.user", ($model->sex == 1) ? "male" : "women"),
                ),
		'company',
		'city',
		'postcode',
		'address',
		'tel1',
		'tel2',
		'site',
		'skype',
		'icq',
		'lat',
		'lng',
		'date_create',
		'date_update',
		'date_last_visit',
	),
)); ?>
    
</div>