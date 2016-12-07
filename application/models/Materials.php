<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materials extends MY_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// public function getMaterialWithName($name)
	// {
	// 	// iterate over the data until we find the one we want
	// 	foreach ($this->data as $record)
	// 		if ($record['name'] == $name)
	// 			return $record;
	// 	return null;
	// }
	
	// public function get($which)
	// {
	// 	// iterate over the data until we find the one we want
	// 	foreach ($this->data as $record)
	// 		if ($record['id'] == $which)
	// 			return $record;
	// 	return null;
	// }

	// // retrieve all of the quotes
	// public function all()
	// {
	// 	return $this->data;
	// }

    // public function clear() {
    //     $this->session->unset_userdata('materials');
    //     echo 'materials transactions cleared!';
    // }

}
