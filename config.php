<?php 
// Product Details 
// Minimum amount is $0.50 US 
// Test Stripe API configuration 

define('STRIPE_API_KEY', 'sk_test_jXnbWYmNh6227VACFxp1gJog');  
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_d8GOWxzerUcB34ENyGG4fGi6'); 

define('STRIPE_SUCCESS_URL', 'http://localhost/Perfume/success.php'); 
define('STRIPE_CANCEL_URL', 'http://localhost/Perfume/cancel.php'); 

// Database configuration   
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'perfume'); 
?>