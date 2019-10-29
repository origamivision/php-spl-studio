<?php

namespace Origamivision\Stationplaylist;

use Origamivision\Stationplaylist\Exceptions\ConnectionFailedException;

class Command
{

	/**
	 * @var resource
	 */
	protected $fp;

	/**
	 * @var string
	 */
	protected $hostname;

	/**
	 * @var int
	 */
	protected $port;

	/**
	 * @var int
	 */
	protected $errno;

	/**
	 * @var string
	 */
	protected $errstr;

	/**
	 * @var float
	 */
	protected $timeout = 1;

	/**
	 * @var int
	 */
	protected $stream_timeout_seconds = 1;

	/**
	 * @var int
	 */
	protected $stream_timeout_microseconds = 0;
    
	function __construct(string $hostname, int $port = -1, float $timeout = 1)
	{
		$this->hostname = $hostname;
		$this->port = $port;
		$this->timeout = !$timeout ?? ini_get("default_socket_timeout");
		if (!$this->fp = @fsockopen($this->hostname, $this->port, $this->errno, $this->errstr, $this->timeout)) {
            throw new ConnectionFailedException("Unable to connect: {$this->errstr} ($this->errno)");
        }
        stream_set_timeout($this->fp, $this->stream_timeout_seconds, $this->stream_timeout_microseconds);
	}

	function cmd($data)
	{
		fputs($this->fp, $data);
		return $this->_read();
	}

	private function _read()
	{
		$r = [];
		while (!feof($this->fp)) {
			$r[] = fgets($this->fp, 128);
		}
		return $r;
	}

	function __destruct()
	{
        fclose($this->fp);
    }

}
