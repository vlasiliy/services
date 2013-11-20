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
            $level = $item->{$nameFieldLevel};
            if($level > 1)
            {       
                $sep = $firstSymbol.$separator;
                for($i = 1;$i < ($level - 1);$i++)
                {
                    $sep .= $separator;
                }
                $item->{$nameFieldTitle} = $sep.$item->{$nameFieldTitle};
            }
        }
        return $data;
    }
}
