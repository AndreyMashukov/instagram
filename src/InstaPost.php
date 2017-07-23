<?php

namespace AdService;

use \Exception;
use \InstagramAPI\Instagram;

class InstaPost
    {

	/**
	 * Instagram
	 *
	 * @var Instagram
	 */
	private $_insta;

	/**
	 * Media to upload
	 *
	 * @var array
	 */
	private $_media;

	/**
	 * Prepare poster to work
	 *
	 * @param array $auth  User authorization data
	 * @param array $media Media to upload
	 * @param bool  $debug Debug status
	 *
	 * @return void
	 */

	public function __construct(array $auth, array $media, bool $debug = false)
	    {
		set_time_limit(0);
		date_default_timezone_set('UTC');
		$this->_insta = new Instagram($debug, false);

		try
		    {
			$this->_insta->setUser($auth["user"], $auth["pass"]);
			$this->_insta->login();
		    }
		catch (Exception $e)
		    {
			echo 'Something went wrong: '.$e->getMessage()."\n";
			exit(0);
		    }

		$this->_media = $media;
	    } //end __construct()


	/**
	 * Post (upload media to account)
	 *
	 * @param string $caption Caption text
	 *
	 * @return bool Post status
	 */

	public function post(string $caption):bool
	    {
		try
		    {
			$this->_insta->uploadTimelineAlbum($this->_media, ['caption' => $caption]);
			return true;
		    }
		catch (Exception $e)
		    {
			echo 'Something went wrong: '.$e->getMessage()."\n";
			return false;
		    }
	    } //end post()


    } //end class

?>
