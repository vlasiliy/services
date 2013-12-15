<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php Yii::app()->clientScript->registerScriptFile(CHtml::asset(Yii::getPathOfAlias('ext.Jcrop.js').'/jquery.Jcrop.min.js'));?>
<?php Yii::app()->clientScript->registerCssFile(CHtml::asset(Yii::getPathOfAlias('ext.Jcrop.css').'/jquery.Jcrop.min.css'));?>

<?php 
Yii::app()->clientScript->registerScript('crop', "
    var jcrop_api;
    $('#target').Jcrop({
        onChange: showCoords,
        onSelect: showCoords,
        aspectRatio: 1 / 1,
        minSize: [135, 135],
    },
    function(){
        jcrop_api = this;
    });

    jcrop_api.setSelect([10, 10 , 145, 145]);

    function showCoords(c)
    {
        $('#x1').val(c.x);
        $('#y1').val(c.y);
        $('#x2').val(c.x2);
        $('#y2').val(c.y2);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };

    $('#getCrop').click(function(){
        alert($('#x1').val());
    });
");
?>

<img src="/users/test/tmp/IMG_20130824_135806.jpg" id="target" width="400" />

<input type="hidden" id="x1" />
<input type="hidden" id="y1" />
<input type="hidden" id="x2" />
<input type="hidden" id="y2" />
<input type="hidden" id="w" />
<input type="hidden" id="h" />

<input id="getCrop" type="button" value="Get Crop Options" />