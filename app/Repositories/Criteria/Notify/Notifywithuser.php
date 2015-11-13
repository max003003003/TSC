<?php namespace App\Repositories\Criteria\Notify;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;
use Illuminate\Contracts\Auth\Guard;

class Notifywithuser extends Criteria {

   private $user;
   public function __construct($user)
	{
		$this->user = $user;
	}
	/**
	 * @param $model
	 * @param Repository $repository
	 *
	 * @return mixed
	 */
	public function apply( $model, Repository $repository )
	{

		$model = $model->find($this->user->id);
		return $model;
	}

}
