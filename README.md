MailChimp Subscribe Example - PHP
---------------------------------
A bare-bones OOP rewrite of the MailChimp example code for an [email signup page](http://apidocs.mailchimp.com/api/downloads/#examples). Unstyled, with jQuery 1.7.1 used for AJAX submission/response.

Implementation
--------------
Add your MailChimp API key and list ID to inc/config.php. Optionally edit the messages array. Optionally edit the messages in js/validate.js.

```php
$api_key = '';
$list_id = '';
$messages = array(
    'missing' => 'Please enter your email address',
    'invalid' => 'Your email address seems to be invalid',
    'success' => 'Thank you! You will receive a confirmation email shortly',
);
```

Includes
--------
MailChimp - [PHP API wrapper v1.3.1](http://apidocs.mailchimp.com/api/downloads/#php)

[jQuery v1.7.1](http://jquery.com/)