@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === config('app.name'))
<img src="https://i.imgur.com/X8P2udd.png" class="logo" alt="logo-minsante">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
