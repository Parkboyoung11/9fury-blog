@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-10 offset-1">
            <p>This is not my projects. Just love them. So, i clone from
                <strong><a style="text-decoration: none; color: #00a65a" href="https://ln.hako.re" target="_blank">Hako ln</a></strong> and
                <strong><a style="text-decoration: none; color: #00a65a" href="https://projectalicization.wordpress.com" target="_blank">Project Alicization</a></strong>
            </p>
            <p>Only <strong><a style="text-decoration: none; color: orangered" href="https://projectalicization.wordpress.com" target="_blank">Hige wo Soru</a></strong> is mine! I translate from
                <a style="text-decoration: none" href="http://akii.tk/pX1SsW" target="_blank">web novel version</a></p>
            <h4>Light Novels</h4>
            <ul>
                <li><a style="text-decoration: none" href="{{ route('lightnovel.overview', 'sword-art-online') }}">Sword Art Online ( ソードアート・オンライン )</a></li>
                <li><a style="text-decoration: none" href="http://akii.tk/pX1SsW" target="_blank">I Shaved. Then I Brought a High School Girl Home</a></li>
                <li><a style="text-decoration: none" href="{{ route('lightnovel.overview', 'hige-wo-soru') }}">ひげを剃る。そして女子高生を拾う</a></li>
            </ul>
            <p>

            <h4>Manga</h4>
            <ul>
                <li><a style="text-decoration: none" href="http://akii.tk/y6rczC" target="_blank">Masamune-kun's Revenge ( 政宗くんのリベンジ )</a></li>
            </ul>
            <p>

            <p>Shorten Link Website : <strong><a style="text-decoration: none; color: red" href="http://akii.tk/" target="_blank">akii.tk</a></strong></p>

        </div>
    </div>

@endsection
