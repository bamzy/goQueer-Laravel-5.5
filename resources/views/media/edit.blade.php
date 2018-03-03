@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Edit Media</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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

    {!! Form::model($media, ['action' => 'MediaController@update','method'=>'POST','files'=>true]) !!}
{{--    {!! Form::open(array('action' => 'MediaController@store','method'=>'POST','files'=>true)) !!}--}}
    <div class="row" >
        {{ Form::hidden('media_id', $media->id, array('id' => 'media_id','class'=>'form-control')) }}
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                {!! Form::Label('date', 'Publish Date:') !!}
                {!! Form::date('publish_date', null, array('placeholder' => 'Publish Date','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div  class="form-group">
                {!! Form::Label('type', 'Type:') !!}
                {!! Form::select('type_id', $types, null, ['class' => 'form-control','onClick'=>'updateInputFields()','id'=>'media_type_id']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div  class="form-group">
                {!! Form::Label('status', 'Copyright Status:') !!}
                {!! Form::select('copyright_status_id', $statuses, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8" style="display:none" id="media_url" >
            <div  class="form-group" >
                {!! Form::Label('media_url', 'Media URL:') !!}
                {!! Form::text('media_url', null, array('placeholder' => 'Media URL','class' => 'form-control')) !!}
            </div>
        </div>


        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                {!! Form::Label('date', 'Display Date:') !!}
                {!! Form::text('display_date', null, array('placeholder' => 'Display Date','class' => 'form-control')) !!}
            </div>
            <div style="color: #f90f0b;">

                [1867?]: probable date
                [ca. 1867]: approximate date
                [before 1867]: terminal date
                [after 5 Jan. 1867]: terminal date
                [1892 or 1893]: one year or the other
                [between 1915 and 1918]: use only for dates fewer than 20 years apart
                [197-]: decade certain
                [186-?]: probable decade
                [17–]: century certain
                [17–?]: probable century
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
        <div class="col-xs-9 col-sm-9 col-md-9">
            <div class="form-group">
                <strong>Extra Links:</strong>
                {!! Form::textarea('extra_links', null, array('placeholder' => 'Extra Links separated by semicolon','class' => 'form-control','style'=>'height:50px')) !!}
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6" style="display:none" id="old_uploaded_filename" >
            <div class="form-group">
                <strong>Old File Name:</strong>
                {!! Form::text('fileName', null, array('placeholder' => 'fileName','class' => 'form-control','readonly')) !!}
                {{ $media->fileName }}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6" style="display:none" id="media_uploading_file" >
            <div class="form-group">
                <strong>New File:</strong>
                {!! Form::file('file_name', $attributes = array()) !!}
            </div>
        </div>




        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-primary" href="{{ route('media.index') }}">Back</a>
        </div>



    </div>
    {!! Form::close() !!}

    <script>


        function updateInputFields() {
            if ($("#media_type_id option:selected").text() == "None"){
                $('#media_url').hide();
                $('#media_uploading_file').hide();
                $('#old_uploaded_filename').hide();
            }
            else if ($("#media_type_id option:selected").text() == "Video" | $("#media_type_id option:selected").text() == "Sound" ){
                $('#media_url').show();
                $('#media_uploading_file').hide();
                $('#old_uploaded_filename').hide();

            }
            else{
                $('#media_url').hide();
                $('#media_uploading_file').show();
                $('#old_uploaded_filename').show();
            }
        }
        $( document ).ready(function() {
            updateInputFields();
        });
    </script>
@endsection