{{ $mensagem }}

<br /><br />

--
<br />
<strong>{{ $nome }}</strong>
<br />
{{ $email }}

<br /><br />
====================
<br />
<small>
    Enviado através do site brgomes.com. IP: {{ $ip }}
    <br />
    User agent: {{ request()->server('HTTP_USER_AGENT') }}
<small>
