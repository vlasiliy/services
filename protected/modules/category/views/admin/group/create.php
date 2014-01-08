<?php
/* @var $this GroupController */
/* @var $model Groupcategory */

$this->breadcrumbs=array(
	'Groupcategories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Groupcategory', 'url'=>array('index')),
	array('label'=>'Manage Groupcategory', 'url'=>array('admin')),
);
?>

<h1>Create Groupcategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>