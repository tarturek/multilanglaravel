@extends ('admin/template')

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Logo Güncelle</h4>

                    {!! Form::model($reference,['route'=>['reference.update',$reference->id],'method'=>'PUT','class'=>'form-horizontal','files'=>'true']) !!}





                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Referans Logosu</label>
                        <div class="col-sm-10">
                            <div class="control-group">
                                <label class="control-label"> Fotoğraf</label>
                                <div class="controls">
                                    <input type="file" name="logo"  class="span11"  />
                                </div>
                                <img src="/{{$reference->logo}}" width="200px">
                            </div>
                            <br/>
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