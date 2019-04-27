<section class="main-slider style2">
    <div class="container">
        <div id="rev_slider_476_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="christmas-snow-scene" data-source="gallery" style="background-color:transparent;padding:0px;">
            <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
            <div id="rev_slider_476_1" class="rev_slider" style="display:none;" data-version="5.3.0.2">
                <ul>
                    <!-- SLIDE  -->
                    @foreach($slider as $slide)
                    <li data-index="rs-1648" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="images/slider_banner.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{$slide->image}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lyr3 tp-resizeme"
                             id="slide-1648-layer-1"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="-200"
                             data-width="['auto']"
                             data-height="['auto']"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":700,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"nothing"}]'
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[15,15,15,15]"
                             data-paddingleft="[0,0,0,0]"
                             data-start="200"
                             data-splitin="chars"
                             data-splitout="none"
                             data-elementdelay="0.04"
                             style="">{{$slide->text1}}
                        </div>


                        <!-- LAYER NR. 3 -->
                        <a href="{{$slide->url}}" title="" class="tp-caption layera stt2 tp-resizeme"
                           id="slide-1-layer-3"
                           data-x="center" data-hoffset="0"
                           data-y="center" data-voffset="60		"
                           data-width="['auto','auto','auto','auto']"
                           data-height="['auto','auto','auto','auto']"
                           data-transform_idle="o:1;"
                           data-frames='[{"from":"y:50px;opacity:0;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{}]'
                           data-paddingtop="[20,20,20,20]"
                           data-paddingright="[20,20,20,20]"
                           data-paddingbottom="[20,20,20,20]"
                           data-paddingleft="[20,20,20,20]"
                           data-start="1500"
                           data-splitin="none"
                           data-splitout="none"
                           data-elementdelay="0.05"
                           style="">{{$slide->buttontext}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--Revolution Slider end-->
        <div class="cntct-info">
            <div class="container">
                <div class="cntct-info-details">
                    <div class="our-addrs-info">
                        <ul>
                            <li>
                                {{__('mainpage.email')}}:
                                <strong>hello@kons.co</strong>
                            </li>
                            <li>
                                {{__('mainpage.phone')}}
                                <strong class="scnd">(+035) 527-1710-70</strong>
                            </li>
                        </ul>
                    </div><!--our-addrs-info end-->
                    <div class="soc-links">
                        <ul>
                            <li>{{__('mainpage.follow_us')}}:</li>
                            <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" title=""><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" title=""><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div><!--cntct-info-details end-->
            </div>
        </div><!--cntct-info end-->
    </div>
</section><!--main-slider end-->