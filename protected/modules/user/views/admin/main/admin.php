<?php
/* @var $this MainController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('UserModule.user', 'Users') => array('admin'),
	Yii::t('UserModule.user', 'Management'),
);

/*
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);
 * 
 */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h5>
    <?php echo Yii::t('UserModule.user', 'Management of users');?>
    <?php echo CHtml::link(Yii::t('UserModule.user', 'Create User'), $this->createUrl('/admin/user/main/create'), array('class' => 'butLink'));?>
</h5>

<div id="contentController">
    <p>
    <?php echo Yii::t('app', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.');?>
    </p>

    <?php echo CHtml::link(Yii::t('app', 'Advanced search'),'#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
            'model'=>$model,
    )); ?>
    </div><!-- search-form -->
    
    <div style="clear:both;"></div>
    
    <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'user-grid',
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
                    'surname',
                    'nick',
                    'email',
                    array(
                        'name' => 'role',
                        'value' => 'User::model()->getNameRole($data->role)',
                        'type' => 'raw',
                        'filter' => User::model()->getRoles(),
                    ),
                    'date_last_visit',
                    array(
                        'name' => 'ban',
                        'value' => '($data->ban == 1) ? Chtml::image("/img/admin/banned.png") : ""',
                        'type' => 'raw',
                        'filter' => array('0' => 'Нет', '1' => 'Да'),
                        'htmlOptions' => array(
                            'width' => '50',
                            'style' => 'text-align:center;',
                        ),
                    ),
                    array(
                            'class'=>'CButtonColumn',
                    ),
            ),
    )); ?>
</div>