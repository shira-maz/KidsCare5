<?php
session_start();

$enableSandbox = true;

$dbConfig = [
	'host' => "localhost",
	'username' => "isshiramt",
	'password' => "Aa123456",
	'name' => "isshiram_kidsCare"
];

$paypalConfig = [
	'email' => 'shiramt@mta.ac.il',
	'return_url' => 'http://isshiramt.mtacloud.co.il/kidsCare/ParentKidsCare/payment-successful.php',
	'cancel_url' => 'http://isshiramt.mtacloud.co.il/kidsCare/ParentKidsCare/payment-cancelled.php',
	'notify_url' => 'http://isshiramt.mtacloud.co.il/kidsCare/ParentKidsCare/payments.php'
];


$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

$itemName = 'Monthly payment';
$itemAmount = 2000.00;

require 'functions.php';

if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

	$data = [];
	foreach ($_POST as $key => $value) {
		$data[$key] = stripslashes($value);
	}

	$data['business'] = $paypalConfig['email'];

	$data['return'] = stripslashes($paypalConfig['return_url']);
	$data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
	$data['notify_url'] = stripslashes($paypalConfig['notify_url']);

	$data['item_name'] = $itemName;
	$data['amount'] = $itemAmount;
	$data['currency_code'] = 'ILS';

	$data['custom'] = $username1;
	
	$queryString = http_build_query($data);

	header('location:' . $paypalUrl . '?' . $queryString);
	exit();

} else {
	$db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);

	$data = [
		'item_name' => $_POST['item_name'],
		'item_number' => $_POST['item_number'],
		'payment_status' => $_POST['payment_status'],
		'payment_amount' => $_POST['mc_gross'],
		'payment_currency' => $_POST['mc_currency'],
		'txn_id' => $_POST['txn_id'],
		'receiver_email' => $_POST['receiver_email'],
		'payer_email' => $_POST['payer_email'],
		'custom' => $_POST['custom'],
	];

	if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {
		if (addPayment($data) !== false) {
		}
	}
}
