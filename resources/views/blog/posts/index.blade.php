@extends('layouts.main')

@section('content')
<table>
    @for($i = 1; $i <= 100; $i++)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ 'if we minus this with 1, it will be'}} {{ $i-1 }}</td>
        </tr>
    @endfor
</table>
@endsection