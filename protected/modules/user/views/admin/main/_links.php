<div class="rightContent">
    <h6>Дополнительно</h6>
    <ul>
        <li>
            <?php echo CHtml::link(Yii::t('CategoryModule.category', 'Categories'), $this->createUrl('/admin/user/main/categories?id='.$model->id));?>
            <ul>
                <?php foreach($model->categories as $cat):?>
                    <li><?php echo $cat->name;?></li>
                <?php endforeach;?>
            </ul>
        </li>
        <li>Проекты</li>
    </ul>
</div>