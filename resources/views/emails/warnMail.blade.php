@component('mail::message')
# {{ __('Kepada') }} {{ $details['employee']->name }}

@component('mail::panel')
    {{ $details['body'] }}
@endcomponent

{{ __('Terima Kasih') }},<br>
{{ config('app.name') }}
@endcomponent
