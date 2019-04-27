@extends ('admin/template')

@section('content')
    <div class="row">
        <div style="float:left; margin: 15px 0 5px 0;"><a href="{{route('slider.create')}}" class="btn btn-success">Yeni Slider</a></div>
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Sliderlar</h4>
                    <p class="text-muted m-b-30 font-14">
                    </p>

                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="50%">Görsel</th>
                            <th>Metin</th>

                            <th width="7">Düzenle</th>
                            <th width="5">Sil</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td><img src="/{{$slider->image}}" width="400px"> </td>
                                <td>{{$slider->text1}}</td>

                                <td><a href="{{route('slider.edit', $slider->id)}}" class="btn btn-success">Düzenle</a></td>
                                {!! Form::model($slider,['route'=>['slider.destroy',$slider->id],'method'=>'DELETE']) !!}
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