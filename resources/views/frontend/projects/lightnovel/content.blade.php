@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <h2 class="post-title">{{ $part->volume_name }} - {{ $part->part_name }}</h2>
                <p class="post-meta">
                    {{ __('Tag:') }}<a style="text-decoration: none"
                                            href="?t=overview"> {{ $part->ln_name }}</a>
                    {{ __('Posted on: :date',['date'=> $part->created_at->format('Y-m-d')]) }}
                </p>
                <p>{{ \Illuminate\Mail\Markdown::parse($part->content) }}</p>
            </div>
        </div>
    </div>

    <section style="position: fixed; bottom: 6px; right: 0; opacity: 0.6;">
        <a style="padding: 6px 10px ; @if ($current_part == 1 && $current_volume == 1 ) pointer-events: none; cursor: not-allowed; opacity: .3; @endif"
           href="@if ($current_part == 1) ?v={{ $current_volume - 1 }}&p={{ $number_parts_previous }} @else ?v={{ $current_volume }}&p={{ $current_part - 1 }} @endif">
            <i class="fa fa-backward" aria-hidden="true"></i></a>
        <a style="padding: 6px 10px;" href="?t=overview">
            <i class="fa fa-home" aria-hidden="true"></i></a>
        <a style="padding: 6px 10px; @if ($current_part == $number_parts && $current_volume == $number_volumes) pointer-events: none; cursor: not-allowed; opacity: .3; @endif"
           href="@if ($current_part == $number_parts) ?v={{ $current_volume + 1 }}&p=1 @else ?v={{ $current_volume }}&p={{ $current_part + 1 }} @endif">
            <i class="fa fa-forward" aria-hidden="true"></i></a>
    </section>
@endsection
