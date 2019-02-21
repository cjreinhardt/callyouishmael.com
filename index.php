<!DOCTYPE html>
<html lang="en">
<head>
    <title>Call You Ishmael</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Being Bootstrap Stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- End Bootstrap stylesheet -->
    <link rel="stylesheet" href="style.css">
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100757086-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>


    <div class="container">
        <div class="row justify-content-md-center">
            <div class="jumbotron">
                <img src="whale.png" class="img-fluid whale"/>
                <h1>Call You Ishmael</h1>

                <!-- start form -->
                <form action="#" method="post" class="form-inline">
                    <div class="form-group">
                        <input type="text" id="PhoneNumber" name="PhoneNumber" placeholder="Phone Number" class="form-control mb-2 mr-sm-2 mb-sm-0 col-form-label-lg"/>
                        <input type="submit" value="Call" class="btn btn-primary btn-lg"></div>
                </form>
                <!-- end form -->

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
                            if ((preg_match("/^[\d\+\-\(\) ]+$/", $number)) && (strlen($number) > 9)){
                                // Initiate a new outbound call
                        $call = $client->
                            account->calls->create(
                            // Step 4: Change the 'To' number below to whatever number you'd like 
                            // to call.
                            $number,

                            // Step 5: Change the 'From' number below to be a valid Twilio number 
                            // that you've purchased or verified with Twilio.
                            "+19782917751",

                            // Step 6: Set the URL Twilio will request when the call is answered.
                            array("url" => "http://www.callyouishmael.com/ishmael.php", "timeout" => "10")
                        );
                        echo "
                            <div class='alert alert-success' role='alert'> <strong>Started call with</strong>
                                " . $number . "
                            </div>
                            "; 
                            } else {
                                echo "
                            <div class='alert alert-danger' role='alert'> <strong>Invalid Number</strong>
                            </div>
                            ";
                            }

                }
            ?>
                <div class="row buttons">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#whatisthis">What is this?</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#disclaimer">Disclaimer</button>
                       
                        </div>
                </div>
            </div>
        </div>

        <!-- start what is this modal -->
        <div class="modal fade" id="whatisthis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">What is this?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p>Call You Ishamel is a service that brings Moby Dick directly to your phone!  Through the power of text to speech technology, you can now experience Melville's classic novel no matter your location! Just enter your phone number and Call You Ishmael will call <strong>you</strong>!</p>
                    <small class="copyright"><a href="mailto:creinhardt+ishmael@gmail.com">Copyright 2017 Chris Reinhardt</a></small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end what is this moda; --> 


        <!-- start disclaimer modal -->
        <div class="modal fade" id="disclaimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Disclaimer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p>We will not sell your phone number, or use it for any purpose other than forcing a computer to read you Moby Dick.</p><p>Please use this for good, not evil.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end disclaimer moda; --> 


        </div>

    <!-- Begin bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- End Bootstrap JS -->

</body>
</html>