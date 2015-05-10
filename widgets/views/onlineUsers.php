<div class="panel default">
    <div class="panel-heading">
        <?php echo Yii::t('OnlineUsersModule.views_OnlineUsers', '<strong>Online</strong> Users'); ?>
    </div>
    <div class="panel-body">
        <div id="onlineUsersPhrase" style="text-align: center;">
            <?php 
                echo Yii::t('OnlineUsersModule.views_OnlineUsers', 'We have a total of');
                echo ' ' . number_format($online) . ' ';
                echo Yii::t('OnlineUsersModule.views_OnlineUsers', 'user(s) online.');
            ?>
        </div>
        <hr />
        <?php
            if ($users):
                foreach ($users as $user):
                    $this->render('application.modules.onlineusers.widgets.views.user.showUser', array('user' => $user));
                endforeach;
            endif;
        ?>
    </div>
</div>
