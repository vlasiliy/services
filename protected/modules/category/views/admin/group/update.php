<?php
/* @var $this GroupController */
/* @var $model Groupcategory */

$this->breadcrumbs=array(
	'Groupcategories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Groupcategory', 'url'=>array('index')),
	array('label'=>'Create Groupcategory', 'url'=>array('create')),
	array('label'=>'View Groupcategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Groupcategory', 'url'=>array('admin')),
);
?>

<h1>Update Groupcategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>