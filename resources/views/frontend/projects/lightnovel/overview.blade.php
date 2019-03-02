@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-10 offset-1">
            @foreach($volumes as $volume_index => $volume)
                <h4>{{ $volume[0]->volume_name }}</h4>
                <ul>
                    @foreach($volume as $part)
                        <li><a style="text-decoration: none" href="?v={{ $part->volume_index }}&p={{ $part->part_index }}">{{ $part->part_name }}</a></li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
@endsection
