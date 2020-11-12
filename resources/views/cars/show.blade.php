@extends('layouts.app')

@section('content')
@foreach($result as $res)
{{ $res->model }}
@foreach($res->images as $file)
<tr>
    <td><img src="{{ asset('images/' . $file->file_name)}}" /></td>

</tr>
@endforeach
@endforeach


@endsection