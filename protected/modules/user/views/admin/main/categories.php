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
                        'value' => function($data) use($selectCats) {
                                        return ($data->level > 1)
                                               ? CHtml::checkBox(
                                                       'cat'.$data->id, 
                                                       in_array($data->id, $selectCats) ? true : false,
                                                       array(
                                                           'onmousedown' => 
                                                                 'idCat = '.$data->id.';'
                                                               . 'if($(this).prop("checked"))'
                                                               . '{'
                                                               .    '$("#warning").dialog("open");return false;'
                                                               . '}'
                                                               . 'else'
                                                               . '{'
                                                               .    'checkCategory();'
                                                               . '}'
                                                       )
                                                 )
                                               : '';
                        },
                        'type' => 'raw',
                        'htmlOptions'=>array('width'=>'30px'),
                ),
		array(
                        'class' => 'CButtonColumn',
                        'htmlOptions' => array(
                            'width' => '30px',
                         ),
                        'template' => '{update}',
                        'buttons' => array(
                            'update' => array(
                                'visible' => function($row, $data) use ($selectCats) {                                       
                                    return ($data->level > 1 && in_array($data->id, $selectCats)) ? true : false;
                                },     
                                'url'=>'Yii::app()->createUrl("/admin/user/main/category", array("id" => $data->id, "user_id" => '.$model->id.'))',
                            ),
                         ),
		),
	),
));?>
    
</div>

<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'warning',
    'options' => array(
        'title' => Yii::t('app', 'Attention'),
        'autoOpen' => false,
        'modal' => true,
        'resizable'=> false,
        'closeOnEscape' => false,
        'width' => 400,
        'buttons' => array(
                array(
                    'text' => Yii::t('app', 'Yes'),
                    'click' => 'js:function(){$(this).dialog("close");checkCategory();}',
                ),
                array('text' => Yii::t('app', 'Cancel'), 'click'=> 'js:function(){$(this).dialog("close");}'),
            ),
    ),
));
?>
<div id="warning">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>При деактивации категории будут удалены все проекты пользователя, которые относятся к этой категории. Вы уверены в своих действиях?</p>
</div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>

<script type="text/javascript">
    var idCat = 0;
    
    function checkCategory()
    {
        $.ajax({
            type: "GET",
            url: "/admin/user/main/checkCategory/user/<?php echo $model->id;?>/category/"+idCat,
            success: function(data) {$.fn.yiiGridView.update("category-grid");}
        });
    }
</script>