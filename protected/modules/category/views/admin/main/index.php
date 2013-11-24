<?php
/* @var $this MainController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categories',
);

$this->menu=array(
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h5>Categories</h5>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
