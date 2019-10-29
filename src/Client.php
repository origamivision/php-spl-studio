<?php

namespace Origamivision\Stationplaylist;

use Origamivision\Stationplaylist\Command;

class Client
{

	/**
	 * @var string
	 */
	protected $ip;

	/**
	 * @var int
	 */
	protected $port;

	/**
	 * @var 
	 */
	protected $command;
    
	function __construct($ip = '', $port = 0)
	{
		$this->ip = $ip;
		$this->port = $port;

		$this->command = new Command($this->ip, $this->port);
	}

	function search(String $lookup = '*')
	{
		return $this->command('Search='.$lookup);
	}

	function command(String $query = '')
	{
		return $this->command->cmd($query);
	}

}
