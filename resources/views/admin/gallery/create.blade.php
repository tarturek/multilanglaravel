@extends ('admin/template')

@section('content')

    {!! Form::open(array('method'=>'POST','action'=>'GalleryController@store','class'=>'dropzone','files'=>'true','multiple'=>'true')) !!}

    <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Fotoğraf Ekle</h4>
                                            <p class="text-muted m-b-30 font-14">Fotoğrafları buraya sürükle bırak ile ekleyebilirsiniz.
                                            </p>

                                            <div class="m-b-30">
                                                {!! Form::open(array('method'=>'POST','action'=>'GalleryController@store','class'=>'dropzone','files'=>'true','multiple'=>'true')) !!}
                                                    <div class="fallback">
                                                        {!! Form::file('images[]', array('multiple'=>true , 'required' =>'required')) !!}
                                                    </div>

                                            </div>

                                            <div class="text-center m-t-15">
                                                {!! Form::submit('Yükle', array('class'=>'btn btn-primary')) !!}
                                               {{-- <button type="submit" class="btn btn-primary">Yükle</button>--}}
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->


@endsection

@section('css')
    <!-- Dropzone css -->
    <link href="/admin/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
@endsection


@section('js')

   <!-- Dropzone js -->
    <script src="/admin/plugins/dropzone/dist/dropzone.js"></script>
    <!-- App js -->
    <script src="/admin/js/app.js"></script>
@endsection