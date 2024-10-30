<x-mail::message>
# Olá, {{ $userName }}
# Bem-vindo(a) ao {{ config('app.name') }}!

Estamos muito felizes em tê-lo(a) conosco! Aqui você encontrará uma plataforma incrível para você administrar suas jóias.

<x-mail::button :url="route('login')" color="success">
Acessar Agora
</x-mail::button>

Se você tiver alguma dúvida, não hesite em nos contatar.

Agradecemos por se juntar a nós!<br>
{{ config('app.name') }}
</x-mail::message>