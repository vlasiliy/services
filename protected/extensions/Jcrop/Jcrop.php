<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of xAdmList
 *
 * @author vlasiliy
 */
class Jcrop extends CWidget
{
    public $startImg;
    
    public $idImg;
    
    public $idSetArea;
    
    public $idWidthImg;
    
    public $idHeightImg;
    
    public $idDialog;
    
    public $htmlWidthImg;
    
    public $htmlHeightImg;
    
    public $aspectRatio = 1;
    
    public $minWidthCrop = 135;
    
    public $minHeightCrop = 135;
    
    public $scriptOpenDialog;
    
    
    
    public function run()
    {
        $assets = dirname(__FILE__).'/assets';
        $baseUrl = Yii::app()->assetManager->publish($assets);
        Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/jquery.Jcrop.min.js');
        Yii::app()->clientScript->registerCssFile($baseUrl.'/css/jquery.Jcrop.min.css');
        
        $this->render('jcrop', get_object_vars($this));
    }
}