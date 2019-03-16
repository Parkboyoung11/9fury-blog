@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <h2 class="post-title">{{ $chap->manga_name }} - {{ $chap->chap_name }}</h2>
                <p class="post-meta">
                    {{ __('Tag:') }}<a style="text-decoration: none"
                                       href="?t=overview"> {{ $chap->manga_name }}</a>
                    {{ __('Posted on: :date',['date'=> $chap->created_at->format('Y-m-d')]) }}
                </p>
                <p>
                    @php
                        $sub_url = 'mangas/' . $chap->manga_name. '/' . $chap->image_link .'/';
                        $dirname = storage_path() . '/app/public/' . $sub_url;
                        $images = [];
                        foreach (File::glob($dirname . "*") as $filename) {
                            $images[] = 'storage/' . $sub_url . basename($filename);
                        }
                        foreach ($images as $image) {
                            echo '<img style="width:100%; border:1px solid #021a40;" src="' . asset($image) . '"><p>';
                        }
                    @endphp
                </p>
            </div>
        </div>
    </div>
    <section style="position: fixed; bottom: 6px; right: 0; opacity: 0.6;">
        <a style="padding: 6px 10px ; @if ($current_chap == 1) pointer-events: none; cursor: not-allowed; opacity: .3; @endif" href="?c={{ $current_chap - 1 }}">
            <i class="fa fa-backward" aria-hidden="true"></i></a>
        <a style="padding: 6px 10px;" href="?t=overview">
            <i class="fa fa-home" aria-hidden="true"></i></a>
        <a style="padding: 6px 10px; @if ($current_chap == $number_chaps) pointer-events: none; cursor: not-allowed; opacity: .3; @endif" href="?c={{ $current_chap + 1 }}">
            <i class="fa fa-forward" aria-hidden="true"></i></a>
    </section>
@endsection
