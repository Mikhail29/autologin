<?php

class backendAutologin extends cmsBackend
{
    public $useDefaultPermissionsAction = true;
    public function actionIndex()
    {
        $this->redirectToAction('perms', 'autologin');
    }
}