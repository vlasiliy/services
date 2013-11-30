<?php
/* @var $this MainController */
/* @var $model User */
//print_r($model->categories);die;

$selectCats = array_keys(CHtml::listData($model->categories, 'id', 'id'));

$this->breadcrumbs=array(
	Yii::t('UserModule.user', 'Users') => array('admin'),
	$model->name.' '.$model->surname => array('update', 'id' => $model->id),
        Yii::t('CategoryModule.category', 'Categories'),
);

$url = CHtml::asset(Yii::getPathOfAlias('ext.assets.adminIcon'));
?>

<h5>
    <?php echo Yii::t('UserModule.user', 'Editing user categories').' - '.$model->name.' '.$model->surname;?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/user/main/update/id/'.$model->id), array('class' => 'butLink'));?>
</h5>

<div id="contentController">
    
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider' => $categories->search(),
        'enableSorting' => false,
        'filter' => $categories,
        'rowHtmlOptionsExpression' => 'array("id"=>"cat$data->id")',
	'columns' => array(
		array(
                        'name' => 'name',
                        'value' => 'CTree::shiftTitle($data->name, $data->level)',
                        'type' => 'raw',
                ),
		array(
                        'value' => function($data) use($selectCats, $model) {
                                        return ($data->level > 1)
                                               ? CHtml::checkBox(
                                                       'cat'.$data->id, 
                                                       in_array($data->id, $selectCats) ? true : false,
                                                       array(
                                                           'onclick' => ''
                                                           . '$.ajax({'
                                                           . 'type: "GET",'
                                                           . 'url: "'.Yii::app()->createUrl("/admin/user/main/checkCategory", array("user" => $model->id, "category" => $data->id)).'",'
                                                           . 'success: function(data) {$.fn.yiiGridView.update("category-grid");},'
                                                           .'});'
                                                       )
                                                 )
                                               : '';
                        },
                        'type' => 'raw',
                ),
	),
));?>
    
</div>