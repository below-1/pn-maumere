<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
	/**
	 * The directory that holds the Migrations
	 * and Seeds directories.
	 *
	 * @var string
	 */
	public $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

	/**
	 * Lets you choose which connection group to
	 * use if no other is specified.
	 *
	 * @var string
	 */
	public $defaultGroup = 'default';

	/**
	 * The default database connection.
	 *
	 * @var array
	 */
	public $default = [
		// 'DSN'      => 'pgsql:host=127.0.0.1;port=5432;dbname=pn_maumere_db;user=postgres',
		'hostname' => 'localhost',
		'username' => 'postgres',
		'password' => '',
		'database' => 'pn_maumere_db',
		'DBDriver' => 'Postgre',
		// 'DBPrefix' => '',
		// 'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		// 'charset'  => 'utf8',
		// 'DBCollat' => 'utf8_general_ci',
		// 'swapPre'  => '',
		// 'encrypt'  => false,
		// 'compress' => false,
		// 'strictOn' => false,
		// 'failover' => [],
		'port'     => 5432,
	];

	/**
	 * This database connection is used when
	 * running PHPUnit database tests.
	 *
	 * @var array
	 */
	public $tests = [
		'DSN'      => '',
		'hostname' => '127.0.0.1',
		'username' => '',
		'password' => '',
		'database' => ':memory:',
		'DBDriver' => 'SQLite3',
		'DBPrefix' => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3306,
	];

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();

		$this->default['hostname'] = getenv('database.default.hostname');
		$this->default['username'] = getenv('database.default.username');
		$this->default['database'] = getenv('database.default.database');
		$this->default['password'] = getenv('database.default.password');
		$this->default['port'] = intval(getenv('database.default.database'));
		$this->default['DBDriver'] = getenv('database.default.DBDriver');
		// Ensure that we always set the database group to 'tests' if
		// we are currently running an automated test suite, so that
		// we don't overwrite live data on accident.
		if (ENVIRONMENT === 'testing')
		{
			$this->defaultGroup = 'tests';
		}

	}

	//--------------------------------------------------------------------

}
