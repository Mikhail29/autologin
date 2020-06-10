<?php

class onAutologinUserTabShow extends cmsAction {

    public function run($profile, $tab_name, $tab){
        $user = cmsUser::getInstance();
        $is_can_use = cmsUser::isAdmin() || cmsUser::isAllowed('autologin', 'use');
        if(!$is_can_use)            cmsCore::error404 ();
        $template = cmsTemplate::getInstance();
        $list_html = '';
        $user_model = cmsCore::getModel('users');
        if ($user->id == $profile['id']){
            cmsUser::sessionSet('last_viewed_user_id', $profile['id']);
        }
        if($user_list = $this->model->get_users_in_list($profile['id'])):
            foreach ($user_list as $single_user) {
                $single_user_info = $user_model->getUser($single_user['uid']);
                $list_html .= '<div class = "user"><a href = "/autologin/index/'.$single_user['uid'].'">'.LANG_AUTOLOGIN_LOGIN.$single_user_info['nickname'].'</a>'.
                        '<a class = "delete-user" style = "float:right" href = "'.$single_user['id'].'">'.LANG_AUTOLOGIN_lIST_DELETE_USER.'</a></div>';
            }
        else:
            $list_html = '<b>Не найдено ни одного пользователя.</b>';
        endif;
        return $template->renderInternal($this, 'profile_tab', array(
            'user'    => $user,
            'tab'     => $tab,
            'profile' => $profile,
            'html'    => $list_html
        ));
    }
}