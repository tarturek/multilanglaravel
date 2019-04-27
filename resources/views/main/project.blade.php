@extends('main/template')

@section('content')
    <section>
        <div class="block no-padding">
            <div class="banner-section">
                <img src="/{{$project->image}}" alt="">
                <h2>{{$project->title}}</h2>
            </div><!--banner-section end-->
        </div>
    </section>



    <main>
        <div class="page-details-main">
            <section>
                <div class="container">
                    <div class="location-details bfr">
                        <h2 class="post-title size2">{{$project->title}}</h2>
                        <p>{!! $project->content !!}</p>
                    </div><!--location-details end-->
                    <div class="house-info">
                        <ul>
                            <li>
                                <strong>{{__('project.locale')}}</strong>
                                <span>{{$project->location}}</span>
                            </li>
                            <li>
                                <strong>{{__('project.type')}}</strong>
                                <span>{{$project->type}}</span>
                            </li>
                            <li>
                                <strong>{{__('project.year')}}</strong>
                                <span>{{$project->date}}</span>
                            </li>
                            <li>
                                <strong>{{__('project.client')}}</strong>
                                <span>{{$project->client}}</span>
                            </li>

                        </ul>
                    </div><!--house-info end-->

                </div>
            </section>


            <section>
                <div class="house-imgs-slides">
                    <div class="house-slider">
                        @foreach($gallery as $image)
                        <div class="house-slide">
                            <img src="/{{$image->image}}" alt="">
                        </div><!--house-slide end-->
                        @endforeach
                    </div><!--house-slider end-->
                </div><!--house-imgs-slides end-->
            </section>



        </div><!--page-details-main end-->



    </main>
@endsection

@section('css')

@endsection

@section('js')

@endsection