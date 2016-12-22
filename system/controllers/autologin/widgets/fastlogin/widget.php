<?php

class widgetAutologinFastlogin extends cmsWidget {

    public function run(){
        $user_id = cmsUser::sessionGet('last_viewed_user_id', false);
        $autologin_model = cmsCore::getModel('autologin');
        $lvuser = $autologin_model->getUser(array('id' => $user_id));
        $user_rec = $autologin_model->is_user_add($user_id);
        $is_add = false;
        foreach ($user_rec as $value)
        {
            $user_rec = $value;
        }
        if($user_rec !== false)
        {
            $is_add = TRUE;
        }
        if(cmsUser::getInstance()->id == $user_id)            return false;
        return array(
            'lvuser'    => $lvuser,
            'user_rec'      => $user_rec,
            'is_add'    => $is_add
        );
    }
}