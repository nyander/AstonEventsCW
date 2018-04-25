<?php
//this page is specifically used when the user wants to filter the events.
namespace App\Filters;

use App\User;
use Carbon\Carbon;

class EventFilters extends Filters
{
	protected $filters = ['by','popular', 'past_events','futureevents'];

	protected function by($username)
	{
		$user = User::where('name', $username)->firstOrFail();

		return $this->builder->where('user_id' , $user->id);
	}

	protected function popular()  //these are the options which can be filtered out, this will return all of the events starting from the most favorited descending
	{
		$this->builder->getQuery()->orders = [];

		return $this->builder->orderBy('favorites_count','desc');
	}

	protected function past_events()
	{
		$this->builder->getQuery()->orders = [];

		return $this->builder->where('due_date', '<', Carbon::now());
	}

	protected function futureevents()
	{
		$this->builder->getQuery()->orders = [];

		return $this->builder->where('due_date', '>', Carbon::now());
	}

}
