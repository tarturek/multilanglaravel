@extends ('admin/template')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Yeni Proje</h4>

                    {!! Form::open(['route'=>'project.store','method'=>'POST','class'=>'form-horizontal','files'=>'true']) !!}



                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Proje Kategorisi</label>
                        <div class="col-sm-10">
                            <select name="project_category_id" class="form-control">

                                @foreach($projectcategorys as $project)

                                    <option value="{{$project->id}}">{{$project->title}}</option>


                                @endforeach

                            </select>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Proje Adı</label>
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
                        <label for="example-text-input" class="col-sm-2 col-form-label">İçerik</label>
                        <div class="col-sm-10">


                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <li class="nav-item">
                                        <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#content{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $count => $langs )
                                    <div class="tab-pane @if($count == 0) active @endif p-3" id="content{{$langs}}" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <textarea class="form-control" type="text"  name="content[{{$langs}}]" ></textarea>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Lokasyon</label>
                        <div class="col-sm-10">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(config('translatable.locales') as $count => $langs )

                                    <li class="nav-item ">
                                        <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#location{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $count => $langs )

                                    <div class="tab-pane @if($count == 0) active @endif p-3" id="location{{$langs}}" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <input class="form-control" type="text"  name="location[{{$langs}}]" required>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Türü</label>
                        <div class="col-sm-10">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(config('translatable.locales') as $count => $langs )

                                    <li class="nav-item ">
                                        <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#type{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $count => $langs )

                                    <div class="tab-pane @if($count == 0) active @endif p-3" id="type{{$langs}}" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <input class="form-control" type="text"  name="type[{{$langs}}]" required>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Müşteri</label>
                        <div class="col-sm-10">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(config('translatable.locales') as $count => $langs )

                                    <li class="nav-item ">
                                        <a class="nav-link @if($count == 0) active @endif" data-toggle="tab" href="#client{{$langs}}" aria-controls="{{$langs}}" role="tab">{{ $langs }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $count => $langs )

                                    <div class="tab-pane @if($count == 0) active @endif p-3" id="client{{$langs}}" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <input class="form-control" type="text"  name="client[{{$langs}}]" required>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Proje Yılı</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="date"/>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Proje Ana Görsel</label>
                        <div class="col-sm-10">
                            <input type="file" name="image"  class="form-control"  />
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Proje Galeri Ekle</label>
                        <div class="col-sm-10">
                            {!! Form::file('images[]', array('multiple'=>true ,'class'=>'form-control', 'required' =>'required')) !!}
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
    </div>


@endsection

@section('css')

@endsection


@section('js')
    <script src="/admin/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection