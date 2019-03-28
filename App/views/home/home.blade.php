@extends("layouts.default")
@section('title')
  home
@stop
@section('content')
    @if (isset($name))
        @php
        print_r($name);
        @endphp
    @endif
    <br>
    @if (isset($family))
        @php
            print_r($family);
        @endphp
    @endif
    <br>
    @if (isset($age)&&count($age)>=1)
        @foreach($age as $item)
            {{$item}}
            @endforeach
    @endif
    <br>
    <p>i am home</p>
@stop