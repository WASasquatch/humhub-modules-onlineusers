<?php
/**
* OnlineUsersController
*
*/
class OnlineUsersController extends Controller {

    public function filters() {
        return array(
            'accessControl'
        ); 
    }


    public function accessRules() {
        return array(
            array('allow', 
                'users' => array('@', (HSetting::Get('allowGuestAccess', 'authentication_internal')) ? "?" : "@"),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

}

?>
