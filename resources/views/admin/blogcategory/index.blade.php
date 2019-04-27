@extends ('admin/template')

@section('content')
    <div class="row">
        <div style="float:left; margin: 15px 0 5px 0;"><a href="{{route('blogcategory.create')}}" class="btn btn-success">Yeni Blog Kategori</a></div>
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Blog Kategorileri</h4>
                    <p class="text-muted m-b-30 font-14">
                    </p>

                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>

                            <th > Başlık</th>


                            <th width="5">Düzenle</th>
                            <th width="5">Sil</th>
                        </tr>
                        </thead>


                        <tbody>
                       @foreach($blogcategorys as $blogcatgory)
                            <tr>

                                <td>{{$blogcatgory->title}}</td>

                                <td><a href="{{route('blogcategory.edit', $blogcatgory->id)}}" class="btn btn-success">Düzenle</a></td>
                                {!! Form::model($blogcatgory,['route'=>['blogcategory.destroy',$blogcatgory->id],'method'=>'DELETE']) !!}
                                @if($blogcatgory->id == '2')
                                    <td>Silinemez</td>
                                @else
                                <td class="center">


                                    <button type="submit" onclick="return window.confirm('Silmek istediğinize eminmisiniz?');" class="btn btn-danger ">Sil</button>
                                </td>
                                @endif
                                {!! Form::close() !!}


                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection

@section('css')


@endsection

@section('js')


@endsection