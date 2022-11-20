@component('mail::message')
<h2>Hello,</h2>
<p>This message was sent for laravel mail system test.</p>
@component('mail::button', ['url' => config('app.url')])
Example Button
@endcomponent
Happy coding!<br>
Thanks,<br>
{{ config('app.name') }}<br>
@endcomponent