<?php
 
// PayPal configuration
define('PAYPAL_ID', 'shiramt@mta.ac.il'); //Business Email
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE

define('PAYPAL_RETURN_URL', 'http://isshiramt.mtacloud.co.il/ParentKidsCare/pay_success.php');
define('PAYPAL_CANCEL_URL', 'http://isshiramt.mtacloud.co.il/ParentKidsCare/pay_cancel.php');
define('PAYPAL_NOTIFY_URL', 'http://isshiramt.mtacloud.co.il/ParentKidsCare/pay_ipn.php');
define('PAYPAL_CURRENCY', 'USD');

// Change not required
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
?>