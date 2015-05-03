<?php
    Yii::app()->moduleManager->register(array(
        'id' => 'onlineusers',
        'class' => 'application.modules.onlineusers.OnlineUsersModule',
        // Secondary Classes
        'import' => array(
            'application.modules.onlineusers.*',
        ),
        // Events to Catch 
        'events' => array(
                array('class' => 'AdminMenuWidget', 'event' => 'onInit', 'callback' => array('OnlineUsersModule', 'onAdminMenuInit')),
                array('class' => 'DashboardSidebarWidget', 'event' => 'onInit', 'callback' => array('OnlineUsersModule', 'onSidebarInit')),
            ),
	));
?>