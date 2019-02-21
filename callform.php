<html>
<head>
	<title>Call Me Ishmael</title>
</head>
<body>
	<?php

    // Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php, 
    // following the instructions to install it with Composer.
    require __DIR__ . "/twilio-php-master/Twilio/autoload.php";
    use Twilio\Rest\Client;
    
    // Step 2: Set our AccountSid and AuthToken from https://twilio.com/console
    $AccountSid = "AC5515a85d9183f7e582817089e52e2040";
    $AuthToken = "a4c7469d91204885152689c8c332f756";

    // Step 3: Instantiate a new Twilio Rest Client
    $client = new Client($AccountSid, $AuthToken);


    // get the phone number from the page request parameters, if given
    if (isset($_REQUEST['PhoneNumber'])) {
    		    $number = htmlspecialchars($_REQUEST['PhoneNumber']);
    			// wrap the phone number or client name in the appropriate TwiML verb
    			// by checking if the number given has only digits and format symbols
    			if (preg_match("/^[\d\+\-\(\) ]+$/", $number)) {
                    // Initiate a new outbound call
            $call = $client->account->calls->create(
                // Step 4: Change the 'To' number below to whatever number you'd like 
                // to call.
                $number,

                // Step 5: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased or verified with Twilio.
                "+19782917751",

                // Step 6: Set the URL Twilio will request when the call is answered.
                array("url" => "http://104.131.32.123/ishmael/ishmael.php")
            );
            echo "Started call with " . $number;
    			} else {
    			 echo "Invalid Number";
    			}

    }
?>



<form action="#" method="post">
<input type="text" id="PhoneNumber" name="PhoneNumber"
      placeholder="Enter a phone number to call"/>
  <input type="submit" value="Submit">
</form>

</body>
</html>