@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center" >
                <h1>Gallery List</h1>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Set</th>
            <th>Description</th>

            <th width="150px">Action</th>
        </tr>
        @foreach ($galleries as $key => $gallery)
            <tr>
                <td><div style="height:40px; overflow:hidden">{{ ++$i }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $gallery->name }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $gallery->set_name }}</div></td>
                <td><div style="height:40px;width:250px; overflow:hidden">{{ $gallery->description }}</div></td>


                <td><div style="width:200px">
                    <a class="btn btn-info" href="{{ route('gallery.show',$gallery->id) }}">Config</a>
                    <a class="btn btn-primary" href="{{ route('gallery.edit',$gallery->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['gallery.destroy', $gallery->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </div>

                </td>
            </tr>
        @endforeach
    </table>

    {!! $galleries->render() !!}
    <div class="text-center">
        <a class="btn btn-success" href="{{ route('gallery.create') }}"> New Gallery</a>
    </div>


@endsection