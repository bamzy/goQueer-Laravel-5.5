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
                                    <h1>Profile List</h1>
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
                                <th>Show Pins</th>
                                <th>Visible to Client</th>

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


    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.profiles.index') }}",
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "description" },
                    {
                        sortable: true,
                        searchable:false,
                        "render": function ( data, type, full, meta ) {
                            if (full.show == '0')
                                return 'No';
                            else if (full.show == '1')
                                return 'Yes';
                            else if (full.show == '2')
                                return 'Yes, but cant see galleries';

                        }
                    },
                    {
                        sortable: true,
                        searchable:false,
                        "render": function ( data, type, full, meta ) {
                            if (full.visibleToPlayer == '0')
                                return 'Hidden';
                            if (full.visibleToPlayer == '1')
                                return 'Visible';
                        }

                    },
                    {
                        sortable: true,
                        searchable:false,
                        "render": function ( data, type, full, meta ) {
                            return "<a  class='btn btn-primary' href='./profile/"+full.id+"/edit'> Edit </a>";

                        }
                    },
                    {
                        sortable: false,
                        searchable:false,
                        "render": function ( data, type, full, meta ) {
                            return  "<a  class='btn btn-danger' href='./profile/"+full.id+"/destroy'> Delete </a>";

                        }
                    }
                ]

            });
        });


        $.fn.dataTable.ext.errMode = 'none';
        $('#table').on( 'error.dt', function ( e, settings, techNote, message ) {
            console.log( 'An error has been reported by DataTables: ', message );
        } ) ;
    </script>



    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><div class="row">
                    <div class="text-center">
                        <a class="btn btn-success" href="{{ route('profile.create') }}"> New Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection