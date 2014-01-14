<?php
/* @var $this GroupController */
/* @var $model Groupcategory */

$this->breadcrumbs=array(
	Yii::t('CategoryModule.category', 'Categories') => array('admin'),
	Yii::t('CategoryModule.category', 'Groups'),
);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#groupcategory-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<h5>
    <?php echo Yii::t('CategoryModule.category', 'Managing groups of categories');?>
    <?php echo CHtml::link(Yii::t('CategoryModule.category', 'Create group'), $this->createUrl('/admin/category/group/create'), array('class' => 'butLink'));?>
</h5>

<div id="contentController">
    <p class="italic">
    <?php echo Yii::t('app', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.');?>
    </p>

    <?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
    <!--<div class="search-form" style="display:none">
    <?php //$this->renderPartial('_search',array(
            //'model'=>$model,
    //)); ?>
    </div> search-form -->

    <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'groupcategory-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                    array(
                            'name' => 'id',
                            'filter' => false,
                            'htmlOptions' => array(
                                'width' => '30',
                             ),
                    ),
                    'name',
                    'url',
                    array(
                            'class' => 'CButtonColumn',
                            'htmlOptions' => array(
                                'width' => '30',
                             ),
                            'template' => '{delete}{update}',
                    ),
            ),
    )); ?>
</div>