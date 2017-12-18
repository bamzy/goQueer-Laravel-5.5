@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h1>Set List</h1>
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

            <th width="150px">Action</th>
        </tr>
        @foreach ($sets as $key => $set)
            <tr>
                <td><div style="height:40px; overflow:hidden">{{ ++$i }}</div></td>
                <td><div style="height:40px; overflow:hidden">{{ $set->name }}</div></td>
                <td><div style="height:40px;width:250px; overflow:hidden">{{ $set->description }}</div></td>


                <td><div style="width:200px">
                    <a class="btn btn-info" href="{{ route('set.show',$set->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('set.edit',$set->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['set.destroy', $set->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </div>

                </td>
            </tr>
        @endforeach
    </table>

    {!! $sets->render() !!}


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="text-center">
                                    <h1>Set List</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table" id="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
    <div class="panel-heading"><div class="row">
            <div class="text-center">
                <a class="btn btn-success" href="{{ route('set.create') }}"> New Set</a>
            </div>
        </div>
    </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.sets.index') }}",
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "description" },
                    { "data": "created_at" }
                ]
            });
        });
    </script>


@endsection