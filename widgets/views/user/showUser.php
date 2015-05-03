<?php
    $border = '#EDEDED';
    if($user->attributes['super_admin'] == 1) {
        $border = HSetting::Get('borderColor', 'onlineusers');
    }
?>
<a href="<?php echo $user->getProfileUrl() ?>"> 
    <img src="<?php echo $user->getProfileImage()->getUrl() ?>" class="media-object tt space-widget-member-image img-rounded pull-left" 
        style="width: 40px; height: 40px; border: 2px solid <?php echo $border; ?>; margin-right: 4px;" alt="40x40" data-src="holder.js/40x40" data-toggle="tooltip" data-placement="top" title="" 
        data-original-title="<strong><?php echo $user->displayName ?></strong><br /><?php echo $user->profile->title ?>" />
</a>