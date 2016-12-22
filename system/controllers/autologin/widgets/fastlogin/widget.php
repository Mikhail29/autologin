<?php

class widgetAutologinFastlogin extends cmsWidget {

    public function run(){
        $user_id = cmsUser::sessionGet('last_viewed_user_id', false);
        $autologin_model = cmsCore::getModel('autologin');
        $lvuser = $autologin_model->getUser(array('id' => $user_id));
        if(cmsUser::get('id') == $user_id)            return false;
        return array(
            'lvuser'    => $lvuser
        );
    }
}