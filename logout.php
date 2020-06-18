<?php
// Include api config file
require_once 'config.php';

// Revoke token & destroy session
$client->revokeToken();
session_destroy();

// Redirect to the homepage
header("Location: ".BASE_URL);
exit;
?>