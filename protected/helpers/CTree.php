<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CTree
 *
 * @author vlasiliy
 */
class CTree {
    
    public static function tree($data, $nameFieldTitle = 'name', $nameFieldLevel = 'level', $firstSymbol = '' ,$separator = '&nbsp;&nbsp;&nbsp;')
    {
        foreach($data as $key => $item)
        {
            $item->{$nameFieldTitle} = self::getPrefix($item->{$nameFieldLevel}, $firstSymbol, $separator).$item->{$nameFieldTitle};
        }
        return $data;
    }
    
    public static function shiftTitle($data, $level, $firstSymbol = '', $separator = '&nbsp;&nbsp;&nbsp;')
    {
        return self::getPrefix($level, $firstSymbol, $separator).$data;
    }
    
    private function getPrefix($level, $firstSymbol, $separator)
    {
        $prefix = '';
        if($level > 1)
        {       
            if($level > 2)
            {
                $countSimbols = strlen(html_entity_decode($firstSymbol.$separator));
                $space = '';
                for($i = 1;$i <= $countSimbols;$i++)$space .= '&ensp;';
                for($i = 3;$i <= $level;$i++)$prefix .= $space;
            }
            $prefix = $prefix.$firstSymbol.$separator;
        }
        return $prefix;
    }
    
}
