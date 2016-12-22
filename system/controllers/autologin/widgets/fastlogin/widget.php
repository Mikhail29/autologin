<?php

class widgetAutologinFastlogin extends cmsWidget {

    public function run(){
        $user_id = cmsUser::getCookie('last_viewed_user_id');
        $autologin_model = cmsCore::getModel('autologin');
        $lvuser = $autologin_model->getUser(array('id' => $user_id));;
        return array(
            'lvuser'    => $lvuser
        );
    }
}