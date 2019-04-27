@extends ('admin/template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Galeriye Fotoğraf Yükle</h4>
                    <p class="text-muted m-b-30 font-14">Tıklayın veya sürükle bırak ile fotoğrafları ekleyin.
                        Daha sonra yükle ile devam edin!
                    </p>

                    <div class="m-b-30">

                    {!! Form::open(array('url'=>'admin/gallery/store','method'=>'POST','class'=>'', 'files'=>true)) !!}

                        <div class="fallback">
                            {!! Form::file('images[]', array('multiple'=>true , 'required' =>'required')) !!}

                        </div>

                    </div>
                    <div class="text-center m-t-15">
                        {!! Form::submit('Yükle', array('class'=>'btn btn-primary')) !!}
                    </div>
                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>

    </div>


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <table class="table table-dark">

                        <tbody>
                        @foreach($galleries->chunk(4) as $array)
                            <tr>
                                @foreach($array as $gallery)
                                    <th width="33%">
                                        <img src="/{{$gallery->image}}" alt="" width="240" >
                                        <br>
                                        {!! Form::model($gallery,['route'=>['gallery.destroy',$gallery->id],'method'=>'DELETE']) !!}
                                        <button type="submit" onclick="return window.confirm('Silmek istediğinize eminmisiniz?');" class="btn btn-danger btn-mini">Sil</button>
                                        {!! Form::close() !!}

                                    </th>
                                @endforeach

                            </tr>
                        @endforeach
                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>


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