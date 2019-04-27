@extends('admin/template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Web Site Ayarları</h4>



                    {!! Form::model($setting,['route'=>['setting.update',1],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">

                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(config('translatable.locales') as $count => $langs )
                            <li class="nav-item ">
                                <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#sitetitle{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                            </li>
                            @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <div class="tab-pane @if($count == 0) active @endif p-3" id="sitetitle{{$langs}}" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <input class="form-control" type="text" value="{{$setting->translate($langs)->sitename}}" name="sitename[{{$langs}}]" required>
                                        </p>
                                    </div>
                                @endforeach
                            </div>



                            {{--@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                                <input class="form-control" type="text" value="{{$setting->translate($localeCode)->sitename}}" name="sitename[{{$localeCode}}]" required>

                            @endforeach--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="file" name="logo">
                            <img src="/{{$setting->logo}}" width="200px" height="100px" value="/{{$setting->logo}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Fav Icon</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="file" name="favicon">
                            <img src="/{{$setting->favicon}}" width="50px" height="50px" value="/{{$setting->favicon}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Telefon 1</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text" value="{{$setting->phone1}}" name="phone1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Telefon 2</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text" value="{{$setting->phone2}}" name="phone2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">E-Posta</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text" value="{{$setting->email}}" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Adres</label>
                        <div class="col-sm-10">

                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#adress{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <div class="tab-pane @if($count == 0) active @endif p-3" id="adress{{$langs}}" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <input class="form-control" type="text" value="{{$setting->translate($langs)->adress}}" name="adress[{{$langs}}]" required>
                                        </p>
                                    </div>
                                @endforeach
                            </div>


                            {{--@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                                <input class="form-control" type="text" value="{{$setting->translate($localeCode)->adress}}" name="adress[{{$localeCode}}]" required>

                            @endforeach--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Google Harita Iframe</label>
                        <div class="col-sm-10">

                            <textarea class="form-control" name="googlemap">{{$setting->googlemap}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text" value="{{$setting->facebook}}" name="facebook">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text" value="{{$setting->instagram}}" name="instagram">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text" value="{{$setting->twitter}}" name="twitter">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text" value="{{$setting->linkedin}}" name="linkedin">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Youtube</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text" value="{{$setting->youtube}}" name="youtube">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Footer Yazısı</label>
                        <div class="col-sm-10">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#footer{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <div class="tab-pane @if($count == 0) active @endif p-3" id="footer{{$langs}}" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <input class="form-control" type="text" value="{{$setting->translate($langs)->footer_text}}" name="footer_text[{{$langs}}]" required>
                                        </p>
                                    </div>
                                @endforeach
                            </div>


                            {{--@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                <label for="example-text-input" class="col-sm-2 col-form-label">{{ $properties['native'] }}:</label>
                                <input class="form-control" type="text" value="{{$setting->translate($localeCode)->footer_text}}" name="footer_text[{{$localeCode}}]" required>

                            @endforeach--}}
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        Güncelle
                    </button>



                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection