@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h1>Media List</h1>
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
            <th width="200px">Action</th>
        </tr>
        @foreach ($medias as $key => $media)
            <tr>
                <td><div style="height:40px; overflow:hidden">{{ ++$i }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $media->name }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $media->source }}</div></td>
                <td><div style="height:40px;width:80px; overflow:hidden">{{ $media->date }}</div></td>
                <td><div style="height:40px;width:250px; overflow:hidden">{{ $media->description }}</div></td>

                <td>
                    <a class="btn btn-success" href="{{ route('media.show',$media->id) }}">Show</a>
                    <a class="btn btn-info" href="{{ route('media.edit',$media->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['media.destroy', $media->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
    </table>

    <table id="project-table" class="table table-condensed table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>created at</th>
        </tr>
        </thead>
    </table>
    <script>

        $(document).ready(function() {
            $('#project-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url("client/test") }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'}]
            });
        });

    </script>

    {!! $medias->render() !!}
    <div class="text-center">
        <a class="btn btn-success" href="{{ route('media.create') }}"> Add New Media</a>
    </div>
@endsection