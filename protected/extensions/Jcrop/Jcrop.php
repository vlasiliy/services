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
    public $idImg;
    
    public $idSetArea;
    
    public $idWidthImg;
    
    public $idHeightImg;
    
    public $htmlWidthImg;
    
    public $htmlHeightImg;
    
    public $aspectRatio = 1;
    
    public $minWidthCrop = 135;
    
    public $minHeightCrop = 135;
    
    
    
    public function init()
    {

        //print_r(get_object_vars($this));die;
        
        $this->render('jcrop', get_object_vars($this));
    }
}