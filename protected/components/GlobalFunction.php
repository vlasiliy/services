<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of globalFunction
 *
 * @author vlasiliy
 */
class GlobalFunction {
    public static function delTmpFiles($path)
    {
        //echo Yii::getPathOfAlias('webroot').$path;die;
        $files = glob(Yii::getPathOfAlias('webroot').$path);
        foreach($files as $file)
        {
            $succ = unlink($file);
        }
        
        return true;
    }
}
