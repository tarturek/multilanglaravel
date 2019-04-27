@extends('main/template')

@section('content')
    <section>
        <div class="container">
            <div class="pager-details full text-center">
                <h2 class="heading-title">{{__('general.projects')}}</h2>
                <ul>
                    <li><a href="#" title="">{{__('general.home')}}</a></li>
                    <li><span>{{__('general.projects')}}</span></li>
                </ul>
            </div>
        </div>
    </section>


    <section>
        <div class="portfolio-sec">
            <div class="container">
                <div class="portfolio-items-filter">
                    <section class="options mgbtm-35">
                        <div class="option-isotop">
                            <ul id="filter" class="option-set filters-nav" data-option-key="filter">
                                <li><a class="selected" data-option-value="*">All</a></li>
                                @foreach($pcategory as $category)
                                <li><a data-option-value=".{{$category->slug}}">{{$category->title}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </section>
                    <div class="portfolio-grid">
                        <div class="row">
                            <div class="masonary style2">
                                @foreach($projects as $project)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 {{$project->category->slug}}">
                                    <div class="portfolio-item">
                                        <div class="pt-img">
                                            <img width="370px" height="400px" src="/{{$project->image}}" alt="">
                                        </div>
                                        <div class="item-info">
                                            <span>{{$project->category->title}}</span>
                                            <h3><a href="/project/{{$project->id}}/{{$project->slug}}" title="">{{$project->title}}</a></h3>
                                        </div>
                                    </div><!--portfolio-item end-->
                                </div>
                                @endforeach

                            </div><!--masonary end-->

                        </div>
                    </div><!--portfolio-grid end-->
                </div><!--portfolio-items-filter end-->
            </div>
        </div><!--portfolio-sec end-->
    </section>
@endsection

@section('css')

@endsection

@section('js')
    <script type="text/javascript" src="/main/js/jquery.min.js"></script>
    <script type="text/javascript" src="/main/js/popper.js"></script>
    <script type="text/javascript" src="/main/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/main/js/isotope.js"></script>
    <script type="text/javascript" src="/main/js/html5lightbox.js"></script>
    <script type="text/javascript" src="/main/js/script.js"></script>
@endsection