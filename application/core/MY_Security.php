<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class MY_Security extends CI_Security
{

	//overriding the normal csrf_verify, this gets automatically called in the Input library's constructor
	//verifying on POST and PUT and DELETE
	public function csrf_verify()
	{
		// If it's not a POST request we will set the CSRF cookie
		if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
			return $this->csrf_set_cookie();
		}

		// Check if URI has been whitelisted from CSRF checks
		if ($exclude_uris = config_item('csrf_exclude_uris')) {
			$uri = load_class('URI', 'core');
			foreach ($exclude_uris as $excluded) {
				if (preg_match('#^' . $excluded . '$#i' . (UTF8_ENABLED ? 'u' : ''), $uri->uri_string())) {
					return $this;
				}
			}
		}


		// Check CSRF token in HEADER variable
		$valid = isset($_SERVER["HTTP_" . str_replace("-", "_", $this->_csrf_token_name)], $_COOKIE[$this->_csrf_cookie_name])
			&& hash_equals($_SERVER["HTTP_" . str_replace("-", "_", $this->_csrf_token_name)], $_COOKIE[$this->_csrf_cookie_name]);

		// var_dump($_SERVER["HTTP_" . str_replace("-", "_", $this->_csrf_token_name)]);
		// var_dump($_COOKIE[$this->_csrf_cookie_name]);

		// Check CSRF token in POST variable
		if ($valid == FALSE) {
			// Check CSRF token validity, but don't error on mismatch just yet - we'll want to regenerate
			$valid = isset($_POST[$this->_csrf_token_name], $_COOKIE[$this->_csrf_cookie_name])
				&& hash_equals($_POST[$this->_csrf_token_name], $_COOKIE[$this->_csrf_cookie_name]);
		}


		// We kill this since we're done and we don't want to pollute the _POST array
		unset($_POST[$this->_csrf_token_name]);
		unset($_SERVER["HTTP_" . str_replace("-", "_", $this->_csrf_token_name)]);

		// Regenerate on every submission?
		if (config_item('csrf_regenerate')) {
			// Nothing should last forever
			unset($_COOKIE[$this->_csrf_cookie_name]);
			$this->_csrf_hash = NULL;
		}

		$this->_csrf_set_hash();
		$this->csrf_set_cookie();

		if ($valid !== TRUE) {
			$this->csrf_show_error();
		}

		log_message('info', 'CSRF token verified');
		return $this;
	}

	/**
	 * CSRF Set Cookie
	 *
	 * @codeCoverageIgnore
	 * @return	CI_Security
	 */
	public function csrf_set_cookie()
	{
		$expire = time() + $this->_csrf_expire;
		$secure_cookie = (bool) config_item('cookie_secure');

		if ($secure_cookie && !is_https()) {
			return FALSE;
		}

		setcookie(
			$this->_csrf_cookie_name,
			$this->_csrf_hash,
			$expire,
			config_item('cookie_path'),
			config_item('cookie_domain'),
			$secure_cookie,
			config_item('cookie_httponly')
		);
		log_message('info', 'CSRF cookie sent');

		return $this;
	}

	/**
	 * Set CSRF Hash and Cookie
	 *
	 * @return	string
	 */
	protected function _csrf_set_hash()
	{
		if ($this->_csrf_hash === NULL) {
			// If the cookie exists we will use its value.
			// We don't necessarily want to regenerate it with
			// each page load since a page could contain embedded
			// sub-pages causing this feature to fail
			if (
				isset($_COOKIE[$this->_csrf_cookie_name]) && is_string($_COOKIE[$this->_csrf_cookie_name])
				&& preg_match('#^[0-9a-f]{512}$#iS', $_COOKIE[$this->_csrf_cookie_name]) === 1
			) {
				return $this->_csrf_hash = $_COOKIE[$this->_csrf_cookie_name];
			}

			$rand = $this->get_random_bytes(256);
			$this->_csrf_hash = ($rand === FALSE)
				? md5(uniqid(mt_rand(), TRUE))
				: bin2hex($rand);
		}

		return $this->_csrf_hash;
	}

	// 	public function csrf_show_error()
	//     {
	//         // show_error('The action you have requested is not allowed.');  // default code

	//         // force page "refresh" - redirect back to itself with sanitized URI for security
	//         // a page refresh restores the CSRF cookie to allow a subsequent login
	//         header('Location: ' . htmlspecialchars($_SERVER['REQUEST_URI']), TRUE, 200);
	//     }

}
