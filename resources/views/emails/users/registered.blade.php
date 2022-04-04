@component('mail::message')
# User Registered

You have successfully registered on the {{ config('app.name') }}. Please review the details below.

@component('mail::table')
| <div style="font-size: .9rem;">Field</div> | <div style="padding-left: 1rem; font-size: .9rem;">Value</div> |
| ---: | :--- |
| <div style="font-size: 1rem">First Name:</div> | <div style="padding-left: 1rem; font-size: 1rem">{{ $user->first_name }}</div> |
| <div style="font-size: 1rem">Last Name:</div> | <div style="padding-left: 1rem; font-size: 1rem">{{ $user->last_name }}</div> |
|  <div style="font-size: 1rem">Username:</div> | <div style="padding-left: 1rem; font-size: 1rem">{{ $user->username }}</div> |
|  <div style="font-size: 1rem">E-Mail:</div> | <div style="padding-left: 1rem; font-size: 1rem">{{ $user->email }}</div> |
|  <div style="font-size: 1rem">Password:</div> | <div style="padding-left: 1rem; font-size: 1rem">{{ session('password') }}</div> |
@endcomponent

Use the combination of Username or Email alongwith Password in order to login.

@component('mail::button', ['url' => route('users.login') ])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
