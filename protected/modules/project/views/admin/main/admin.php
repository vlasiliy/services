<?php
/* @var $this MainController */
/* @var $model Project */

$this->breadcrumbs=array(
	Yii::t('ProjectModule.project', 'Projects') => array('admin'),
	Yii::t('ProjectModule.project', 'Management'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#project-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h5>
    <?php echo Yii::t('ProjectModule.project', 'Management of projects');?>
</h5>

<div id="contentController">
    <p class="italic">
    <?php echo Yii::t('app', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.');?>
    </p>

    <?php echo CHtml::link(Yii::t('app', 'Advanced search'),'#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
            'model'=>$model,
    )); ?>
    </div><!-- search-form -->

    <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'project-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                    array(
                        'name' => 'id',
                        'htmlOptions' => array(
                            'width' => '30',
                        ),
                    ),
                    'name',
                    array(
                        'name' => 'userNick',
                        'value' => 'CHtml::link($data->userNick, "/admin/user/main/update/id/$data->user_id")',
                        'type' => 'raw',
                    ),
                    'categoryName',
                    /*
                    'date_finished',
                    'price',
                    'currency',
                    'unit',
                    'description',
                    'sort',
                    */
                    array(
                            'class'=>'CButtonColumn',
                    ),
            ),
    )); ?>
</div>