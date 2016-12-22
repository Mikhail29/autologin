<?php

class autologin extends cmsFrontend
{
    public function actionIndex($user_id = false)
    {
        $user = $this->model->getUser(array('id' => $user_id));
        $is_can_use = cmsUser::isAdmin() || cmsUser::isAllowed('autologin', 'use');
        $current_user = cmsUser::getInstance();
        if($user_id && $user_id != $current_user->id && $is_can_use)
        {
            cmsEventsManager::hook('user_login', $user);

            cmsUser::sessionSet('user', array(
                'id' => $user['id'],
                'groups' => $user['groups'],
                'time_zone' => $user['time_zone'],
                'perms' => cmsUser::getPermissions($user['groups'], $user['id']),
                'is_admin' => $user['is_admin']
            ));
            cmsEventsManager::hook('auth_login', $user['id']);
            $this->model->set_online($_COOKIE['PHPSESSID'], $user_id);

        }
        else 
        {
            $this->redirect('/users/'.$current_user->id);
        }
        $this->redirect('/users/'.$user_id);
    }
}