
@component('mail::message')
# Hello Master {{$user->username}}

INI ADALAH KODE TOKEN ANDA
<p>{{$user->active_token}}</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
