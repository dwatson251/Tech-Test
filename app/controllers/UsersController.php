<?php

class UsersController extends Controller
{

	/** Lists users */
	public function index()
	{

		if(isset($_POST) && !empty($_POST)) {

			$people = $_POST["people"];
			
			var_dump($people);

			foreach($people as $key => $person) {

				$id = $key;

				if(isset($person["delete"]) && $person["delete"] === "1") {

					var_dump($key);
					$this->delete($id);

				} else {

					$this->update($id, $person);

				}
			}
		}

		$user = $this->model('User');

		$users = $user->fetchAll();

		return $this->view('user/index', $users);

	}

	/** Shows a specific user by ID */
	public function show($id = null)
	{

		$user = $this->model('User');

		$user->find($id);

		return $this->view('user/show', $user);

	}

	/**
	 * update
	 *
	 * Updates a specified user record with specified data 
	 *
	 * @param $id int | The ID of the user record
	 * @param $data array | The data to update the user with
	 */
	public function update($id, $data)
	{

		if($this->validate($data, [
			"forename" => "required",
			"surname" => "required",
			"role" => "required",
		])) {

			$user = $this->model('User');
			$user->find($id);

			foreach($data as $key => $value) {

				$user->{$key} = $value;
			}

			$user->save();
			
		}
	}

	public function delete($id)
	{

		$user = $this->model('User');
		$user->find($id);

		$user->delete($id);

	}

}