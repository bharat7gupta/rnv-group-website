<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/** Page Title Constants */
defined('PAGE_TITLE')			OR define('PAGE_TITLE', 'RNV Software Services LLP');
defined('PAGE_TITLE_ADMIN')			OR define('PAGE_TITLE_ADMIN', 'RNV Software Services LLP - Admin');

/** App Constants */
defined('CONTACT_ADDRESS_TITLE')			OR define('CONTACT_ADDRESS_TITLE', 'Address');
defined('CONTACT_ADDRESS_FIRST_LINE')		OR define('CONTACT_ADDRESS_FIRST_LINE', 'RNV SOFTWARE SERVICES LLP,');
defined('CONTACT_ADDRESS_SECOND_LINE')		OR define('CONTACT_ADDRESS_SECOND_LINE', 'DC 102, NARAYANTALLA WEST, KOLKATA - 700059');
defined('CONTACT_ADDRESS_THIRD_LINE')		OR define('CONTACT_ADDRESS_THIRD_LINE', '(NEAR SBI ATM)');
defined('CONTACT_ADDRESS_LINK')				OR define('CONTACT_ADDRESS_LINK', 'https://www.google.com/maps/@22.6079658,88.4251686,21z');

defined('CONTACT_PHONE_DISPLAY_TEXT')		OR define('CONTACT_PHONE_DISPLAY_TEXT', 'Phone Number');
defined('CONTACT_PHONE_NUMBER')				OR define('CONTACT_PHONE_NUMBER', '+919073313918');
defined('CONTACT_PHONE_DISPLAY_NUMBER')		OR define('CONTACT_PHONE_DISPLAY_NUMBER', '+91 9073313918');

defined('CONTACT_EMAIL_DISPLAY_TEXT')		OR define('CONTACT_EMAIL_DISPLAY_TEXT', 'Email');
defined('CONTACT_EMAIL_VALUE')				OR define('CONTACT_EMAIL_VALUE', 'info@example.com');

defined('CONTACT_WHATSAPP_DISPLAY_TEXT')	OR define('CONTACT_WHATSAPP_DISPLAY_TEXT', 'WhatsApp');
defined('CONTACT_WHATSAPP_NUMBER')			OR define('CONTACT_WHATSAPP_NUMBER', '919073313918');
defined('CONTACT_WHATSAPP_DISPLAY_NUMBER')	OR define('CONTACT_WHATSAPP_DISPLAY_NUMBER', '+91 9073313918');

// Common Constants
defined('RUPEE_SYMBOL')	OR define('RUPEE_SYMBOL', '₹');

// Payment Constants
defined('PAYMENT_MODE')	OR define('PAYMENT_MODE', 'TEST'); // Values: TEST or PROD
defined('PAYMENT_TEST_APP_ID')	OR define('PAYMENT_TEST_APP_ID', '777596a3c20eafe59d75fa935777');
defined('PAYMENT_TEST_SECRET_KEY')	OR define('PAYMENT_TEST_SECRET_KEY', 'a49bc44880c9c9961b6e1b06103e2b20356a8a24');

defined('PAYMENT_PROD_APP_ID')	OR define('PAYMENT_PROD_APP_ID', '13720da9a0a44100bbd65c6b002731');
defined('PAYMENT_PROD_SECRET_KEY')	OR define('PAYMENT_PROD_SECRET_KEY', '94ca6fe4f5f396e65d256b3cf897d5824372bfe1');
