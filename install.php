<?php

function install_package()
{
	$core   = cmsCore::getInstance();
	$db = cmsDatabase::getInstance();
	$is_controller_setup = $core->db->getRow('controllers', 'name="autologin"');
	 $config = cmsConfig::getInstance();
	 $admin  = cmsCore::getController('admin');
	 $path = $config->upload_path . $admin->installer_upload_path;
	 if($is_controller_setup)
	 {
         if($is_controller_setup["version"] != "2.0.0") {
             return $db->importDump($path . '/updateto210.sql');
         }
         else
         {
             return $db->importDump($path . '/updateto200.sql');
         }
	 }
	 else
	 {
         return $db->importDump($path . '/new-install.sql');
	 }
}