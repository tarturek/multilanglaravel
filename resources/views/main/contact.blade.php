@extends('main/template')

@section('content')
    <section>
        <div class="block no-padding">
            <div class="main-map">
                <div id="map" class="map">
                    {!! $setting->googlemap !!}
                </div>
            </div><!--main-map end-->
        </div>
    </section>


    <section>
        <div class="contact-info-sec">
            <div class="container">
                <div class="cntct-details">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-address">
                                <h2>{{__('contact.adress')}}</h2>
                                <p>{{$setting->adress}}</p>
                                <span><b>{{__('contact.email')}}</b>{{$setting->email}}</span>
                            </div><!--contact-address end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-more-info">
                                <h5>{{__('contact.callus')}}</h5>
                                <h2>{{$setting->phone1}}</h2>
                                {{--<div class="address">
                                    <h3>Brand Offices :</h3>
                                    <ul>
                                        <li><a href="#" title="">Allentown PA</a></li>
                                        <li><a href="#" title="">Allanta, GA</a></li>
                                        <li><a href="#" title="">Chicago, IL</a></li>
                                        <li><a href="#" title="">Dallas, TX</a></li>
                                        <li><a href="#" title="">Edison, NJ</a></li>
                                        <li><a href="#" title="">Houston, TX</a></li>
                                    </ul>
                                </div>
                                <div class="address">
                                    <h3>Work hours:</h3>
                                    <span>Mon - Sat: 8.00 - 17.00, Sunday closed</span>
                                </div>--}}
                            </div><!--contact-more-info end-->
                        </div>
                    </div>
                </div><!--cntct-details end-->
                <div class="contact-form-sec">
                    <h3>{{__('contact.textus')}}</h3>
                    <p class="success alert alert-success" id="success" style="display:none;"></p>
                    <p class="error alert alert-danger" id="error" style="display:none;"></p>
                    <form action="{{route('contactform.send')}}" name="contact_form_3" id="contact_form_3" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="axn" value="contact_3">
                        <div class="row">

                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" placeholder="Name*">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="email" id="email" placeholder="Email*">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="subject" placeholder="Subject(Optional)">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" id="message" placeholder="Mesaj"></textarea>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" id="submit_3">Send Message</button>
                            </div>
                            </form>

                        </div>
                    </form>
                </div><!--contact-form-sec end-->
            </div>
        </div><!--contact-info-sec end-->
    </section>
    @include('sweetalert::alert')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
@endsection