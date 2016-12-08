<?php

class Materials extends MY_Model {

	// constructor
	function __construct()
	{
		parent::__construct();
	}

	function rules() {
		$config = [
			['field'=>'id', 'label'=>'Material code', 'rules'=> 'required|integer'],
			['field'=>'name', 'label'=>'Material name', 'rules'=> 'required'],
			['field'=>'price', 'label'=>'Material price', 'rules'=> 'required|decimal'],
			['field'=>'itemPerCase', 'label'=>'Material number per case', 'rules'=> 'required'],
			['field'=>'amount', 'label'=>'Material amount', 'rules'=> 'required']
		];
		return $config;
	}
}
