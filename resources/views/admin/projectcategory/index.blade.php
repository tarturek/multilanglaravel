@extends ('admin/template')

@section('content')
    <div class="row">
        <div style="float:left; margin: 15px 0 5px 0;"><a href="{{route('projectcategory.create')}}" class="btn btn-success">Yeni Kategori</a></div>
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Kategoriler</h4>
                    <p class="text-muted m-b-30 font-14">
                    </p>

                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th> Başlık</th>
                            <th> Seo</th>
                            <th width="5">Düzenle</th>
                            <th width="5">Sil</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($projectcategorys as $projectcategory)
                            <tr>

                                <td>{{$projectcategory->title}}</td>
                                <td>{{$projectcategory->slug}}</td>


                                <td><a href="{{route('projectcategory.edit', $projectcategory->id)}}" class="btn btn-success">Düzenle</a></td>

                                @if($projectcategory->id == '1')
                                    <td>Silinemez</td>
                                @else
                                {!! Form::model($projectcategory,['route'=>['projectcategory.destroy',$projectcategory->id],'method'=>'DELETE']) !!}
                                <td class="center">
                                    <button type="submit" onclick="return window.confirm('Silmek istediğinize eminmisiniz?');" class="btn btn-danger ">Sil</button>
                                </td>

                                {!! Form::close() !!}
@endif
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