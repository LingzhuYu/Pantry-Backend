<?php

/**
 * REST server for our diner materials.
 * Beefed up error handling & message to be more helpful.
 * Refactor to remove duplicate code, and to treat records as arrays.
 *
 * ------------------------------------------------------------------------
 */
require APPPATH . '/third_party/restful/libraries/Rest_controller.php';

class Material_list extends Rest_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('materials');
	}

	// Handle an incoming GET and return a materials item or all of them
	function index_get()
	{
		// check for item ID specified as query parameter or HTTP message property
		$key = $this->get('id');

		$this->crud_get($key);
	}

	// Handle an incoming GET and return 1 or all materials item
	function item_get($key = null)
	{
		// item ID specified as segment, query parameter or HTTP message property
		if (($key == null) || ($key == 'id'))
			$key = $this->get('id');

		$this->crud_get($key);
	}

	// Retrieve one identified item or all of them
	private function crud_get($key = null)
	{
		// no item requested; return them all
		if (!$key)
		{
			$this->response($this->materials->all(), 200);
			return;
		}

		// find & return a specific item
		$result = $this->materials->get($key);
		if ($result != null)
			$this->response($result, 200);
		else
			$this->response(array('error' => 'Read: materials item ' . $key . ' not found!'), 404);
	}


	// Handle an incoming POST - add a new materials item, ID in payload
	function index_post()
	{
		$this->crud_post($this->post());
	}

	// Handle an incoming POST - add a new materials item - ID in URL
	function item_post($key = null)
	{
		// decode record before anything, as assoc array
		$record = json_decode($this->post(),true);
		//var_dump($record);
		// item ID specified as segment or query parameter
		if (($key == null) || ($key == 'id'))
		{
			$key = $this->get('id');
			$record = array_merge(array('id' => $key), $record);
		} 

		$this->crud_post($record);
	}

	// Create a new item in our table
	private function crud_post($record = null)
	{
		$key = $record['id'];

		// Make sure the new record has an ID
		if (!isset($key))
		{
			$this->response(array('error' => 'Create: No item specified'), 406);
			return;
		}

		// make sure the item isn't already there
		if ($this->materials->exists($key))
		{
			$this->response(array('error' => 'Create: Item ' . $key . ' already exists'), 406);
			return;
		}

		// proceed with add
		$this->materials->add($record);

		// check for DB errors
		$oops = $this->db->error();
		if (empty($oops['code']))
			$this->response(array('ok'), 200);
		else
			$this->response($oops, 400);
	}

	// Handle an incoming PUT - update a new materials item, ID in payload
	function index_put()
	{
		$this->crud_put($this->put());
	}

	// Handle an incoming PUT - update a new materials item - ID in URL
	function item_put($key = null)
	{
		$incoming = key($this->put());

		// decode record before anything, as assoc array
		$record = json_decode($incoming,true);
		//var_dump($record);
		// item ID specified as segment or query parameter
		if (($key == null) || ($key == 'id'))
		{
			$key = $this->get('id');
			//var_dump($key);
			$record = array_merge(array('id' => $key), $record);
			//var_dump($record);
		}

		$this->crud_put($record);
	}

	// Update an item in our table
	private function crud_put($record = null)
	{
		$key = $record['id'];

		// Make sure the new record has an ID
		if (!isset($key))
		{
			$this->response(array('error' => 'Update: No item specified'), 406);
			return;
		}

		// make sure the item is real
		if (!$this->materials->exists($key))
		{
			$this->response(array('error' => 'Update: Item ' . $key . ' not found'), 406);
			return;
		}

		// proceed with update
		$this->materials->update($record);

		// check for DB errors
		$oops = $this->db->error();
		if (empty($oops['code']))
			$this->response(array('ok'), 200);
		else
			$this->response($oops, 400);
	}

	// Handle an incoming DELETE - delete a new materials item, ID in payload
	function index_delete()
	{
		$this->crud_delete($this->delete());
	}

	// Handle an incoming DELETE - delete a new materials item - ID in URL
	function item_delete($key = null)
	{
		// item ID specified as segment or query parameter
		if (($key == null) || ($key == 'id'))
		{
			$key = $this->get('id');
		} 

		$this->crud_delete($key);
	}

	// Delete an item in our table
	private function crud_delete($key = null)
	{
		// Make sure the new record has an ID
		if (!isset($key))
		{
			$this->response(array('error' => 'Delete: No item specified'), 406);
			return;
		}

		// make sure the item is real
		if (!$this->materials->exists($key))
		{
			$this->response(array('error' => 'Delete: Item ' . $key . ' not found'), 406);
			return;
		}

		// proceed with delete
		$this->materials->delete($key);
			$this->response(array('error' => $this->db->error(),
				'test'=>'testing'), 500);
			return;

		// check for DB errors
		$oops = $this->db->error();
		if (empty($oops['code']))
			$this->response(array('ok'), 200);
		else
			$this->response($oops, 400);
	}

	// return validation rules for front-end to use
	function rules_get()
	{
		$this->response($this->materials->rules(), 200);
	}

	// return an empty record, with properties per table metadata
	function create_get()
	{
		return $this->response($this->materials->create(), 200);
	}

}
