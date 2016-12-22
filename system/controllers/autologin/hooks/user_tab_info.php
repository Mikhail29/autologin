<?php

class onAutologinUserTabInfo extends cmsAction {

    public function run($profile, $tab_name){
        if($profile['id'] == cmsUser::getInstance()->id){
            return true;
        }
    }
}