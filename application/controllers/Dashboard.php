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
        $result = 'THIS PAGE IS FOR BACKEND OF RPG CRAFTER! GO TO OUR FRONTEND PLEASE <3';
		$this->data['pagebody'] = '';
		$this->data['content'] = $result;
        $this->render();

    }

}
