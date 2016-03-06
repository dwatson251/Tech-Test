<?php

class User extends Model
{

	public $name;

	/** 
	 * To prevent unwanted data getting in to the database, I'm manually
	 * defining a list of fillable fields.
	 */
	protected $_fillable = [
		"firstname",
		"lastname",
		"email",
		"job_role"
	];
	
}