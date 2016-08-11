Dear, {{ $user->name }}
<br><br>
Your URL monitored by Monik is up now:<br><br>
{{ $site->url }}
<br><br><br>
Last check time: {{ date("d/m H:i",strtotime($site->last_check_tstamp)) }} <br><br>
<br>
---<br>
Monik
