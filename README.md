# 

## 1. Installation

`composer require skvn/odnoklassniki`

## 2. Service Provider

* If Installed Socialite previously, remove `Laravel\Socialite\SocialiteServiceProvider` from your `providers[]` array in `config\app.php` if you have added it already.
* Add `Skvn\Sociopat\SociopatServiceProvider` to your `providers[]` array in `config\app.php`.

For example:
```php
'providers' => [
    // a whole bunch of providers
    // remove 'Laravel\Socialite\SocialiteServiceProvider',
    Skvn\Sociopat\SociopatServiceProvider::class, // add
];
```

* Note: If you would like to use the Socialite Facade, you need to [install it](http://laravel.com/docs/5.2/authentication#social-authentication).

## 3. Configuration

Add  the credentials for the  the providers you are going to use

#### Facebook


#### VK

#### Mail.ru

Add to `config/services.php`:
```php
'mailru' => [
    'client_id' => env('MAILRU_ID'),
    'client_secret' => env('MAILRU_SECRET'),
    'redirect' => env('MAILRU_REDIRECT'),  
],
```

Append provider values to your `.env` file:
```
// other values above
MAILRU_ID=your_app_id_for_the_service
MAILRU_SECRET=your_app_secret_for_the_service
MAILRU_REDIRECT=https://example.com/login
```

 
#### Odnoklassniki 
Add to `config/services.php`:
```php
'odnoklassniki' => [
    'client_id' => env('ODNOKLASSNIKI_ID'),
    'client_secret' => env('ODNOKLASSNIKI_SECRET'),
    'redirect' => env('ODNOKLASSNIKI_REDIRECT'),  
],
```

Append provider values to your `.env` file:
**Note: Add both public and secret keys!**
```
// other values above
ODNOKLASSNIKI_ID=your_app_id_for_the_service
ODNOKLASSNIKI_PUBLIC=your_app_public_for_the_service
ODNOKLASSNIKI_SECRET=your_app_secret_for_the_service
ODNOKLASSNIKI_REDIRECT=https://example.com/login
```

## Usage

### Login

For login examples please refer to the Laravel Socialite documentation

Also you an article in Russian is available. 
 