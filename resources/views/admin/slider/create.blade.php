@extends ('admin/template')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Yeni Slider</h4>

                    {!! Form::open(['route'=>'slider.store','method'=>'POST','class'=>'form-horizontal','files'=>'true']) !!}
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Metin</label>
                        <div class="col-sm-10">
                    <ul class="nav nav-tabs" role="tablist">
                       @foreach(config('translatable.locales') as $count => $langs )

                            <li class="nav-item ">
                                <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#text1{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach(config('translatable.locales') as $count => $langs )

                            <div class="tab-pane @if($count == 0) active @endif p-3" id="text1{{$langs}}" role="tabpanel">
                                <p class="font-14 mb-0">
                                    <input class="form-control" type="text"  name="text1[{{$langs}}]" required>
                                </p>
                            </div>
                        @endforeach
                    </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Buton Metni </label>
                        <div class="col-sm-10">


                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <li class="nav-item">
                                        <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#buttontext{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <div class="tab-pane @if($count == 0) active @endif p-3" id="buttontext{{$langs}}" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <textarea class="form-control" type="text"  name="buttontext[{{$langs}}]" ></textarea>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Buton Url </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="buttonurl"  />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Slider Görseli </label>
                        <div class="col-sm-10">
                            <input type="file" name="image"  class="form-control"  />
                            <div><span>1920x1267px ve max 512mb</span></div>
                        </div>
                    </div>

                    <div class="form-actions">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Ekle</button>
                            </div>

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