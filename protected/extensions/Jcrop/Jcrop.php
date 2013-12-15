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
    
    public $originWidthImg;
    
    public $originHeightImg;
    
    public $htmlWidthImg;
    
    public $htmlHeightImg;
    
    public $aspectRatio = 1;
    
    public $minWidthCrop = 50;
    
    public $minHeightCrop = 50;
    
    
    
    public function init()
    {

        $this->render('jcrop', array(
            'option1' => '',
        ));
    }
}