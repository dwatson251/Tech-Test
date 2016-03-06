<?php

class Controller
{

	protected function model($model)
	{

		$modelDir = '../app/models/' . $model . '.php';

		if(file_exists($modelDir))
		{

			require_once $modelDir;
			return new $model();
	
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

}