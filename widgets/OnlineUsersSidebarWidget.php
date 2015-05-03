<?php
/**
* OnlineUsersSidebarWidget
*
*/
class OnlineUsersSidebarWidget extends HWidget {

    public function run() {
        $limit = HSetting::Get('limit', 'onlineusers');
        $limit = ($limit == '' || $limit == null) ? 10 : $limit;
        $users = $this->getUsersOnline($limit);
        $this->render('onlineUsers', array(
            'users' => $users[1],
            'online' => $users[0]
        ));
    }

    public function getUsersOnline($limit = 10) {
        $criteria = new CDbCriteria;
        $criteria->group = 'user_id';
        $criteria->condition = 'user_id IS NOT null';
        $count = UserHttpSession::model()->count($criteria);
        if ($count > 0) {
            $onlineUsers = UserHttpSession::model()->findAll($criteria);
            $users = array();
            foreach ($onlineUsers as $user) {
                if (isset($user->user_id)) {
                    $users[] = $this->loadUser($user->user_id);
                }
            }
            return array($count, $users);
        }
        return array(0, false);
    }
    
    public static function loadUser($id) {
        return User::model()->findByPk($id);
    }

    public static function is_admin($id) {
        if ($u = self::loadUser($id)->attributes) {
            if ($u['super_admin'] == 1) 
            {
                return true;
            }
            return false;
        }
    }    

    
}
?>
