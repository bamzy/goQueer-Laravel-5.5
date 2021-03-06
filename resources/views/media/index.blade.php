@extends('dashboard')

@section('section')



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="text-center">
                                    <h1>Media List</h1>
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
                                <th>Source</th>
                                <th>Publish Date</th>
                                <th>Description</th>
                                <th>Gallery Name</th>

                                <th>Show</th>
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


    {{--<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>--}}
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.medias.index') }}",

                "columnDefs": [ {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button>Click!</button>"
                } ],
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "source" },
                    { "data": "publish_date" },
                    { "data": "description" },
                    { "data": "gallery_name" },
                    {
                        sortable: false,
                        searchable:false,
                        "render": function ( data, type, full, meta ) {
                            return "<a  class='btn btn-info' href='./media/"+full.id+"'> Show </a>";

                        }
                    },
                    {
                        sortable: false,
                        searchable:false,
                        "render": function ( data, type, full, meta ) {
                            return "<a  class='btn btn-primary' href='./media/"+full.id+"/edit'> Edit </a>";

                        }
                    },
                    {
                        sortable: false,
                        searchable:false,
                        "render": function ( data, type, full, meta ) {
                            return  "<a  class='btn btn-danger' href='./media/"+full.id+"/destroy'> Delete </a>";

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
                        <a class="btn btn-success" href="{{ route('media.create') }}"> New Media</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection