@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h1>Location List</h1>
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
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Coordinates</th>
            <th>Profile</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($locations as $key => $location)
            <tr>
                <td><div style="height:40px; overflow:hidden">{{ $location->id }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $location->name }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $location->description }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $location->coordinate }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $location->profileName }}</div></td>

                <td>
                    <a class="btn btn-info" href="{{ route('location.show',$location->id) }}">Config</a>
                    <a class="btn btn-success" href="{{ route('location.edit',$location->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['location.destroy', $location->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {!! $locations->render() !!}
    <div class="text-center">
        <a class="btn btn-success" href="{{ route('location.create') }}"> Create New Location</a>
    </div>
@endsection