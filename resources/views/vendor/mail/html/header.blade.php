<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('/storage/public/images/DeliveBooLogo.png')}}" class="logo" alt="Deliveboo Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
