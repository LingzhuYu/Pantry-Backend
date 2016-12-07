<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	public function index()
	{
		$result = 'This is the RPGCrafter backend site.';
		$this->data['pagebody'] = '';
		$this->data['title'] = "RPG pantry Backend";
		$this->data['content'] = $result;
		$this->render();
	}
}