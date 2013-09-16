<?php
include_once("forward_driver_abstract.php");
require_once ('Net/LDAP2.php');

class forward_driver_ldap implements forward_driver_abstract {

	function __construct($dsn) {
	}

	private function params_replace($username, $pattern) {
		list($local, $domain) = preg_split('/@/', $username);
		$search = array('%u',
						'%d',
						'%l');
		
		$replace = array($username,
						 $domain,
						 $local);

		return str_replace($search, $replace, $pattern);
	}

	private function get_connection($username, $rcmail) {
		$ldap_config = array(
			'host'		=> $rcmail->config->get('forward_ldap_host'),
			'port'		=> $rcmail->config->get('forward_ldap_port'),
			'starttls'	=> $rcmail->config->get('forward_ldap_starttls'),
			'version'	=> $rcmail->config->get('forward_ldap_version'),
			'basedn'	=> $this->params_replace($username, $rcmail->config->get('forward_ldap_basedn')),
			'binddn'	=> $rcmail->config->get('forward_ldap_binddn'),
			'bindpw'	=> $rcmail->config->get('forward_ldap_bindpwd'),
		);

		$ldap = Net_LDAP2::connect($ldap_config);
		if (Net_LDAP2::isError($ldap)) { return NULL; };
		
		return $ldap;
	}

	private function _do_crud($fn, $from, $to, $rcmail) {
		if (!($ldap = $this->get_connection($from, $rcmail))) {
			return FALSE;
		}
		
		$ret = false;
		
		do {
			$search = $ldap->search(
				$this->params_replace($from, $rcmail->config->get('forward_ldap_basedn')),
				$this->params_replace($from, $rcmail->config->get('forward_ldap_binddn_search_filter')));
			if (Net_LDAP2::isError($search)) { break; }
			if ($search->count() < 1) { break; };

			$entry = $search->shiftEntry();
			$dn = $entry->dn();

			$rc = $ldap->bind($dn, $rcmail->decrypt($_SESSION['password']));
			if (Net_LDAP2::isError($rc)) { break; }

			$ret = call_user_func($fn, $entry, $from, $to, $rcmail);

		} while(false);
		if ($ret)
			write_log("errors", "dopo di fn: $ret");

		$ldap->done();

		return $ret;
	}

	private function _add_new($entry, $from, $to, $rcmail) {
		$rc = $entry->add(
			array(
				$rcmail->config->get('forward_ldap_forwarding_attr')	=> $to
			)
		);
		if (Net_LDAP2::isError($rc)) { return false; }
		
		$rc = $entry->update();
		if (Net_LDAP2::isError($rc)) { return false; }

		return true;
	}

	private function _update($entry, $from, $to, $rcmail) {
		$rc = $entry->replace(
			array(
				$rcmail->config->get('forward_ldap_forwarding_attr')	=> $to
			)
		);
		if (Net_LDAP2::isError($rc)) { return false; }
		
		$rc = $entry->update();
		if (Net_LDAP2::isError($rc)) { return false; }

		return true;
	}

	private function _delete($entry, $from, $to, $rcmail) {
		$rc = $entry->delete(
			array(
				$rcmail->config->get('forward_ldap_forwarding_attr')	=> $to
			)
		);
		if (Net_LDAP2::isError($rc)) { return false; }
		
		$rc = $entry->update();
		if (Net_LDAP2::isError($rc)) { return false; }

		return true;
	}

	private function _get_list($entry, $from, $to, $rcmail) {
		$list = array();

		if ($entry->exists($rcmail->config->get('forward_ldap_forwarding_attr'))) {
			$list = $entry->getValue($rcmail->config->get('forward_ldap_forwarding_attr'), 'all');
		}

		return $list;
	}

	public function add_new($from, $to, $rcmail) {
		return $this->_do_crud(array (&$this, '_add_new'), $from, $to, $rcmail);
	}

	public function update($from, $to, $rcmail) {
		return $this->_do_crud(array (&$this, '_update'), $from, $to, $rcmail);
	}

	public function delete($from, $to, $rcmail) {
		return $this->_do_crud(array (&$this, '_delete'), $from, $to, $rcmail);
	}

	public function get_list($from, $rcmail) {
		return $this->_do_crud(array (&$this, '_get_list'), $from, NULL, $rcmail);
	}

}
?>
