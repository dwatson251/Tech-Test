<?php

class Model {

	protected $table;

	public function __construct($model)
	{

		$this->table = strtolower($model);

		$this->db = new Database();

	}

	public function fetchAll()
	{

		/** Prepare and run the statement */
		$sth = $this->db->prepare("SELECT * FROM {$this->table}");
		$sth->execute();

		return $sth->fetchAll(PDO::FETCH_ASSOC);

	}


	public function find($id = null)
	{

		if($id) {

			/** Prepare and run the statement */
			$sth = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = {$id}");
			$sth->execute();

			$resultSet = $sth->fetchAll(PDO::FETCH_ASSOC);

			/** Check if the resultSet isn't empty */
			if(!empty($resultSet)) {

				/** Put the result set in to the model: */
				foreach($resultSet[0] as $rowKey => $rowValue) {	

					$this->{$rowKey} = $rowValue;
				}

			} else {

				// Return a 404, user not found
				echo "404: User with ID of {$id} not found";

			}


		}

	}

	public function delete($id = null)
	{	

		if($id !== null) {

			$sth = $this->db->prepare("DELETE FROM {$this->table} WHERE id = {$id}");
			$sth->execute();
		}

		return;

	}

	public function create($fields, $values)
	{	

		// If the resultSet is empty, create the row:
		$sth = $this->db->prepare("INSERT INTO {$this->table} ({$fields}) VALUES ({$values})");
		$sth->execute();

		return;

	}

	/** Persist the changes made to the object to the DB */
	public function save()
	{

		/** Build a set of data to insert/ update in to the DB */
		$updateData = [];

		/** Update the DB! */
		foreach($this as $key => $data) {

			if($this->isFillable($key)) {

				$updateData[$key] = $data;
			}
		}

		/** Build the SQL string */
		$sqlSet = "";

		foreach($updateData as $key => $value) {

			$updateData[$key] = "'".$value."'";

			$sqlSet .= "{$key}={$value}";

			/** http://stackoverflow.com/questions/1070244/how-to-determine-the-first-and-last-iteration-in-a-foreach-loop */
			/** Check if last element in array */
			end($updateData);
		    if ($key === key($updateData)) {

		        $sqlSet .= " ";
			} else {

				$sqlSet .= ", ";
			}
		}

		$fields = implode(",", array_keys($updateData));
		$values = implode(",", $updateData);

		/** Prepare and run the statements */
		if(isset($this->id)) {

			$sth = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = {$this->id}");
			$sth->execute();

			$resultSet = $sth->fetchAll(PDO::FETCH_ASSOC);

			/** Check if the resultSet isn't empty */
			if(!empty($resultSet)) {


				$sth = $this->db->prepare("UPDATE {$this->table} SET {$sqlSet} WHERE id = {$this->id}");
				$sth->execute();

			} else {

				$this->create($fields, $values);
			}
		} else {

			$this->create($fields, $values);
		}

	}

	public function isFillable($key)
	{

		return in_array($key, $this->_fillable);

	}

}