@extends('dashboard')

@section('section')



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



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
                                <th>Edit</th>
                                <th>Delete</th>
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
                    { "data": "created_at" },
                    {
                        sortable: false,
                        searchable:false,
                        "render": function ( data, type, full, meta ) {
//                                return "<a  class='btn btn-primary' href='./set/"+full.id+"/edit'> Edit </a>";
                            return '<a class="btn btn-info btn-sm" href=#/' + full.id + '>' + 'Edit' + '</a>';

                        }
                    },
                    {
                        sortable: false,
                        searchable:false,
                        "render": function ( data, type, full, meta ) {
//                            return  "<a  class='btn btn-danger' href='./set/"+full.id+"/destroy'> Delete </a>";

                        }
                    }
                ]

            });
        });
    </script>


@endsection