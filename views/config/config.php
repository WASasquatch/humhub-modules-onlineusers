
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('onlineusers.views_config', '<strong>Online Users</strong> Configuration'); ?></div>
    <div class="panel-body">
        <p>
            <?php echo Yii::t('onlineusers.views_config', 'You may configure the number of online users to be shown at once.'); ?>
            <?php echo Yii::t('onlineusers.views_config', 'Guest viewing is dictating by your authentication settings.'); ?>
        </p>
        <br/>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'online-users-configure-form',
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'limit'); ?>
            <?php echo $form->numberField($model, 'limit', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'limit'); ?>
        </div>
       
        <div class="form-group">
            <?php echo $form->labelEx($model, 'sortOrder'); ?>
            <?php echo $form->numberField($model, 'sortOrder', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'sortOrder'); ?>
        </div>
       
        <div class="form-group">
            <?php echo $form->labelEx($model,'adminBorderColor'); ?>
            <?php echo $form->textField($model,'adminBorderColor', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'adminBorderColor'); ?>
        </div>

        
        <div class="form-group">
            <?php echo $form->labelEx($model,'borderColor'); ?>
            <?php echo $form->textField($model,'borderColor', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'borderColor'); ?>

        </div>

        <hr>
        <?php echo CHtml::submitButton(Yii::t('onlineusers.views_config', 'Save'), array('class' => 'btn btn-primary')); ?>
        <a class="btn btn-default" href="<?php echo $this->createUrl('//admin/module'); ?>"><?php echo Yii::t('onlineusers.views_config', 'Back to modules'); ?></a>

        <?php $this->endWidget(); ?>
    </div>
</div>