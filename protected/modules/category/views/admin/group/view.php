<?php
/* @var $this GroupController */
/* @var $model Groupcategory */

$this->breadcrumbs=array(
	'Groupcategories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Groupcategory', 'url'=>array('index')),
	array('label'=>'Create Groupcategory', 'url'=>array('create')),
	array('label'=>'Update Groupcategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Groupcategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Groupcategory', 'url'=>array('admin')),
);
?>

<h1>View Groupcategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
