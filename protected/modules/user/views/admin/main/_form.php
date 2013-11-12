<?php
/* @var $this MainController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div id="contentController">

    <div class="form crtUpdFrm">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
    )); ?>

            <p class="note"><?php echo Yii::t('app', 'Fields with * are required.')?></p>

            <?php echo $form->errorSummary($model); ?>

            <table class="detail-view">
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'role'); ?>
                    </td>
                    <td>
                        <?php echo $form->dropDownList($model,'role',User::model()->getRoles()); ?>
                        <?php echo $form->error($model,'role'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'email'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'email',array('size'=>32,'maxlength'=>128)); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'password'); ?>
                    </td>
                    <td>
                        <?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32, 'value' => '')); ?>
                        <?php echo $form->error($model,'password'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'nick'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'nick',array('size'=>32,'maxlength'=>16)); ?>
                        <?php echo $form->error($model,'nick'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'name'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'surname'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'surname',array('size'=>32,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'surname'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'sex'); ?>
                    </td>
                    <td>
                        <?php echo $form->dropDownList($model,'sex', array('1' => Yii::t("UserModule.user", 'male'), '0' => Yii::t("UserModule.user", 'women'))); ?> 
                        <?php echo $form->error($model,'sex'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'company'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'company',array('size'=>32,'maxlength'=>128)); ?>
                        <?php echo $form->error($model,'company'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'city'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'city',array('size'=>32,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'city'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'postcode'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'postcode',array('size'=>16,'maxlength'=>16)); ?>
                        <?php echo $form->error($model,'postcode'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'address'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'address',array('size'=>32,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'address'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'tel1'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'tel1',array('size'=>16,'maxlength'=>16)); ?>
                        <?php echo $form->error($model,'tel1'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'tel2'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'tel2',array('size'=>16,'maxlength'=>16)); ?>
                        <?php echo $form->error($model,'tel2'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'site'); ?>                        
                    </td>
                    <td>
                        <?php echo $form->textField($model,'site',array('size'=>32,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'site'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'skype'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'skype',array('size'=>32,'maxlength'=>32)); ?>
                        <?php echo $form->error($model,'skype'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'icq'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'icq',array('size'=>10,'maxlength'=>10)); ?>
                        <?php echo $form->error($model,'icq'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <label><?php echo Yii::t('UserModule.user','In map')?></label>
                        <br /><br />
                        <p><?php echo Yii::t('UserModule.user','To add a marker - click on the map.')?></p>
                        <p><?php echo Yii::t('UserModule.user','To change the position of the marker - drag.')?></p>
                        <p><?php echo Yii::t('UserModule.user','To delete a marker - click the right mouse button.')?></p>
                    </td>
                    <td>
                        <?php echo $form->hiddenField($model,'lat'); ?>
                        <?php echo $form->hiddenField($model,'lng'); ?>
                        <script>var markers = [];</script>
                        <?php
                            $afterInit = array();
                        
                            Yii::import('application.extensions.EGMap.*');
                            
                            $gMap = new EGMap();
                            $gMap->setWidth(600);
                            $gMap->setHeight(500);
                            $gMap->zoom = 6;
                            $mapTypeControlOptions = array(
                              'position' => EGMapControlPosition::RIGHT_TOP,
                              'style' => EGMap::MAPTYPECONTROL_STYLE_HORIZONTAL_BAR
                            );

                            $gMap->mapTypeId = EGMap::TYPE_ROADMAP;
                            $gMap->mapTypeControlOptions = $mapTypeControlOptions;

                            // Preparing InfoWindow with information about our marker.
                            $info_window_a = new EGMapInfoWindow("<div class='gmaps-label' style='color: #000;'>Hi! I'm your marker!</div>");

                            // Setting up an icon for marker.
                            $icon = new EGMapMarkerImage("/img/symbol_blank.png");

                            $icon->setSize(32, 37);
                            //$icon->setAnchor(16, 16.5);
                            $icon->setOrigin(0, 0);

                            // Saving coordinates after user dragged our marker.
                            $dragevent = new EGMapEvent('dragend', "function (event) {
                                                                          $('#User_lat').val(event.latLng.lat());
                                                                          $('#User_lng').val(event.latLng.lng());
                                                                    }",
                                                        false,
                                                        EGMapEvent::TYPE_EVENT_DEFAULT
                            );
                            
                            $rightclickevent = new EGMapEvent('rightclick',
                                    'function (event) {'.
                                        'markers[0].setMap(null);'.
                                        'markers.length = 0;'.
                                        '$("#User_lat").val(0);$("#User_lng").val(0);'.
                                    '}',
                                    false,
                                    EGMapEvent::TYPE_EVENT_DEFAULT
                            );
                            
                            // If we have already created marker - show it
                            if($model->lat != 0 && $model->lng != 0)
                            {
                                $marker = new EGMapMarker($model->lat, $model->lng, array('title' => 'hello',
                                        'icon'=>$icon, 'draggable'=>true), 'marker', array('dragevent'=>$dragevent, 'rightclickevent' => $rightclickevent));
                                $marker->addHtmlInfoWindow($info_window_a);
                                $gMap->addMarker($marker);
                                $gMap->setCenter($model->lat, $model->lng);
                                $gMap->zoom = 16;
                                $afterInit = array('var markers = [];markers.push(marker);alert(markers.lenght);');
                                //$afterInit = array('alert(1);');
                               
                            // If we don't have marker in database - make sure user can create one
                            }
                            else
                            {
                                //$gMap->setCenter(38.348850, -0.477551);
                                //geocode
                                $sample_address = 'Столица Украины, Киев';
                                $geocoded_address = new EGMapGeocodedAddress($sample_address);
                                $geocoded_address->geocode($gMap->getGMapClient());
                                $gMap->setCenter($geocoded_address->getLat(), $geocoded_address->getLng());

                                // Setting up new event for user click on map, so marker will be created on place and respectful event added.
                                $gMap->addEvent(new EGMapEvent('click',
                                        'function (event) {'.
                                            'if(markers.length == 0){'.
                                                'var marker = new google.maps.Marker({position: event.latLng, map: '.$gMap->getJsName().
                                                ', draggable: true, icon: '.$icon->toJs().'}); '.$gMap->getJsName().
                                                '.setCenter(event.latLng); var dragevent = '.$dragevent->toJs('marker').';var rightclickevent = '.$rightclickevent->toJs('marker').';'.

                                                'markers.push(marker);'.
                                                '$("#User_lat").val(event.latLng.lat());$("#User_lng").val(event.latLng.lng());'.
                                            '}'.
                                        '}',
                                        false,
                                        EGMapEvent::TYPE_EVENT_DEFAULT)
                                );
                                

                            }
                            $gMap->renderMap($afterInit, Yii::app()->language);
                        ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'date_create'); ?>
                    </td>
                    <td>
                        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('CJuiDateTimePicker',
                                        array(
                                            'model'=>$model,
                                            'attribute'=> 'date_create',
                                            'mode'=>'datetime',
                                            'options'=>array(
                                                'dateFormat'=>'yy-mm-dd',
                                                'timeFormat' => 'hh:mm:ss',
                                            )
                                ));
                        ?>
                        <?php echo $form->error($model,'date_create'); ?>
                    </td>
                </tr>
                <tr class="odd">
                    <td class="label">
                        <?php echo $form->labelEx($model,'date_update'); ?>
                    </td>
                    <td>
                        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('CJuiDateTimePicker',
                                        array(
                                            'model'=>$model,
                                            'attribute'=> 'date_update',
                                            'mode'=>'datetime',
                                            'options'=>array(
                                                'dateFormat'=>'yy-mm-dd',
                                                'timeFormat' => 'hh:mm:ss',
                                            )
                                ));
                        ?>
                        <?php echo $form->error($model,'date_update'); ?>
                    </td>
                </tr>
                <tr class="even">
                    <td class="label">
                        <?php echo $form->labelEx($model,'date_last_visit'); ?>
                    </td>
                    <td>
                        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('CJuiDateTimePicker',
                                        array(
                                            'model'=>$model,
                                            'attribute'=> 'date_last_visit',
                                            'mode'=>'datetime',
                                            'options'=>array(
                                                'dateFormat'=>'yy-mm-dd',
                                                'timeFormat' => 'hh:mm:ss',
                                            )
                                ));
                        ?>
                        <?php echo $form->error($model,'date_last_visit'); ?>
                    </td>
                </tr>
            </table>


            <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')); ?>
            </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->

</div>