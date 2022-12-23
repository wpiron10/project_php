<?php

 class Order extends Table
{
	public function __construct()
	{
		$table_name = 'orders';
		$primary_key_field_name = 'orderNumber';
		$fields_names = ['orderDate','requiredDate','shippedDate','status','comments','customerNumber']; 
		parent::__construct($table_name, $primary_key_field_name, $fields_names);
	}
}

// utilisez les fonctions commencant par mysqli_ (PAS DE PDO ou autre lib)
// mysqli_


function get_all_orders()
{
	// retourne un tableau d'instances de la classe Film cotenant les infos de tout les orders
	$lines = my_fetch_array("select * from orders");
/*	echo "<pre>";
	var_dump($lines);
	echo "</pre>";
	die();*/
	$fields_names = ['orderDate','requiredDate','shippedDate','status','comments','customerNumber']; 
	$orders_objects = [];
	foreach ($lines as $line)
	{
		$order = new Order;
		$order->orderDate = $line['orderDate'];
		$order->requiredDate = $line['requiredDate'];
		$order->shippedDate = $line['shippedDate'];
		$order->status = $line['status'];
		$order->comments = $line['comments'];
		$order->customerNumber = $line['customerNumber'];
		$orders[] = $order;
	}
	return $orders;
}

$orders = get_all_orders();

