<?php

class Controller
{

	protected function model($model)
	{

		$modelDir = '../app/models/' . $model . '.php';

		if(file_exists($modelDir))
		{

			require_once $modelDir;
			return new $model($model);
	
		}

	}

	protected function view($view, $data = [])
	{

		$viewDir = '../app/views/' . $view . '.php';

		if(file_exists($viewDir))
		{

			require_once $viewDir;

		}

	}

	protected function validate($data, $values)
	{

		$isValid = true;

		/** Loop through all the fields needed to validate */
		foreach($values as $field => $validation) {

			$validates = explode("|", $validation);

			foreach($validates as $validate) {

				switch($validate) {

					case "required": 

						if(empty($data[$field]) || strlen(trim($data[$field])) === 0) {

							$isValid = false;
						}
					break;
				}

			}

		}

		return $isValid;

	}

}