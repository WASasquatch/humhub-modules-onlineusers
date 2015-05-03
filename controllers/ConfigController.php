<?php

/**
 * Define configuration rules and run form input
 *
 */
class ConfigController extends Controller {

    public $subLayout = "application.modules_core.admin.views._layout";

    public function filters() {
        return array(
            'accessControl'
        );
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'expression' => 'Yii::app()->user->isAdmin()'
            ),
            array(
                'deny',
                'users' => array(
                    '*'
                )
            )
        );
    }

    public function actionConfig() {
        Yii::import('onlineusers.forms.*');
        
        $form = new OnlineUsersConfigureForm();
        
        if (isset($_POST['OnlineUsersConfigureForm'])) {
            $post = $_POST['OnlineUsersConfigureForm'];
            $post = Yii::app()->input->stripClean($post);
            $form->attributes = $post;
            if ($form->validate()) {
                $form->limit = HSetting::Set('limit', (int) $form->limit, 'onlineusers');
                $form->sortOrder = HSetting::Set('sortOrder', (int) $form->sortOrder, 'onlineusers');
                $form->borderColor = HSetting::Set('borderColor', $form->borderColor, 'onlineusers');
                $this->redirect(Yii::app()->createUrl('onlineusers/config/config'));
            }
        } else {
            $form->limit = HSetting::Get('limit', 'onlineusers');
            $form->sortOrder = HSetting::Get('sortOrder', 'onlineusers');
            $form->borderColor = HSetting::Get('borderColor', 'onlineusers');
        }
        
        $this->render('config', array(
            'model' => $form
        ));
    }

}

?>
