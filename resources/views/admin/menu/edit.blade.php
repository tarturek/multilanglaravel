@extends ('admin/template')

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title"> Güncelle</h4>

                    {!! Form::model($menu,['route'=>['menu.update',$menu->id],'method'=>'PUT','class'=>'form-horizontal','files'=>'true']) !!}
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                        <div class="col-sm-10">
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#title{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <div class="tab-pane @if($count == 0) active @endif p-3" id="title{{$langs}}" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <input class="form-control" type="text" value="{{$menu->translate($langs)->title}}"  name="title[{{$langs}}]" required>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="control-group ">
                        <label class="control-label"> Url</label>
                        <div class="controls ">
                            <input type="text" class="form-control" value="{{$menu->url}}" name="url"/>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label"> Üst Menü</label>
                        <div class="controls ">
                            <input type="text" class="form-control" value="{{$menu->topnav}}" name="topnav"/>
                        </div>
                    </div>

                    <div class="control-group ">
                        <label class="control-label"> Sayfa</label>
                        <div class="controls ">
                            <input type="text" class="form-control" value="{{$menu->page}}" name="page"/>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label"> Diğerleri</label>
                        <div class="controls ">
                            <input class="form-control" type="text" value="{{$menu->order}}"  name="order" />
                        </div>
                    </div>


                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Güncelle</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')

@endsection


@section('js')
    <script src="/admin/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection