# callyouishmael.com
A website that forces a robot to call you and read you Moby Dick.  Uses Twilio.
Project by Chris Reinhardt - creinhardt@gmail.com

## Usage
1. Sign up for a Twilio account: https://twilio.com
2. Setup a Programmable Voice number (there will be a small fee for this, info here https://www.twilio.com/voice/pricing/us).
1. Clone this repository.
2. Rename config-sample.php to config.php
3. In config.php enter your AccountSid and AuthToken from https://twilio.com/console
4. Enter your Programmable Voice number as the 'FromNumber'.
5. Enter the URL of the file Twilio will request when the call is answered as 'CallURL'.  For this project it is ishmael.php.  
6.  That's it!  When someone enters their number in the form on index.php Twilio will call them from your Programmable Voice number and read the script from ishmael.php.  
