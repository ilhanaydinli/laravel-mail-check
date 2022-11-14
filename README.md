# Laravel Mail Check

Check sending email using Laravel's mail settings.

## Installation

Via Composer

```bash
composer require ilhanaydinli/laravel-mail-check
```

The package will automatically register itself.

#### View

If you want to configure the mail to be sent, you can publish the view.

```bash
php artisan vendor:publish --provider="IlhanAydinli\LaravelMailCheck\MailCheckProvider" --tag="views"
```

## Usage

```bash
php artisan mail:check
```

#### Successful Result

```bash
$ php artisan mail:check
****************************************
*     Please Wait - E-Mail Sending     *
****************************************

E-mail sending was successful.
```

#### Unsuccessful Result

```bash
$ php artisan mail:check
****************************************
*     Please Wait - E-Mail Sending     *
****************************************

Failed to authenticate on SMTP server with username "---" using the following authenticators: "CRAM-MD5", "LOGIN", "PLAIN". Authenticator "CRAM-MD5" returned "Expected response code "235" but got code "535", with message "535 5.7.0 Invalid login or password".". Authenticator "LOGIN" returned "Expected response code "235" but got code "535", with message "535 5.7.0 Invalid login or password".". Authenticator "PLAIN" returned "Expected response code "235" but got empty code.".
```

## License

This project is under the MIT license.

Please see the [license file](LICENSE) for more information.
