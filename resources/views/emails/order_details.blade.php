@component('mail::message')
# Introduction

Thank you for your transaction made at {{ $transaction['created_at'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
