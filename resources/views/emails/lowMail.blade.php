@component('mail::message')
# {{ __('Kepada') }} {{ $details['employee']->name }}

{{ __('Anda mendapat sebuah penilaian dengan skor') }} {{ $details['score'] }} {{ __(', berikut masukan/kritik dari pelanggan tersebut:') }}<br>

@component('mail::panel')
    {{ $details['message'] }}
@endcomponent

{{ __('Terima Kasih') }},<br>
{{ config('app.name') }}
@endcomponent
