<footer>
    <div class="footer-data">
        <div class="container">
            <div class="ft-contact-info">
                <h6>{{__('general.contact_us')}}</h6>
                <h1>{{$setting->email}}</h1>
                <h3>{{$setting->adress}}</h3>
                <h3>{{$setting->phone1}}</h3>
                <h3>{{$setting->phone2}}</h3>
            </div><!--ft-contact-info end-->
            <div class="social-copyright">
                <ul>
                    <li><a href="{{$setting->twitter}}" title="">Twitter</a></li>
                    <li><a href="{{$setting->facebook}}" title="">Facebook</a></li>
                    <li><a href="{{$setting->linkedin}}" title="">LinkedIn</a></li>
                    <li><a href="{{$setting->youtube}}" title="">Youtube</a></li>
                </ul>
                <div class="copyright-text">
                    <p>{{$setting->footer_text}}</p>
                </div>
            </div><!--social-copyright end-->
        </div>
    </div><!--footer-data end-->
</footer>