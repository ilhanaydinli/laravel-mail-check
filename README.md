# Laravel Mail Check

Check sending email using Laravel mail settings.

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

## Commands

```bash
  mail-check:all                        Do all the checks.
  mail-check:config                     Checks Laravel mail settings.
  mail-check:mail                       Check sending email using Laravel mail settings.
  mail-check:spf                        Checks whether it can send mail on behalf of the e-mail address.
```

## Example Usage

```bash
php artisan mail-check:all
```

#### Successful Result

```bash
$ php artisan mail-check:all

From which email address do you want to send mail? [from@test.com]:
>

To which email address do you want to send mail?:
> to@test.com

**********************************************
*     Please Wait - Mail Config Checking     *
**********************************************

Mail settings are successful.

**************************************
*     Please Wait - SPF Checking     *
**************************************

You can send an e-mail on behalf of test@test.com.

****************************************
*     Please Wait - E-Mail Sending     *
****************************************

E-mail sending was successful.
```

## License

This project is under the MIT license.

Please see the [license file](LICENSE) for more information.
