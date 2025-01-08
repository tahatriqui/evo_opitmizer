<x-mail::message>
# Introduction
<h3>Nom:{{ $data['Nom'] }}</h3>
<h3>Sujet:{{ $data['Sujet'] }}</h3>
<h3>Email:{{ $data['Email'] }}</h3>
<h3>Message:{{ $data['Message'] }}</h3>
The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
