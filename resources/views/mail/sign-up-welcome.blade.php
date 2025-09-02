<x-mail::message>
# Introduction

Welcome {{ $name }}
We appreciate you joining us!
<x-mail::button :url="'127.0.0.1/'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
