@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-10 offset-1">
            <h4>{{ $manga_name }}</h4>
            <ul>
            @foreach($chaps as $chap_index => $chap)
                    <li><a style="text-decoration: none" href="?c={{ $chap->index }}">{{ $chap->chap_name }}</a></li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection
