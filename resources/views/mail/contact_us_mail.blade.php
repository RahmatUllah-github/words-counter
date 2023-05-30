<x-mail::message>
# Message from {{ $first_name }} {{ $last_name }}

Email: {{ $email }} <br/><br/>

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
