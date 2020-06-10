<?php

class actionAutologinDeleteUser extends cmsAction {

    public function run(){
        $is_can_use = cmsUser::isAdmin() || cmsUser::isAllowed('autologin', 'use');
        $current_user = cmsUser::getInstance();
        if (!$is_can_use) { cmsCore::error404(); }
        if (!$this->request->isAjax()){ cmsCore::error404(); }
        $rid = $this->request->get('record_id');
        $result = array('result' => 'failed');
        if($this->model->delete_user_in_list($rid))
        {
            $result = array('result' => 'success');
        }
        cmsTemplate::getInstance()->renderJSON($result);
    }
}