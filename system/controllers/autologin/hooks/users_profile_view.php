<?php

class onAutologinUsersProfileView extends cmsAction
{
    public function run($profile) {
        cmsUser::setCookie('last_viewed_user_id', $profile['id'], 31536000);
        return $profile;
    }
}