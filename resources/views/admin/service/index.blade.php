@extends ('admin/template')

@section('content')
    <div class="row">
        <div style="float:left; margin: 15px 0 5px 0;"><a href="{{route('service.create')}}" class="btn btn-success"> Hizmet Ekle</a></div>
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Hizmet Yönetimi</h4>
                    <p class="text-muted m-b-30 font-14">
                    </p>

                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th> Görsel</th>
                            <th width="30%"> Başlık</th>
                            <th width="30%"> İçerik</th>

                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td><img src="/{{$service->image}}" width="150px"> </td>
                                <td>{{$service->title}}</td>
                                <td>{!! $service->content !!}</td>
                                <td><a href="{{route('service.edit', $service->id)}}" class="btn btn-success">Düzenle</a></td>
                                {!! Form::model($service,['route'=>['service.destroy',$service->id],'method'=>'DELETE']) !!}
                                <td class="center">
                                    <button type="submit" onclick="return window.confirm('Silmek istediğinize eminmisiniz?');" class="btn btn-danger ">Sil</button>
                                </td>

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