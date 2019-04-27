@extends('main/template')

@section('content')
    <section>
        <div class="container">
            <div class="pager-details full text-center">
                <h2 class="heading-title">News</h2>
                <ul>
                    <li><a href="#" title="">Home</a></li>
                    <li><span>News</span></li>
                </ul>
            </div>
        </div>
    </section>


    <section>
        <div class="portfolio-sec">
            <div class="container">
                <div class="portfolio-items-filter">

                    <div class="portfolio-grid">
                        <div class="row">
                            <div class="masonary style2 margin-bottom-minus">

                                @foreach($news as $post)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="post">
                                        <div class="post-img">
                                            <img width="370px" src="/{{$post->image}}" alt="">
                                        </div>
                                        <div class="post-details">
                                            <ul class="post-info">
                                                <li><span>{!! date('d-m-y',strtotime($post->created_at)) !!}</span></li>

                                            </ul>
                                            <h3><a href="/post/{{$post->id}}/{{$post->slug}}" title="">{{$post->title}}</a></h3>
                                            <a href="/post/{{$post->id}}/{{$post->slug}}" title="">{{__('general.learn_more')}}<i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div><!--post end-->
                                </div>
                                @endforeach

                            </div><!--masonary end-->
                            <div class="post-pagination">
                                <nav aria-label="Page navigation">
                                    {{$news->links()}}
                                </nav>
                            </div><!--load-more-items end-->
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