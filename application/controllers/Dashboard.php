<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // This is the view we want shown
        $result = 'These are not the droids you are looking for!';
		$this->data['pagebody'] = '';
		$this->data['content'] = $result;
        $this->render();

    }

}
