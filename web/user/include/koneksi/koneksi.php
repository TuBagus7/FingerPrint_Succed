<?php
//database
$db_server	= "localhost";
$db_username	= "ridikcco_localhostgocom";
$db_password	= "localhostgocom";
$database	= "ridikcco_databases_2024_helmi_absensi_fingerprint";

$php = substr(phpversion(), 0, 1);
if ($php == "7") {

	function is_mysqli_or_resource($r)
	{
		switch (gettype($r)) {
			case 'resource':
				return true;
			case 'object':
				if ($r instanceof mysqli) {
					return !($r->connect_error);
				}
				if ($r instanceof mysqli_result) {
					return true;
				}
				return false;
			default:
				return false;
		}
	}

	function is_mysql_resource($r)
	{
		return is_mysqli_or_resource($r);
	}

	function is_generic_resource($r)
	{
		return is_mysqli_or_resource($r);
	}

	function is_mysql_resource_old($result)
	{
		if (extension_loaded('mysql')) return is_resource($result);
		if (extension_loaded('mysqli')) return is_object($result);
		die('Fatal error, mysqli extension not loaded.');
	}

	if (!extension_loaded('mysql')) {
		if (!extension_loaded('mysqli')) die('Fatal error, mysqli extension not loaded.');
		$mysql_links = array();
		define('MYSQL_DEFAULT_HOST', ini_get("mysql.default_host"));
		define('MYSQL_DEFAULT_USER', ini_get("mysql.default_user"));
		define('MYSQL_DEFAULT_PASSWORD', ini_get("mysql.default_password"));

		define('MYSQL_CLIENT_COMPRESS', MYSQLI_CLIENT_COMPRESS);
		define('MYSQL_CLIENT_IGNORE_SPACE', MYSQLI_CLIENT_IGNORE_SPACE);
		define('MYSQL_CLIENT_INTERACTIVE', MYSQLI_CLIENT_INTERACTIVE);
		define('MYSQL_CLIENT_SSL', MYSQLI_CLIENT_SSL);
		define('MYSQL_ASSOC', MYSQLI_ASSOC);
		define('MYSQL_BOTH', MYSQLI_BOTH);
		define('MYSQL_NUM', MYSQLI_NUM);
		function mysql_field_bitflags_to_flags($flags_num)
		{

			$flags = array();
			$constants = get_defined_constants(true);
			foreach ($constants['mysqli'] as $c => $n) {
				if (preg_match('/MYSQLI_(.*)_FLAG$/', $c, $m)) {
					if (!array_key_exists($n, $flags)) {
						$flags[$n] = $m[1];
					}
				}
			}
			$result = array();
			foreach ($flags as $n => $t) {
				if ($flags_num & $n) {
					$result[] = $t;
				}
			}
			return implode(' ', $result);
		}
		function mysql_field_bittypes_to_types($type_id)
		{

			$types = array();
			$constants = get_defined_constants(true);
			foreach ($constants['mysqli'] as $c => $n) {
				if (preg_match('/^MYSQLI_TYPE_(.*)/', $c, $m)) {
					$types[$n] = $m[1];
				}
			}

			return array_key_exists($type_id, $types) ? $types[$type_id] : NULL;
		}
		function mysql_ensure_link($link_identifier)
		{
			if ($link_identifier === NULL) {
				global $mysql_links;
				if (!count($mysql_links)) return NULL;
				$last = end($mysql_links);
				return $last['link'];
			}

			return $link_identifier;
		}

		function mysql_affected_rows($link_identifier = NULL)
		{
			$temp = mysqli_affected_rows(mysql_ensure_link($link_identifier));
			if ($temp === NULL || $temp === false) {
				return -1;
			}
			return $temp;
		}

		function mysql_client_encoding($link_identifier = NULL)
		{
			$temp = mysqli_character_set_name(mysql_ensure_link($link_identifier));
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}
		function mysql_close($link = NULL)
		{

			global $mysql_links;
			$link = mysql_ensure_link($link);

			$thread_id = isset($link->thread_id) && is_numeric($link->thread_id) ? $link->thread_id : false;

			$result = mysqli_close($link);

			if ($result && $thread_id) {

				foreach ($mysql_links as $k => $v) {


					if ($v['thread_id'] === $thread_id) {

						array_splice($mysql_links, $k, 1);
						break;
					}
				}
			} else if ($result === null) {
				return false;
			}

			return $result;
		}

		function mysql_connect($server = MYSQL_DEFAULT_HOST, $username = MYSQL_DEFAULT_USER, $password = MYSQL_DEFAULT_PASSWORD, $new_link = false, $client_flags = 0)
		{
			global $mysql_links;

			if (!$new_link) {
				global $mysql_links;
				if (count($mysql_links)) {
					$last = end($mysql_links);
					if ($server === $last['server'] && $username === $last['username'] && $password === $last['password'] && is_resource($last['link'])) {
						return mysql_ensure_link(NULL);
					}
				}
			}
			$link = mysqli_connect($server, $username, $password, "");

			if (mysqli_connect_errno()) {

				return false;
			}


			$mysql_links[] = array(
				'thread_id' => $link->thread_id,
				'server' => $server,
				'username' => $username,
				'password' => $password,
				'link' => $link
			);

			return $link;
		}


		function mysql_create_db($database_name, $link_identifier = NULL)
		{

			return mysql_query('CREATE DATABASE ' . mysql_real_escape_string($database_name), $link_identifier);
		}


		function mysql_data_seek($result, $row_number)
		{

			$temp = mysqli_data_seek($result, $row_number);
			if ($temp === NULL) {
				return false;
			}
			return true;
		}


		function mysql_db_name($result, $row, $field = NULL)
		{

			$field = $field === null ? 0 : $field;

			return mysql_result($result, $row, $field);
		}

		function mysql_db_query($database, $query, $link_identifier = NULL)
		{

			if (mysql_select_db($database, $link_identifier) !== true) {
				return false;
			}
			return mysql_query($query, $link_identifier);
		}


		function mysql_drop_db($database_name, $link_identifier = NULL)
		{

			return mysql_query('DROP DATABASE ' . mysql_real_escape_string($database_name), $link_identifier);
		}

		function mysql_errno($link_identifier = NULL)
		{

			$temp = mysqli_errno(mysql_ensure_link($link_identifier));
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}


		function mysql_error($link_identifier = NULL)
		{

			$temp = mysqli_error(mysql_ensure_link($link_identifier));
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}

		function mysql_escape_string($unescaped_string)
		{

			return mysql_real_escape_string($unescaped_string);
		}

		function mysql_fetch_array($result, $result_type = MYSQL_BOTH)
		{

			$temp = mysqli_fetch_array($result, $result_type);


			if ($temp === NULL) {

				return false;
			}
			return $temp;
		}


		function mysql_fetch_assoc($result)
		{

			$temp = mysqli_fetch_assoc($result);


			if ($temp === NULL) {

				return false;
			}
			return $temp;
		}

		function mysql_fetch_field($result, $field_offset = NULL)
		{

			if (is_numeric($field_offset)) {

				mysqli_field_seek($result, $field_offset);
			}
			$temp = mysqli_fetch_field($result);

			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}

		function mysql_fetch_lengths($result)
		{

			$temp = mysqli_fetch_lengths($result);
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}


		function mysql_fetch_object($result, $class_name = NULL, $params = NULL)
		{



			if ($class_name !== NULL && $params !== NULL) {
				$temp = mysqli_fetch_object($result, $class_name, $params);
			} else if ($class_name !== NULL) {
				$temp = mysqli_fetch_object($result, $class_name);
			} else {
				$temp = mysqli_fetch_object($result);
			}


			if ($temp === NULL) {

				return false;
			}
			return $temp;
		}


		function mysql_fetch_row($result)
		{



			$temp = mysqli_fetch_row($result);

			if ($temp === NULL) {

				return false;
			}
			return $temp;
		}


		function mysql_field_flags($result, $field_offset)
		{

			$tmp = mysqli_fetch_field_direct($result, $field_offset);
			if (!is_object($tmp)) return false;
			$tmp = (array)$tmp;
			return isset($tmp['flags']) ? mysql_field_bitflags_to_flags($tmp['flags']) : false;
		}


		function mysql_field_len($result, $field_offset)
		{

			$tmp = mysqli_fetch_field_direct($result, $field_offset);
			if (!is_object($tmp)) return false;
			$tmp = (array)$tmp;
			return isset($tmp['length']) ? $tmp['length'] : false;
		}


		function mysql_field_name($result, $field_offset)
		{

			$tmp = mysqli_fetch_field_direct($result, $field_offset);
			if (!is_object($tmp)) return false;
			$tmp = (array)$tmp;
			return isset($tmp['name']) ? $tmp['name'] : false;
		}


		function mysql_field_seek($result, $field_offset)
		{

			$temp = mysqli_field_seek($result, $field_offset);
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}


		function mysql_field_table($result, $field_offset)
		{

			$tmp = mysqli_fetch_field_direct($result, $field_offset);
			if (!is_object($tmp)) return false;
			$tmp = (array)$tmp;
			return isset($tmp['table']) ? $tmp['table'] : false;
		}


		function mysql_field_type($result, $field_offset)
		{

			$tmp = mysqli_fetch_field_direct($result, $field_offset);
			if (!is_object($tmp)) return false;
			$tmp = (array)$tmp;
			return isset($tmp['type']) ? mysql_field_bittypes_to_types($tmp['type']) : false;
		}


		function mysql_free_result($result)
		{

			mysqli_free_result($result);

			return true;
		}


		function mysql_get_client_info($link_identifier = null)
		{

			return mysqli_get_client_info(mysql_ensure_link($link_identifier));
		}


		function mysql_get_host_info($link_identifier = NULL)
		{

			$temp = mysqli_get_host_info(mysql_ensure_link($link_identifier));
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}


		function mysql_get_proto_info($link_identifier = NULL)
		{

			$temp = mysqli_get_proto_info(mysql_ensure_link($link_identifier));
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}


		function mysql_get_server_info($link_identifier = NULL)
		{

			$temp = mysqli_get_server_info(mysql_ensure_link($link_identifier));
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}


		function mysql_info($link_identifier = NULL)
		{

			$temp = mysqli_info(mysql_ensure_link($link_identifier));
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}


		function mysql_insert_id($link_identifier = NULL)
		{

			$temp = mysqli_insert_id(mysql_ensure_link($link_identifier));
			if ($temp === null) {
				return false;
			}
			return $temp;
		}


		function mysql_list_dbs($link_identifier = NULL)
		{
			global $mysql_list_dbs_cache;


			$temp = mysql_query('SHOW DATABASES', mysql_ensure_link($link_identifier));

			$mysql_list_dbs_cache = $temp;


			if ($temp === NULL) {
				return false;
			}

			return $temp;
		}


		function mysql_list_fields($database_name, $table_name, $link_identifier = NULL)
		{

			return mysql_query('SHOW COLUMNS FROM ' . mysql_real_escape_string($database_name) . '.`' . mysql_real_escape_string($table_name) . '`', mysql_ensure_link($link_identifier));
		}


		function mysql_list_processes($link_identifier = NULL)
		{

			$temp = mysql_query("SHOW PROCESSLIST", mysql_ensure_link($link_identifier));
			if ($temp === null) {
				return false;
			}
			return $temp;
		}

		function mysql_list_tables($database_name, $table_name, $link_identifier = NULL)
		{

			return mysql_query('SHOW TABLES FROM ' . mysql_real_escape_string($database_name), mysql_ensure_link($link_identifier));
		}


		function mysql_num_fields($result)
		{


			$tmp = mysqli_fetch_fields($result);
			if ($tmp === null) {
				return false;
			}
			return count($tmp);
		}


		function mysql_num_rows($result)
		{

			return mysqli_num_rows($result);
		}


		function mysql_pconnect($server = MYSQL_DEFAULT_HOST, $username = MYSQL_DEFAULT_USER, $password = MYSQL_DEFAULT_PASSWORD, $client_flags = 0)
		{

			return mysql_connect('p:' . $server, $username, $password, true, $client_flags);
		}


		function mysql_ping($link_identifier = NULL)
		{

			$temp = mysqli_ping(mysql_ensure_link($link_identifier));
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}


		function mysql_query($query, $link_identifier = NULL)
		{

			return mysqli_query(mysql_ensure_link($link_identifier), $query);
		}


		function mysql_real_escape_string($unescaped_string, $link_identifier = NULL)
		{

			return mysqli_real_escape_string(mysql_ensure_link($link_identifier), $unescaped_string);
		}


		function mysql_result($result, $row, $field = 0)
		{

			if (mysqli_data_seek($result, $row) === false) return false;
			$row = mysqli_fetch_array($result);
			if ($row === NULL || !isset($row[$field])) return false;
			return $row[$field];
		}



		function mysql_select_db($database_name, $link_identifier = NULL)
		{

			return mysqli_select_db(mysql_ensure_link($link_identifier), $database_name);
		}


		function mysql_set_charset($charset, $link_identifier = NULL)
		{

			return mysqli_set_charset(mysql_ensure_link($link_identifier), $charset);
		}

		function mysql_stat($link_identifier = NULL)
		{

			$temp = mysqli_stat(mysql_ensure_link($link_identifier));
			if ($temp === FALSE) {
				return NULL;
			}
			return $temp;
		}

		function mysql_tablename($result, $i)
		{

			return mysql_result($result, $i);
		}

		function mysql_thread_id($link_identifier = NULL)
		{

			$temp = mysqli_thread_id(mysql_ensure_link($link_identifier));
			if ($temp === NULL) {
				return false;
			}
			return $temp;
		}
	}
}



mysql_connect($db_server, $db_username, $db_password) or die("Gagal konek ke server.");
mysql_select_db($database) or die("Gagal membuka database.");
$con_mysqli = mysqli_connect($db_server, $db_username, $db_password, $database);
$dbh = new PDO('mysql:host=' . $db_server . ';dbname=' . $database, $db_username, $db_password);
