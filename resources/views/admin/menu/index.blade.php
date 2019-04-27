@extends ('admin/template')

@section('content')
    <div class="row">
        <div style="float:left; margin: 15px 0 5px 0;"><a href="{{route('menu.create')}}" class="btn btn-success">Yeni Menü</a></div>
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Menüler</h4>
                    <p class="text-muted m-b-30 font-14">
                    </p>

                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Menü Başlık</th>
                            <th> Menü Url veya Sayfasi </th>
                            <th>Menü Sıra</th>
                            <th>Üst Menü</th>
                            <th width="5%">Düzenle</th>
                            <th width="5%">Sil</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{$menu->title}}</td>
                                <td>
                                    @if($menu->page)
                                        <strong>Sayfa:</strong> {{--{{$menu->page->id}}--}}
                                    @else
                                        <strong>Özel Url:</strong> {{$menu->url}}

                                    @endif
                                </td>
                                <td>{{$menu->topnav}}</td>

                                <td>{{$menu->order}}</td>
                                <td><a href="{{route('menu.edit', $menu->id)}}" class="btn btn-success">Düzenle</a></td>
                                {!! Form::model($menu,['route'=>['menu.destroy',$menu->id],'method'=>'DELETE']) !!}
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