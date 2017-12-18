@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Media: {{ $media->name }}</h2>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $media->name }}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Source:</strong>
                {{ $media->source }}
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Original File Name:</strong>
                {{ $media->fileName }}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Publish Date:</strong>
                {{ $media->date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $media->description }}
            </div>
        </div>
    </div>
    <button
            type="button"
            class="btn btn-success btn-sm"
            data-toggle="modal"
            data-target="#favoritesModal">
            Show Media
    </button>
    <div class="modal fade" id="favoritesModal"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">{{$media->name}}</h4>
                </div>
                <div class="modal-body">
                    {{--<img src="{{ URL::to('/uploads/' .    $media->fileName) }}" class="img-responsive" alt="{{$media->name}}">--}}
                    <object  display="inline-block" clear="both"
                             float="left"   data="{{ URL::to('/uploads/' .    $media->fileName) }}"></object>

                </div>
                <div class="modal-footer ">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <br>
    <br>
    <hr/>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('draft.index') }}"> Back</a>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h3> Comments</h3>
            </div>

        </div>
    </div>
    <table class="table table-bordered ">
        <tr>
            <th>Time</th>
            <th>Sender's Name</th>
            <th>Content</th>
        </tr>
        @foreach ($comments as $key => $comment)
            <tr>
                <td width="100px">{{ $comment->created_at }}</td>
                <td width="150px">{{ $comment->name }}</td>
                <td>{{ $comment->content }}</td>
                {{--<td>hii</td>--}}
            </tr>
        @endforeach
    </table>


    {!! Form::open(array('action' => 'MessageController@store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" style="visibility: hidden">
        <div class="form-group">
            {{ Form::hidden('media_id', $media_id, array('id' => 'media_id')) }}
        </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

                {!! Form::textarea('message', null, array('placeholder' => 'Leave a Comment','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-block">Send</button>
        </div>
    </div>
    {!! Form::close() !!}











@endsection