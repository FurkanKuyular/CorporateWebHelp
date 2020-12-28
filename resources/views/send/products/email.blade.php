@component('mail::message')
About Products

The body of your message.

    @foreach($data as $key => $value)
    {{ $key }}: {{ $value }}
    @endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
