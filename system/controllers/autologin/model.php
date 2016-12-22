<?php

class modelAutologin extends cmsModel
{
    public function getUser ($fields = array()) {
		if (is_array($fields) && !empty($fields)) {
			$users = cmsCore::getModel('users');
			foreach ($fields as $field => $value) {
				$users->filterEqual($field, $value);
			}
			return $users->getUser();
		}
		return false;
	}
        
        public function set_online($sesid, $user_id)
        {
            if($this->getItemByField('sessions_online', 'session_id', $sesid))
            {
                $this->filterEqual('session_id', $sesid);
                $result = $this->updateFiltered('sessions_online', array(
                    'user_id'   => $user_id
                ));
                $this->resetFilters();
            }
            else 
            {
                return $this->insert('sessions_online', array(
                    'session_id'    => $sesid,
                    'user_id'       => $user_id
                ));
            }
        }
        
        public function get_users_in_list($user_id)
        {
            $this->filterEqual('owner_id', $user_id);
            $users = $this->get('autologin_userlist');
            $this->resetFilters();
            return $users;
        }
        
        public function add_user_in_list($user)
        {
            return $this->insert('autologin_userlist', $user);
        }
        
        public function delete_user_in_list($id)
        {
            return $this->delete('autologin_userlist', $id);
        }
}