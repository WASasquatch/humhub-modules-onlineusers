<?php
/**
* OnlineUsersConfigureForm
*
*/
class OnlineUsersConfigureForm extends CFormModel {

    public $limit;
    public $sortOrder;
    public $borderColor;

    public function rules() {
        return array(
            array('limit', 'required', 'message'=>Yii::t('onlineusers.views_config', 'Please fill out all required fields.')),
        	array('limit', 'compare', 'compareValue'=>'10', 'operator'=>'>=', 'message'=> Yii::t('onlineusers.views_config', '<strong>10</strong> or more users must be shown at once.')),
            array('sortOrder', 'required', 'message'=>Yii::t('onlineusers.views_config', 'Please fill out all required fields.')),
        	array('sortOrder', 'compare', 'compareValue'=>'100', 'operator'=>'>=', 'message'=> Yii::t('onlineusers.views_config', 'Sort order must be greater then <strong>100</strong>')),
            array('borderColor', 'required', 'message'=>Yii::t('onlineusers.views_config', 'Please fill out all required fields.')),
            array('borderColor', 'match', 'pattern'=>'/^#[0-9a-f]{3,6}$/i', 'message'=>Yii::t('onlineusers.views_config', 'Please only enter hex color codes.'))
            );
    }

    public function attributeLabels() {
        return array(
            'limit' => Yii::t('onlineusers.views_config', 'Online Users to Show'),
            'sortOrder' => Yii::t('onlineusers.views_config', 'Widget Sort Order'),
            'borderColor' => Yii::t('onlineusers.views_config', 'Admin Border Color (Hex Code)')
        );
    }

}