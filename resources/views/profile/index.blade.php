@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Profile List</h2>
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
            <th>Description</th>
            <th>Shows Everything</th>

            <th width="150px">Action</th>
        </tr>
        @foreach ($profiles as $key => $profile)
            <tr>
                <td><div style="height:40px; overflow:hidden">{{ ++$i }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $profile->name }}</div></td>
                <td><div style="height:40px;width:250px; overflow:hidden">{{ $profile->description }}</div></td>
                <td><div style="height:40px;width:250px; overflow:hidden">{{ $profile->show }}</div></td>


                <td><div style="width:200px">
                    {{--<a class="btn btn-info" href="{{ route('profile.show',$profile->id) }}">Show</a>--}}
                    <a class="btn btn-primary" href="{{ route('profile.edit',$profile->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['profile.destroy', $profile->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </div>

                </td>
            </tr>
        @endforeach
    </table>

    {!! $profiles->render() !!}
    <div class="text-center">
        <a class="btn btn-success" href="{{ route('profile.create') }}"> New Profile</a>
    </div>
@endsection