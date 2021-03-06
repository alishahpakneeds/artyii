<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/colorbox/colorbox.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/colorbox/jquery.colorbox.js"></script>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/tapmodo-Jcrop-1902fbc/js/jquery.Jcrop.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/tapmodo-Jcrop-1902fbc/js/jquery.color.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/tapmodo-Jcrop-1902fbc/css/jquery.Jcrop.css" type="text/css" />


<link   href="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/fineuploader.css?v=2" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/header.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/util.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/button.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/handler.base.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/handler.form.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/handler.xhr.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/uploader.basic.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/dnd.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/uploader.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/file-uploader-master/client/js/jquery-plugin.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/cdn/js/collage.js"></script>
<script>
    var scalew = 0;
    var scaleh = 0;
    var background_upload = 1;
    var tempImagePath = '<?php echo Yii::app()->request->baseUrl; ?>/collage/';
    var newimage = '';
    var imgkey = '';
    var ukey = '<?php echo $_GET["ukey"]; ?>';
    var imgpos = 5;
    $(document).ready(function() {
        loadprojectimages();
        collage.registerStep3Events();
        var fileuploadedname = '';
        var errorHandler = function(event, id, fileName, reason) {
            $("#btnSubmit").removeAttr('disabled', 'disabled');
            qq.log("id: " + id + ", fileName: " + fileName + ", reason: " + reason);
        };
        var uploader1 = new qq.FineUploader({
            element: $('#img1')[0],
            multiple: false,
            request: {
                endpoint: '<?php echo $this->createUrl('/upload/fileUpload'); ?>'
            },
            validation: {
                allowedExtensions: ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG']
            },
            text: {
                uploadButton: "IMAGE 1"
            },
            callbacks: {
                onError: errorHandler,
                onSubmit: function(id, fileName) {
                    newimage = '';
                    imgpos = 1;
                    $("#saveit").attr('disabled', 'disabled');
                },
                onComplete: function(id, fileName, responseJSON) {
                    newimage = fileName;
                    loadprojectimages();
                }
            }
        });
        var uploader2 = new qq.FineUploader({
            element: $('#img2')[0],
            multiple: false,
            request: {
                endpoint: '<?php echo $this->createUrl('/upload/fileUpload'); ?>'
            },
            validation: {
                allowedExtensions: ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG']
            },
            text: {
                uploadButton: "IMAGE 2"
            },
            callbacks: {
                onError: errorHandler,
                onSubmit: function(id, fileName) {
                    newimage = '';
                    imgpos = 2;
                    $("#saveit").attr('disabled', 'disabled');
                },
                onComplete: function(id, fileName, responseJSON) {
                    newimage = fileName;
                    loadprojectimages();
                }
            }
        });
        var uploader3 = new qq.FineUploader({
            element: $('#img3')[0],
            multiple: false,
            request: {
                endpoint: '<?php echo $this->createUrl('/upload/fileUpload'); ?>'
            },
            validation: {
                allowedExtensions: ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG']
            },
            text: {
                uploadButton: "IMAGE 3"
            },
            callbacks: {
                onError: errorHandler,
                onSubmit: function(id, fileName) {
                    newimage = '';
                    imgpos = 3;
                    $("#saveit").attr('disabled', 'disabled');
                },
                onComplete: function(id, fileName, responseJSON) {
                    newimage = fileName;
                    loadprojectimages();
                    
                }
            }
        });
        var uploader4 = new qq.FineUploader({
            element: $('#img4')[0],
            multiple: false,
            request: {
                endpoint: '<?php echo $this->createUrl('/upload/fileUpload'); ?>'
            },
            validation: {
                allowedExtensions: ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG']
            },
            text: {
                uploadButton: "IMAGE 4"
            },
            callbacks: {
                onError: errorHandler,
                onSubmit: function(id, fileName) {
                    newimage = '';
                    imgpos = 4;
                    $("#saveit").attr('disabled', 'disabled');
                },
                onComplete: function(id, fileName, responseJSON) {
                    newimage = fileName;
                    loadprojectimages();
                }
            }
        });
    });
    function loadprojectimages() {
        $.post('<?php echo $this->createUrl('/site/loadimages'); ?>', {
            newimage: newimage,
            ukey: ukey,
            imgpos: imgpos
        }, function(data) {

            if (data) {
                $('.imgblock').html(data.dataset);
            }
            if (data.message != '') {
                background_upload = 0;
            } else {
                background_upload = 1;
            }
            $("#saveit").removeAttr('disabled', 'disabled');
            collage.registerStep3Events();
            newimage = '';
        }, "json");
    }
    function deleteimages(object) {
        $("#saveit").removeAttr('disabled', true);
        $.post('<?php echo Yii::app()->request->baseUrl; ?>' + '/site/deleteimage', {
            imgkey: imgkey,
            ukey: ukey
        }, function(data) {

            if (data) {
                $('.imgblock').html(data.dataset);
            }
            if (data.message != '') {
                background_upload = 0;
            } else {
                background_upload = 1;
            }
            $("#saveit").removeAttr('disabled', true);
            collage.registerStep3Events();
            newimage = '';
        }, "json");
    }
    function make_background() {

        $("#saveit").removeAttr('disabled', 'disabled');
        $.post('<?php echo $this->createUrl('/site/makebackground'); ?>', {
            imgkey: imgkey,
            ukey: ukey
        }, function(data) {
            $('.imgblock').html(data.dataset);
            $("#saveit").removeAttr('disabled', 'disabled');
            newimage = '';
            loadprojectimages();
        });
    }

    function cropimage() {
        var cuimagekey = $('#cuimagekey').val();
        $.post('<?php echo Yii::app()->request->baseUrl; ?>' + '/site/cropimg', {
            imgkey: cuimagekey,
            ukey: ukey,
            x: g_x,
            y: g_y,
            w: g_w,
            h: g_h,
        }, function(data) {

            if (data) {
                $('.imgblock').html(data);
            }
            $("#savecrop").removeAttr('disabled', true);
            newimage = '';
            $.colorbox.close();
            collage.registerStep3Events();
        });
    }

    function scaleimage() {
        var cuimagekey = $('#cuimagekey').val();
        $.post('<?php echo Yii::app()->request->baseUrl; ?>' + '/site/scaleimg', {
            imgkey: cuimagekey,
            ukey: ukey,
            scalew: scalew,
            scaleh: scaleh
        }, function(data) {

            if (data) {
                $('.imgblock').html(data);
            }
            $("#savescale").removeAttr('disabled', true);
            newimage = '';
            $.colorbox.close();
            collage.registerStep3Events();
        });
    }
    $(function() {

    })


    var xxx = 1;
    var jcrop_api;
    var _icropimgkey = '';
    var g_x = '';
    var g_y = '';
    var g_w = '';
    var g_h = '';
    var orw = 0;
    var orh = 0;
    $(document).ready(function() {
       
    
    });
    function updateCoords(c)
    {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }
    ;</script>
<script>
    var ukey = '<?php echo $_GET["ukey"]; ?>';
    $(function() {
        $("#saveit").click(function() {
            window.location.href = '<?php echo $this->createUrl("site/collage"); ?>/' + "?ukey=" + ukey
        });
        $("#savebackit").click(function() {
            window.location.href = '<?php echo $this->createUrl("site/bgupload/"); ?>/' + "/?ukey=" + ukey
        });
    })
    var tempImagePath = '<?php echo Yii::app()->request->baseUrl; ?>/collage/';

</script>

<div id="gameSection" style="padding-top:0px;">
    <div style="min-height: 300px; background:white;">
        <div id="pageTitle" style="text-align: center;">
            <h2 class="thick-title page-title-bar">Project - <?php echo $model->name; ?></h2>
        </div>
        <br>
        <div style="text-align:center;"><span class="step"><b style="font-size:30px;">Step 3</b></span> <span class="headingname">Select Collage Images</span></div>
        <br>
        <!--    <div style="text-align: center;color:red;font-weight: bold;">
                                            *     To crop image, click the crop button below and use crop tool.<br>
                                            **    To scale image,  click the scale button below and use scale tool.<br>
                                            </div>-->
        <div style="width:100%;">
            <div class="form-group" style="width: 2%;float:left;" >

            </div>
            <div class="form-group" style="width: 23%;float:left;" >
                <div id="img1" class="unstyled" style="padding: 20px;">

                </div>
            </div>
            <div class="form-group" style="width: 23%;float:left;" >
                <div id="img2" class="unstyled" style="padding: 20px;">

                </div>
            </div>
            <div class="form-group" style="width: 23%;float:left;" >
                <div id="img3" class="unstyled" style="padding: 20px;">

                </div>
            </div>
            <div class="form-group" style="width: 23%;float:left;" >
                <div id="img4" class="unstyled" style="padding: 20px;">

                </div>
            </div>
        </div>

        <div style="clear: both;"></div>

        <div class="row imgblock" style="margin: 20px;" >

        </div>
        <div class="row" style="height: 20px;" >

        </div>
    </div>
    <div style="padding:20px;text-align: center;">
        <button style="cursor:pointer;" class="btn btn-success" id="savebackit" type="button">Back</button>
        <button style="cursor:pointer;" class="btn btn-success" id="saveit" type="button">Next</button>
    </div>
</div>

<div style='display:none'>
    <div id='inline_content' style='padding:10px; background:#fff;'>

        <p class="image_popup">
            <img class="display_avatar"  alt="images" src="" alt="no img choosen">
        <div style="text-align: center;margin-top:20px;">
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <input type="hidden" id="cuimagekeyx" name="cuimagekeyx" value="" />
            <button style="cursor:pointer;" class="btn btn-success" id="savecrop" type="button">Save</button>
        </div>
        </p>

    </div>
</div>

<div style='display:none'>
    <div id='inline_scale_content' style='padding:10px; background:#fff;'>

        <p class="image_popup">
            <img class="display_avatar_scale"  alt="images" src="" alt="no img choosen">
        <div style="text-align: center;margin-top:20px;">
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <input type="hidden" id="cuimagekey" name="cuimagekey" value="" />
            <button style="cursor:pointer;" class="btn btn-success" id="savescale" type="button">Save</button>
        </div>
        </p>

    </div>
</div>


