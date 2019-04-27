@extends('main/template')

@section('content')
    <section>
        <div class="block no-padding">
            <div class="banner-section">
                <img src="http://via.placeholder.com/1920x850" alt="">
            </div><!--banner-section end-->
        </div>
    </section>

    <section class="main-section">
        <div class="container">
            <div class="post-page-data">

                <div class="single-post-data">
                    <div class="construction-company">
                        <h2>{{$post->title}}</h2>
                        <ul class="post-info">
                            <li><span>{!! date('d-m-y',strtotime($post->created_at)) !!}</span></li>

                        </ul>
                        <p>{!! $post->content !!}</p>

                    </div><!--construction-company end-->




                </div><!--single-post-data end-->
            </div><!--post-page-data end-->
        </div>
    </section>


@endsection

@section('css')

@endsection

@section('js')

@endsection