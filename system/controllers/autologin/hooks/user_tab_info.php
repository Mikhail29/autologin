<?php

class onAutologinUserTabInfo extends cmsAction {

    public function run($profile, $tab_name){
        $is_can_use = cmsUser::isAdmin() || cmsUser::isAllowed('autologin', 'use');
        if($profile['id'] == cmsUser::getInstance()->id && $is_can_use){
            return true;
        }
        else
        {
            return false;
        }
    }
}