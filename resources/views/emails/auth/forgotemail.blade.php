
@component('mail::message')
# Introduction

Kofirmasi password baru

<h1>Hello {{$user->username}}</h1>
<p>
	your otp: {{ $user->password }}
	<!-- <a href="{{url('resetpassword/'.$user->id)}}">klik disini untuk merubah password</a> -->
</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
