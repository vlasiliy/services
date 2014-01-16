<?php
/* @var $this GroupController */
/* @var $model Groupcategory */

$this->breadcrumbs=array(
	Yii::t('CategoryModule.category', 'Categories') => array('/admin/category/main/admin'),
	Yii::t('CategoryModule.category', 'Groups') => array('/admin/category/group/admin'),
	$model->name,
);

Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('zii.widgets.assets').'/detailview').'/styles.css');

$selectCats = array_keys(CHtml::listData($model->categories, 'id', 'id'));
?>

<h5>
    <?php echo Yii::t('CategoryModule.category', 'Update group of categories').' - '.$model->name;?>
    <?php echo CHtml::link(Yii::t('app', 'Back'), $this->createUrl('/admin/category/group/admin'), array('class' => 'butLink'));?>
</h5>

<div id="contentController">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    <br />
    
    <h6 class="underline"><?php echo Yii::t('CategoryModule.category', 'Categories');?></h6>
    <?php 
    $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'category-grid',
            'dataProvider' => $categories->search(),
            'enableSorting' => false,
            'filter' => $categories,
            'rowHtmlOptionsExpression' => 'array("id"=>"cat$data->id")',
            'template' => '{items}',
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
                                                               'onmousedown' => 'idCat='.$data->id.';checkCategory();'
                                                           )
                                                     )
                                                   : '';
                            },
                            'type' => 'raw',
                            'htmlOptions'=>array('width'=>'30px'),
                    ),
            ),
    ));?>
</div>

<script type="text/javascript">
    var idCat = 0;
    
    function checkCategory()
    {
        $.ajax({
            type: "GET",
            url: "/admin/category/group/checkCategory/group/<?php echo $model->id;?>/category/"+idCat,
            success: function(data) {$.fn.yiiGridView.update("category-grid");}
        });
    }
</script>