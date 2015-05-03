<?php

class OnlineUsersModule extends HWebModule {
  
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem(array(
            'label' => Yii::t('onlineusers.views_config', 'Online Users Widget'),
            'url' => Yii::app()->createUrl('//onlineusers/config/config'),
            'group' => 'manage',
            'icon' => '<i class="fa fa-globe"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == '' && Yii::app()->controller->id == 'admin'),
            'sortOrder' => 300,
        ));
    }

    /**
     * On build of the dashboard sidebar widget, add the mostactiveusers widget if module is enabled.
     *
     * @param type $event            
     */
    public static function onSidebarInit($event)
    {
        if (Yii::app()->moduleManager->isEnabled('onlineusers')) {
            if (($sortOrder = HSetting::Get('sortOrder', 'onlineusers')) == null) {
                HSetting::Set('sortOrder', 300, 'onlineusers');
                $sortOrder = 300;
            }
            $event->sender->addWidget('application.modules.onlineusers.widgets.OnlineUsersSidebarWidget', array(), array(
                'sortOrder' => $sortOrder
            ));
        }
    }

    public function enable() {
        if (! $this->isEnabled()) {
            // set default config values
            HSetting::Set('limit', 10, 'onlineusers');
            HSetting::Set('sortOrder', 300, 'onlineusers');
            HSetting::Set('borderColor', '#990000', 'onlineusers');
        }
        parent::enable();
    }

}

?>
