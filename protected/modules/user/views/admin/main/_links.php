<div class="rightContent">
    <h6>Дополнительно</h6>
    <ul>
        <li>
            <a href="/"><?php echo Yii::t('CategoryModule.ctegory', 'Categories');?></a>
            <ul>
                <?php foreach($model->categories as $cat):?>
                    <li><?php echo $cat->name;?></li>
                <?php endforeach;?>
            </ul>
        </li>
        <li><a href="/">Проекты</a></li>
    </ul>
</div>