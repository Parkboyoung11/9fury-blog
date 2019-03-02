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
@endsection
