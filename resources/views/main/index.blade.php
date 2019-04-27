@extends('main.template')

@section('content')


    <section class="mg-top-minus">
        <div class="container3">
            <div class="block">
                <div class="fixed-bg bg2"></div>
                <div class="why-choose-us">
                    <div class="title-sm">
                        <h3>{{__('general.why_choose_us')}}</h3>
                    </div><!--title-sm end-->
                    <div class="our-specifications">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="spec-hd">
                                    <h2>{{$index->title}}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="properties">

                                        <p>{{$index->text}}</p>

                                </div><!--properties end-->
                            </div>
                        </div>
                    </div><!--our-specifications end-->
                </div><!--why-choose-us end-->
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-btm-gap">
            <div class="container">
                <div class="title-sm">
                    <h3>{{__('general.services')}}</h3>
                </div><!-- title-sm end-->
                <div class="specialization-data">
                    @foreach($services as $service)
                    <div class="specialization style2">
                        <div class="spec-details">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="spec-text bfr ep-icon">
                                        <h3>{{$service->title}}</h3>
                                        <p>{{Str::limit(strip_tags($service->content),$limit=100,$end='...')}}</p>
                                        <a href="#" title="">{{__('general.learn_more')}}</a>
                                    </div><!--spec-text end-->
                                </div>
                                <div class="col-lg-7">
                                    <div class="spec-img">
                                        <figure>
                                            <img height="300px" src="/{{$service->image}}" alt="">
                                        </figure>
                                    </div><!--spec-img end-->
                                </div>
                            </div>
                        </div><!--spec-details end-->
                    </div>
                    @endforeach
                </div><!--specialization-data end-->
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-btm-gap">
            <div class="title-sm">
                <h3>{{__('general.projects')}}</h3>
            </div><!--title-sm end-->
            <div class="house-imgs-slides style2 no-pd">
                <div class="house-slider style2">
                    @foreach($projects as $project)
                    <div class="house-slide">
                        <img src="/{{$project->image}}" alt="">
                        <div class="hs-info">
                            <div class="container">
                                <h3>{{$project->title}}</h3>
                                <a href="#" title="">{{__('general.view_project')}} <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div><!--hs-info end-->
                    </div><!--house-slide end-->
                    @endforeach
                </div><!--house-slider end-->
            </div><!--house-imgs-slides end-->
        </div>
    </section>

    <section>
        <div class="block remove-btm-gap">
            <div class="container">
                <div class="title-sm style2">
                    <h3>{{__('general.news')}}</h3>
                    <a href="#" title="">{{__('general.see_all_news')}}</a>
                </div><!--title-sm end-->
                <div class="trending-stories">
                    <div class="row">
                        @foreach($news as $blog)
                        <div class="col-lg-6">
                            <div class="tr-news">
                                <div class="tr-news-img">
                                    <img width="200px" height="270px" src="{{$blog->image}}" alt="">
                                </div><!--tr-news-img end-->
                                <div class="treding-new">
                                    {{--<h5>{{$blog->category->title}}</h5>--}}
                                    <h3><a href="#" title="">{{$blog->title}}</a></h3>
                                    <p>{{Str::limit(strip_tags($blog->content),$limit=150,$end='...')}}</p>
                                    <span>{!! date('d-m-y',strtotime($blog->created_at)) !!} </span>
                                </div><!--treding-new end-->
                            </div><!--tr-news end-->
                        </div>
                       @endforeach
                    </div>
                </div><!--trending-stories end-->
            </div>
        </div>
    </section>



    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="partners-section style2">
                    <div class="container">
                        <div class="title-sm ta-left">
                            <h3>{{__('general.referances')}}</h3>
                        </div><!--title end-->
                        <ul class="partner-carousel">
                            @foreach($clients as $client)
                            <li><a href="#" title=""><img width="150px" src="/{{$client->logo}}" alt=""></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div><!--partners-section end-->
            </div>
        </div>
    </section>





@endsection

@section('css')

@endsection

@section('js')

@endsection