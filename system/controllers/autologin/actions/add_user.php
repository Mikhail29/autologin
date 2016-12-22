<?php

class actionAutologinAddUser extends cmsAction {

    public function run(){
        $is_can_use = cmsUser::isAdmin() || cmsUser::isAllowed('autologin', 'use');
        $current_user = cmsUser::getInstance();
        if (!$is_can_use) { cmsCore::error404(); }
        if (!$this->request->isAjax()){ cmsCore::error404(); }
        $user_id = $this->request->get('user_id');
        $result = array('result' => 'success');
        if($current_user->id != $user_id)
        {
            $id = $this->model->add_user_in_list(array(
                'owner_id'      =>  $current_user->id,
                'uid'           =>  $user_id
            ));
            $result = array(
                'result' => 'success',
                'id'    =>  $id
            );
        }
        else
        {
            $result = array(
                'result' => 'failed'
            );
        }
        cmsTemplate::getInstance()->renderJSON($result);
    }
}