<?php //Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php Yii::app()->clientScript->registerScriptFile(CHtml::asset(Yii::getPathOfAlias('ext.Jcrop.js').'/jquery.Jcrop.min.js'));?>
<?php Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('ext.Jcrop.css').'/jquery.Jcrop.min.css'));?>

<img src="/img/no_avatar.png" id="<?php echo $idImg;?>" />

<input type="hidden" id="<?php echo $idWidthImg;?>" />
<input type="hidden" id="<?php echo $idHeightImg;?>" />

<input type="hidden" id="x1" />
<input type="hidden" id="y1" />
<input type="hidden" id="x2" />
<input type="hidden" id="y2" />
<input type="hidden" id="w" />
<input type="hidden" id="h" />

<script type="text/javascript">
    var jcrop_api;
    
    function initCropMy()
    {
        alert(1);
        if(($('#<?php echo $idWidthImg;?>').val() < <?php echo $minWidthCrop;?>) || ($('#<?php echo $idHeightImg;?>').val() < <?php echo $minHeightCrop;?>))
        {
            alert('Маленький рисунок');
            jcrop_api.destroy();
            return false;
        }
        else
        {
            jcrop_api = $.Jcrop('#<?php echo $idImg;?>');
            jcrop_api.setOptions({
                onChange: showCoords,
                onSelect: showCoords,
                aspectRatio: <?php echo $aspectRatio;?>,
                minSize: [<?php echo $minWidthCrop;?>, <?php echo $minHeightCrop;?>],
                <?php echo ($htmlWidthImg != '') ? 'boxWidth: '.$htmlWidthImg : '' ;?>
            });
            jcrop_api.setSelect([0, 0 , <?php echo $minWidthCrop;?>, <?php echo $minHeightCrop;?>]);
            return true;
        }   

    }; 
    
    function destroyCrop()
    {
        if(jcrop_api !== undefined)
        {jcrop_api.destroy();}
        //if(jcrop_api != undefined)
        //jcrop_api.disable() 
    }
    
    function showCoords(c)
    {
        $('#x1').val(c.x);
        $('#y1').val(c.y);
        $('#x2').val(c.x2);
        $('#y2').val(c.y2);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };
</script>