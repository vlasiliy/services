<?php
/* @var $this MainController */
/* @var $model Category */

$this->breadcrumbs=array(
	Yii::t('CategoryModule.category', 'Categories') => array('admin'),
	Yii::t('CategoryModule.category', 'Management'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>
    <?php echo Yii::t('CategoryModule.category', 'Management of categories');?>
    <?php echo CHtml::link(Yii::t('CategoryModule.category', 'Create Category'), $this->createUrl('/admin/category/main/create'), array('class' => 'butLink'));?>
</h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider' => $model->search(),
        'enableSorting' => false,
        'filter' => $model,
	'columns' => array(
                array(
                    'name' => 'id',
                    'filter' => false,
                    'htmlOptions' => array(
                        'width' => '30',
                    ),
                ),
		array(
                        'name' => 'name',
                        'value' => 'CTree::shiftTitle($data->name, $data->level)',
                        'type' => 'raw',
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
