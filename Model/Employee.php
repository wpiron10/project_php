<?php

 class Employee extends Table
{
	public function __construct()
	{
		$table_name = 'employees';
		$primary_key_field_name = 'employeeNumber';
		$fields_names = ['lastName','firstName','extension','email','officeCode','reportsTo', 'jobTitle']; 
		parent::__construct($table_name, $primary_key_field_name, $fields_names);
	}
}

// utilisez les fonctions commencant par mysqli_ (PAS DE PDO ou autre lib)
// mysqli_


function get_all_employees()
{
	// retourne un tableau d'instances de la classe Film cotenant les infos de tout les orders
	$lines = my_fetch_array("select * from employees");
/*	echo "<pre>";
	var_dump($lines);
	echo "</pre>";
	die();*/
	$fields_names = ['lastName','firstName','extension','email','officeCode','reportsTo','jobTitle']; 
	$employees_objects = [];
	foreach ($lines as $line)
	{
		$employee = new Employee;
		$employee->lastName = $line['lastName'];
		$employee->firstName = $line['firstName'];
		$employee->extension = $line['extension'];
		$employee->email = $line['email'];
		$employee->officeCode = $line['officeCode'];
		$employee->reportsTo = $line['reportsTo'];
		$employee->jobTitle = $line['jobTitle'];
		$employees[] = $employee;
	}
	return $employees;
}

$employees = get_all_orders();

