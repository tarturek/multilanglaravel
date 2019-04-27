<header class="pb no-bg stick">
    <div class="container">
        <div class="header-bar">
            <div class="logo">
                <a href="#" title=""><img src="/main/images/logo.png" alt=""></a>
            </div>
            <!--logo end-->
            <nav>
                <ul>
                    <li><a class="active" href="{{route('home.page')}}" title="">{{__('general.home')}}</a></li>

                    <li><a href="{{route('projects')}}" title="">{{__('general.projects')}}</a></li>

                    <li><a href="{{route('news')}}" title="">{{__('general.blogs')}}</a></li>
                    <li><a href="about.html" title="">{{__('general.about')}}</a></li>
                    <li><a href="about.html" title="">{{__('general.gallery')}}</a></li>
                    <li><a href="{{route('contact.page')}}" title="">{{__('general.contact')}}</a></li>
                </ul>
            </nav><!--nav end-->
            <div class="mobile-menu-btn">
                <a href="#" title="" class="open-menu"><i class="fa fa-bars"></i></a>
            </div><!--mobile-menu-btn end-->
            <div class="select-language">
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="active">
                            <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                               title="{{$properties['native']}}">{{$localeCode}}
                            </a>
                        </li>

                    @endforeach
                </ul>
            </div><!--select-language end-->
        </div><!--header-bar end-->
    </div>
</header>

<div class="responsive-mobile-menu">
    <a href="#" title="" class="close-menu"><i class="ion-close"></i></a>
    <ul>
        <li><a href="{{route('home.page')}}" title="">Home</a>
            <ul>
                <li><a href="index.html" title="">Homepage 1</a></li>
                <li><a href="index2.html" title="">Homepage 2</a></li>
                <li><a href="index3.html" title="">Homepage 3</a></li>
            </ul>
        </li>
        <li><a href="#" title="">Works</a>
            <ul>
                <li><a href="works-grid.html" title="">Work Grid</a></li>
                <li><a href="work-masonary.html" title="">Work Masonary</a></li>
                <li><a href="works-parallax.html" title="">Works Parallax</a></li>
                <li><a href="project-details.html" title="">Project Details</a></li>
            </ul>
        </li>
        <li><a href="#" title="">News</a>
            <ul>
                <li><a href="news-grid.html" title="">News Grid</a></li>
                <li><a href="news-listing.html" title="">News Listing</a></li>
                <li><a href="news-sidebar.html" title="">News Sidebar</a></li>
            </ul>
        </li>
        <li><a href="#" title="">Blog</a>
            <ul>
                <li><a href="single-post.html" title="">Single Post</a>
                    <ul>
                        <li><a href="single-post-gallery.html" title="">Single Post Gallery</a></li>
                    </ul>
                </li>
                <li><a href="single-video.html" title="">Single Video</a></li>
            </ul>
        </li>
        <li><a href="about.html" title="">About</a></li>
        <li><a href="contact.html" title="">Contact</a></li>
    </ul>
</div><!--responsive-mobile-menu end-->
