@component('mail::message')
# {{ __('Kepada') }} #{{ $details['title'] }}

@component('mail::panel')
    This is a panel
@endcomponent

{{ __('Terima Kasih') }},<br>
{{ config('app.name') }}
@endcomponent
