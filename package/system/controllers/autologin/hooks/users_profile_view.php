<?php

class onAutologinUsersProfileView extends cmsAction
{
    public function run($profile) {
        cmsUser::sessionSet('last_viewed_user_id', $profile['id']);
        return $profile;
    }
}