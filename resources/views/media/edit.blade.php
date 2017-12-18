@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Edit Location</h2>
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

    {!! Form::model($media, ['method' => 'PATCH','route' => ['media.update', $media->id]]) !!}
    <div class="row" >
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                {!! Form::Label('date', 'Publish Date:') !!}
                {!! Form::date('publish_date', null, array('placeholder' => 'Publish Date','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div  class="form-group">
                {!! Form::Label('type', 'Type:') !!}
                {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div  class="form-group">
                {!! Form::Label('status', 'Copyright Status:') !!}
                {!! Form::select('copyright_status_id', $statuses, null, ['class' => 'form-control']) !!}
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




        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-primary" href="{{ route('media.index') }}">Back</a>
        </div>

    </div>
    {!! Form::close() !!}


@endsection