<?php

namespace Tests;

use \AdService\InstaPost;
use \PHPUnit\Framework\TestCase;

class InstaTest extends TestCase
    {

	/**
	 * Should upload photos with caption
	 *
	 * @return void
	 */

	public function testShouldUploadPhotosWithCaption()
	    {
		$media = array(
			  array(
			   "type" => "photo",
			   "file" => "/home/newadservice/tests/datasets/post/info.jpg",
			  ),
			  array(
			   "type" => "photo",
			   "file" => "/home/newadservice/tests/datasets/post/info.jpg",
			  ),
			  array(
			   "type" => "photo",
			   "file" => "/home/newadservice/tests/datasets/post/info.jpg",
			  ),
			 );

		$insta = new InstaPost(["user" => "your login", "pass" => "your pass"], $media, true);
		$this->assertTrue($insta->post("test text"));
	    } //end testShouldUploadPhotosWithCaption()


    } //end class

?>
