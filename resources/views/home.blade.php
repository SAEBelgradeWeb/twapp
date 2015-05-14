@extends('app')

@section('content')
<ul>
    @foreach($tweets as $tweet)
    <li data-id="{{$tweet->id}}">
        <div class="text">{{$tweet->text}}</div>
        <div>
            <button class="good" data-type="good">Good</button>
            <button class="bad" data-type="bad">Bad</button>
        </div>
    </li>
    @endforeach


</ul>
@endsection
