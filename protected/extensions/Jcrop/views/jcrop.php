<?php //Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php Yii::app()->clientScript->registerScriptFile(CHtml::asset(Yii::getPathOfAlias('ext.Jcrop.js').'/jquery.Jcrop.min.js'));?>
<?php Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('ext.Jcrop.css').'/jquery.Jcrop.css'));?>

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
    
    function initCrop()
    {
        $('#<?php echo $idImg;?>').Jcrop({
            onChange: showCoords,
            onSelect: showCoords,
            aspectRatio: <?php echo $aspectRatio;?>,
            minSize: [<?php echo $minWidthCrop;?>, <?php echo $minHeightCrop;?>],
            <?php echo ($htmlWidthImg != '') ? 'boxWidth: '.$htmlWidthImg : '' ;?>
        },
        function(){
            jcrop_api = this;
        });
        setSelectArea();
    }
    
    function destroyCrop()
    {
        jcrop_api.destroy();
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
    
    function setSelectArea() {
        
        jcrop_api.setSelect([10, 10 , 200, 200]);
    }

    $('#getCrop').click(function(){
        alert($('#x1').val());
    });
    
    initCrop();
</script>