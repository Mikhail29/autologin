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
}