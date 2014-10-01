<div id="pageTitle">
    <h2 class="thick-title page-title-bar">Create Project</h2>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="wrapper-box">
            <div class="wrapper-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div id="gameSection" style="padding-top:0px;">
                            <div class="textblock">
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'contactus',
                                    'enableAjaxValidation' => false,
                                    'htmlOptions' => array(
                                        'enctype' => 'multipart/form-data',
                                    ),
                                ));
                                ?>           <div id="contactus_es_" class="errorSummary" style="display:none"><p>Please fix the following input errors:</p>
                                    <ul><li>dummy</li></ul></div>            
                                <fieldset style="width:96%;">
                                    <legend style="color:white;">Project Form</legend>




                                    <div class="container">
                                        <?php echo $form->labelEx($model, 'name'); ?>
                                        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'name'); ?>
                                    </div>
                                    <br><br>
                                    <div class="container">
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn btn-success")); ?>
                                    </div>

                                </fieldset>
                                <?php $this->endWidget(); ?>   

                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



