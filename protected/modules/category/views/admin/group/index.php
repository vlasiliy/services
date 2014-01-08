<?php
/* @var $this GroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Groupcategories',
);

$this->menu=array(
	array('label'=>'Create Groupcategory', 'url'=>array('create')),
	array('label'=>'Manage Groupcategory', 'url'=>array('admin')),
);
?>

<h1>Groupcategories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
