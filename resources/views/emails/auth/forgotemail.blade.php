
@component('mail::message')
# Introduction

Kofirmasi password baru

<h1>Hello {{$user->username}}</h1>
<p>
	your password: {{$user->password}} masih dienkripsi ya hehehehe
</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
