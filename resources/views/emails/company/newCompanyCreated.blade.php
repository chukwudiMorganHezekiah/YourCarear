@component('mail::message')
# Notification

This is to notify you,{{ $data->email }} that you have successfully created a new Company <b>{{ $data->company->company_name }}</b>, in {{ config('app.name') }}
<br />
Signed:{{ config('app.name') }}
@endcomponent
