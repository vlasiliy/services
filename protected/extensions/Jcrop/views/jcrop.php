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

<?php $hWI = ($htmlWidthImg != "") ? "boxWidth: ".$htmlWidthImg : "";?>

<?php Yii::app()->clientScript->registerScript('cropScript', "
    var jcrop_api;
    initCrop();
    
    function initCrop()
    {
        $('#".$idImg."').Jcrop({
            onChange: showCoords,
            onSelect: showCoords,
            aspectRatio: ".$aspectRatio.",
            minSize: [".$minWidthCrop.", ".$minHeightCrop."],
            ".$hWI."
        },
        function(){
            jcrop_api = this;
        });
        jcrop_api.setSelect([0, 0 , ".$minWidthCrop.", ".$minHeightCrop."]);
    }
    
    function setImage(fullName)
    {
        if(($('#".$idWidthImg."').val() < ".$minWidthCrop.") || ($('#".$idHeightImg."').val() < ".$minHeightCrop."))
        {
            alert('Маленький рисунок');
            return (false);
        }
        else
        {
            jcrop_api.setImage(fullName); 
            return (true);
        }
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
    
    $('#".$idWidthImg."').change(function(){
        alert(1);
    });
    
");
?>