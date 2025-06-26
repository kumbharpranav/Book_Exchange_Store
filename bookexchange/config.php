<?php

//start session on web page


//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1065556439398-v47av33khkc3dfjvktp89brg4pjg7hn2.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/bookexchange/indexuser.php');

// to get the email and profile 
$google_client->addScope('email');


$google_client->addScope('profile');

?> 