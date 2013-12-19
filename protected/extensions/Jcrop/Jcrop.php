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
    
    public $idDialog;
    
    public $htmlWidthImg;
    
    public $htmlHeightImg;
    
    public $aspectRatio = 1;
    
    public $minWidthCrop = 135;
    
    public $minHeightCrop = 135;
    
    
    
    public function run()
    {

        //print_r(get_object_vars($this));die;
        
//        $arr = array(
//            'idImg' => $this->idImg,
//            'idSetArea' => $this->idSetArea,
//            'idWidthImg' => $this->idWidthImg,
//            'idHeightImg' => $this->idHeightImg,
//            'htmlWidthImg' => $this->htmlWidthImg,
//            'htmlHeightImg' => $this->htmlHeightImg,
//            'aspectRatio' => $this->aspectRatio,
//            'minWidthCrop' => $this->minWidthCrop,
//            'minHeightCrop' => $this->minHeightCrop,
//        );
        
        $this->render('jcrop', get_object_vars($this));
    }
}