<?php
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Гость',
        'bizRule' => null,
        'data' => null
    ),
    'user' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Пользователь',
        'children' => array(
            'guest', // унаследуемся от гостя
        ),
        'bizRule' => null,
        'data' => null
    ),
    'provider' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Поставщик',
        'children' => array(
            'user', // унаследуемся от user
        ),
        'bizRule' => null,
        'data' => null
    ),
    'performer' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Исполнитель',
        'children' => array(
            'user', // унаследуемся от user
        ),
        'bizRule' => null,
        'data' => null
    ),
    'moder' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Модератор',
        'children' => array(
            'guest',          // от гостя
        ),
        'bizRule' => null,
        'data' => null
    ),
    'admin' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Администратор',
        'children' => array(
            'moder',         // позволим админу всё, что позволено модератору
        ),
        'bizRule' => null,
        'data' => null
    ),
);