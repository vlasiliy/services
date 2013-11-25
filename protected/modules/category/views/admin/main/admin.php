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

$url = CHtml::asset(Yii::getPathOfAlias('ext.assets.adminIcon'));
?>

<h5>
    <?php echo Yii::t('CategoryModule.category', 'Management of categories');?>
    <?php echo CHtml::link(Yii::t('CategoryModule.category', 'Create Category'), $this->createUrl('/admin/category/main/create'), array('class' => 'butLink'));?>
</h5>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider' => $model->search(),
        'enableSorting' => false,
        'filter' => $model,
        'rowHtmlOptionsExpression' => 'array("id"=>"cat$data->id")',
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
                        'class' => 'CButtonColumn',
                        'htmlOptions' => array(
                            'width' => '30',
                         ),
                        'template' => '{up}{down}',
                        'buttons' => array(
                            'up' => array(
                                'label' => Yii::t("app", "Up"),
                                'imageUrl' => $url.'/up.png',
                                'url' => '"#"',
                                'visible' => '$data->level > 1',
                                'click' => 'function(){'.
                                               '$.ajax({
                                                    type: "GET",
                                                    url: "/admin/category/main/move?id='.$data->id.'&way=up",
                                                    success: function(html){
                                                        if(html == "ok")
                                                        {
                                                            tmp = $("#cat1").html();
                                                            $("#cat1").html($("#cat16").html());
                                                            $("#cat16").html(tmp);
                                                        }
                                                        else
                                                        {
                                                            alert("Ошибка удаления!");
                                                        }
                                                    }
                                                });'.
                                                'return false;'.
                                           '}',
                            ),
                            'down' => array(
                                'label' => Yii::t("app", "Down"),
                                'imageUrl' => $url.'/down.png',
                                'url' => '"#"',
                                'visible' => '$data->level > 1',
                                'click' => 'function(){alert("Going down!");}',
                            ),
                        ),
		),
		array(
                        'class' => 'CButtonColumn',
                        'htmlOptions' => array(
                            'width' => '30',
                         ),
                        'template' => '{delete}{update}',
		),
	),
)); 
?>
