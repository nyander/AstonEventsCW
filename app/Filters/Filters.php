<?php
namespace App\Filters;


use Illuminate\Http\Request;

abstract class Filters
{

	protected $request;

	protected $builder;

	protected $filters = [];

	public function __construct(Request $req) //this can only take the options from the Request class
	{

		$this->request = $req; //this will set the request to the selected Request option
	}

	public function apply($build)
	{
		$this->builder = $build;

		foreach($this->filters as $filter){

			if(method_exists($this, $filter) && $this->request->has($filter)){ //if the filter does exist and the request has a filter

			$this->$filter($this->request->$filter); //the filter will set to be the requested filter
			}
		}

		return $this->builder;
	}



}
