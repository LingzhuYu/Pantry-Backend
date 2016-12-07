<?php
/**
 * REST server for ferry schedule operations.
 * This one manages ports.
 *
 * ------------------------------------------------------------------------
 */
require APPPATH . '/third_party/restful/libraries/Rest_controller.php';
class Maintenance extends Rest_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Materials');
	}

	// Handle an incoming GET ... 	returns a list of ports
	function index_get()
	{
		$key = $this->get('id');
		if(!$key)
		{
			$this->response($this->Materials->all(), 200);
		} else {
			$result = $this->Materials->get($key);
			if($result != null)
			{
				$this->response($result, 200);
			} else {
				$this->response(array('error' => 'Materials item not found!'), 404);
			}
		}
	}
	
    // Handle an incoming GET ... return 1 Materials item
	function item_get()
	{
		$key = $this->get('id');
    	$result = $this->Materials->get($key);
    	if ($result != null)
        	$this->response($result, 200);
    	else
        	$this->response(array('error' => 'Materials item not found!'), 404);
	}

	// Handle an incoming POST - add a new Materials item
	function index_post()
	{
	    $key = $this->get('id');
	    $record = array_merge(array('id' => $key), $_POST);
	    $this->Materials->add($record);
	    $this->response(array('ok'), 200);
	}

    // Handle an incoming POST - add a new Materials item
	function item_post()
	{
	    $key = $this->get('id');
	    $record = array_merge(array('id' => $key), $_POST);
	    $this->Materials->add($record);
	    $this->response(array('ok'), 200);
	}

	// Handle an incoming PUT - update a Materials item
	function index_put()
	{
	    $key = $this->get('id');
	    $record = array_merge(array('id' => $key), $this->_put_args);
	    $this->Materials->update($record);
	    $this->response(array('ok'), 200);
	}

	// Handle an incoming DELETE - delete a Materials item
	function item_delete()
	{
	    $key = $this->get('id');
	    $this->Materials->delete($key);
	    $this->response(array('ok'), 200);
	}
	
}