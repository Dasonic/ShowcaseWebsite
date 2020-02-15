@component('mail::message')
# New Message

Name: {{$contact['name']}}

Email: {{$contact['email']}}

Message:

{{$contact['message']}}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}
@endcomponent
