@extends ('admin/template')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Yeni Menü</h4>

                    {!! Form::open(['route'=>'menu.store','method'=>'POST','class'=>'form-horizontal','files'=>'true']) !!}
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                        <div class="col-sm-10">
                    <ul class="nav nav-tabs" role="tablist">
                       @foreach(config('translatable.locales') as $count => $langs )

                            <li class="nav-item ">
                                <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#title{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach(config('translatable.locales') as $count => $langs )

                            <div class="tab-pane @if($count == 0) active @endif p-3" id="title{{$langs}}" role="tabpanel">
                                <p class="font-14 mb-0">
                                    <input class="form-control" type="text"  name="title[{{$langs}}]" required>
                                </p>
                            </div>
                        @endforeach
                    </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Sayfa</label>
                        <div class="col-sm-10">
                            <select name="page" class="form-control">
                                <option value="0" selected>Özel Url</option>

                                @foreach($pages as $page)

                                    <option value="{{$page->id}}">{{$page->title}}</option>


                                @endforeach


                            </select>


                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Üst Menü</label>
                        <div class="col-sm-10">
                            <select id="topnav" name="topnav" class="form-control">

                                <option value="0">Yok</option>
                                @foreach($menus as $menu)
                                    <option value="{{$menu->id}}">{{$menu->title}}</option>
                                @endforeach



                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Url Adresi</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text"  name="url">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Sıra</label>
                        <div class="col-sm-10">

                            <input class="form-control" type="text" type="number" value="0"  name="order">
                        </div>
                    </div>


                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Ekle</button>
                            </div>
                        </div>
                    {{--{!! Form::close() !!}--}}



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