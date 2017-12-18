@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Add New Media</h2>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('action' => 'MediaController@store','method'=>'POST','files'=>true)) !!}
    <div class="row" >
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div  class="form-group">
                {!! Form::Label('type', 'Type:') !!}
                {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div  class="form-group">
                {!! Form::Label('status', 'Copyright Status:') !!}
                {!! Form::select('status_id', $statuses, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                {!! Form::Label('date', 'Publish Date:') !!}
                {!! Form::date('date', null, array('placeholder' => 'Date','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Where it came from:</strong>
                {!! Form::text('source', null, array('placeholder' => 'Source','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>File:</strong>
                {!! Form::file('file_name', $attributes = array()) !!}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('media.index') }}">Back</a>
        </div>

    </div>
    {!! Form::close() !!}



    <script>
        $( function() {
            $( "#date" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        } );
    </script>






@endsection