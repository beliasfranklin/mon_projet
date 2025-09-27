@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'DEP MINSANTE')
<img src="logo-minsante.png" class="logo" alt="logo-minsante">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
