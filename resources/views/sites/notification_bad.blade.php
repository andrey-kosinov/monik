Dear, {{ $user->name }}

Your URL monitored by Monik is down:<br><br>
{{ $site->url }}
<br><br><br>
Last check time: {{ date("d/m H:i",strtotime($site->last_check_tstamp)) }} <br><br>
Last ok time: {{ date("d/m H:i",strtotime($site->first_error_tstamp)) }} <br><br>
<br>
---<br>
Monik