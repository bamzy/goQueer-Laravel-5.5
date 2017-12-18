@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Draft Media List</h2>
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
            <th>Source</th>
            <th>Publish Date</th>
            <th>Description</th>
            <th>File Name</th>
            <th width="50px">Action</th>
        </tr>
        @foreach ($medias as $key => $media)
            <tr>
                <td><div style="height:40px; overflow:hidden">{{ ++$i }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $media->name }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $media->source }}</div></td>
                <td><div style="height:40px;width:80px; overflow:hidden">{{ $media->date }}</div></td>
                <td><div style="height:40px;width:250px; overflow:hidden">{{ $media->description }}</div></td>
                <td><div style="height:40px;width:100px; overflow:hidden">{{ $media->fileName }}</div></td>

                <td>
                    <a class="btn btn-info" href="{{ route('draft.edit',$media->id) }}">Edit</a>
                    {{--<a class="btn btn-success" href="{{ route('test.update',$media->id) }}">Upgrade</a>--}}
                    {!! Form::open(['route' => ['test.update', $media->id], 'method'=>'PUT']) !!}
                    {!! Form::submit('Upgrade', ['class' => 'btn navbar-btn btn-success']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
    </table>

    {!! $medias->render() !!}

@endsection