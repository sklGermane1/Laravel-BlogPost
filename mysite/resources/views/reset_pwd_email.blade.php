@component('mail::message')
Reset Password
Please click on the following link to reset your password.

@component('mail::button', ['url' => route("reset_password",[$email,$token])])
    reset_password
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
