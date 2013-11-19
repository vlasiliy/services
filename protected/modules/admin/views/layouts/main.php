<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="/css/reset.css" />
    <link rel="stylesheet" href="/css/text.css" />
    <link rel="stylesheet" href="/css/form.css" />
    <link rel="stylesheet" href="/css/admin.css" />
    
    <title><?php echo $this->pageTitle;?></title>
</head>
<body>

<div id="header">
    <div id="menu">
        <ul>
            <li>
                <a href="<?php echo $this->createUrl('/admin/user/main/admin');?>"><img src="/img/admin/users.png" alt="<?php echo Yii::t('UserModule.user', 'Users');?>" /><?php echo Yii::t('UserModule.user', 'Users');?></a>
                <ul class="submenu">
                    <li><?php echo CHtml::link(Yii::t('UserModule.user', 'Management'), $this->createUrl('/admin/user/main/admin'));?></li>
                    <li><?php echo CHtml::link(Yii::t('UserModule.user', 'Create'), $this->createUrl('/admin/user/main/create'));?></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo $this->createUrl('/admin/category/main/admin');?>"><img src="/img/admin/category.png" alt="Категории" /><?php echo Yii::t('CategoryModule.category', 'Categories');?></a>
                <ul class="submenu">
                    <li><?php echo CHtml::link(Yii::t('CategoryModule.category', 'Management'), $this->createUrl('/admin/category/main/admin'));?></li>
                    <li><?php echo CHtml::link(Yii::t('CategoryModule.category', 'Create'), $this->createUrl('/admin/category/main/create'));?></li>
                    <li><a href="/">Группы</a></li>
                    <li><a href="/">Добавить группу</a></li>
                </ul>
            </li>
            <li>
                <a href="/admin/project/admin"><img src="/img/admin/project.png" alt="Проекты" /> Проекты </a>
                <ul class="submenu">
                    <li><a href="/">Все</a></li>
                    <li><a href="/">Детальный поиск</a></li>
                </ul>
            </li>
            <li><a href="/admin/setting/admin"><img src="/img/admin/setting.png" alt="Настройки" /> Настройки </a></li>
        </ul>
        <div id="logout"><a href="/site/logout"> Выход <img src="/img/admin/logout.png" alt="Выход" /></a></div>
    </div>
    <div id="crumbs">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
                            'homeLink'=>CHtml::link('<a href="/admin"><img src="/img/admin/home.png" alt="Home" />','/' ),
                            'separator'=>'<img src="/img/admin/sepCrumbs.gif" alt="" class="sepCrumbs" />',
            )); ?><!-- breadcrumbs -->
        <?php endif?>
        <!--<a href="/admin"><img src="/img/admin/home.png" alt="Home" /></a><img src="/img/admin/sepCrumbs.gif" alt="" class="sepCrumbs" /><a href="/">Пользователи</a><img src="/img/admin/sepCrumbs.gif" alt="" class="sepCrumbs" />Детальный поиск-->
    </div>
    <div id="crumbsBorder"></div>
</div>

<div id="vertSpace"></div>
    
<div id="content">
    <div id="data">
        <?php echo $content; ?>
    </div>
</div>

<div class="clear"></div>

<div id="footer">
    <div id="crumbsBorder"></div>
    <div id="copy">
        Copyright &copy; <?php echo date('Y'); ?> by Pazzle. | All Rights Reserved. | <?php echo Yii::powered(); ?>
    </div>
    <div id="crumbsBorder"></div>
</div>


</body>
</html>
