<x-mail::message>
# Hi {{$user}}

Hello From Authentication Community Please Confirm your Login

<x-mail::button :url="'http://localhost:8000'">
Confirm
</x-mail::button>

Thanks,<br>
{{ $user}}
</x-mail::message>
