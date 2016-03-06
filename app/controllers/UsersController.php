<?php

class UsersController extends Controller
{

	/** List users */
	public function index ()
	{

		$user = $this->model('User');
		$user->name = "Dan";

		echo $user->name;

		return $this->view('user/index', ['name' => $user->name]);

	}

}