# CodeIgniter Google Authorized/Login
Get user info with google authorized

# Installation

- Install google API client library for PHP using composer. `composer require google/apiclient:^2.0`

```php
$config['composer_autoload'] = "vendor/autoload.php"; //Call Vendor google api
```
- For Obtaining your API keys go to [Google Devloper Console](https://console.developers.google.com/home/dashboard)
- In your google console you need to create and new application and for that application you need to create new credential keys.
- In your credential settings you need to specify the call-back url in Authorized redirect URIs field
- For example running on localhost : http://localhost/ci_gauth/auth/callback
