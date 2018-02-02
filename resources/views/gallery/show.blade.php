@extends('dashboard')

@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Gallery: {{ $gallery->name }}</h2>
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

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $gallery->description }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Belongs to set:</strong>
                {{ $set_name }}
            </div>
        </div>
    </div>



    <hr/>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3> Assigned Media:</h3>
            </div>

        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Source</th>
            <th>Publish Date</th>
            <th>Description</th>
            <th>Order</th>
            <th>Action</th>
            <th>Up</th>
            <th>Down</th>

        </tr>
        @foreach ($assigned_medias as $key => $assigned_media)
            <tr>
                <td><div style="height:20px; overflow:hidden">{{ $assigned_media->finalId }}</div></td>
                <td><div style="height:20px; overflow:hidden">{{ $assigned_media->name }}</div></td>
                <td><div style="height:20px; overflow:hidden">{{ $assigned_media->source }}</div></td>
                <td><div style="height:20px;width:80px; overflow:hidden">{{ $assigned_media->publish_date }}</div></td>
                <td><div style="height:20px;width:250px;overflow:hidden">{{ $assigned_media->description }}</div></td>
                <td><div style="height:20px;width:25px;overflow:hidden">{{ $assigned_media->order}}</div></td>
                <td><div style="height:50px;width:70px;overflow:hidden">
                        <a  class='btn btn-danger' href="/gallery_media/{{$assigned_media->finalId}}/destroy/{{$id}}"> Delete </a>



                <td>
                    <div style="width:20px ">
                        <a  class='btn navbar-btn btn-info' href='/order/increase/{{$assigned_media->finalId}}&{{$id}}'>↑</a>
                        {{--{!! Form::open(['route' => ['order.increase', $assigned_media->finalId.'&'.$id ], 'method'=>'PUT']) !!}--}}
                        {{--{!! Form::submit('↑', ['class' => 'btn navbar-btn btn-info']) !!}--}}
                        {{--{!! Form::close() !!}--}}
                    </div></td>
                <td>
                    <div style="width:20px ">
                        @if($assigned_media->order > 0)
                            <a  class='btn navbar-btn btn-info' href='/order/decrease/{{$assigned_media->finalId}}&{{$id}}'>↓</a>
                        @endif
                        {{--{!! Form::open(['route' => ['order.destroy', $assigned_media->finalId.'&'.$id ], 'method'=>'DELETE']) !!}--}}
                        {{--{!! Form::submit('↓', ['class' => 'btn navbar-btn btn-info']) !!}--}}
                        {{--{!! Form::close() !!}--}}
                    </div></td>


            </tr>
        @endforeach
    </table>

    <hr/>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3> All Media:</h3>
            </div>

        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Source</th>
            <th>Publish Date</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($final_all_medias as $key => $all_media)
            <tr>
                <td><div style="height:20px; overflow:hidden">{{ $all_media->id }}</div></td>
                <td><div style="height:20px; overflow:hidden">{{ $all_media->name }}</div></td>
                <td><div style="height:20px; overflow:hidden">{{ $all_media->source }}</div></td>
                <td><div style="height:20px;width:80px; overflow:hidden">{{ $all_media->publish_date }}</div></td>
                <td><div style="height:20px;width:250px; overflow:hidden">{{ $all_media->description }}</div></td>

                <td>
                    <div style="height:35px; overflow:hidden">
                    {{--<a class="btn btn-success" href="{{ route('gallery_media.create',Array('media_id' =>$all_media->id,'gallery_id' => $id)) }}">Add</a>--}}
                        {{--{!! Form::open(['method' => 'CREATE','route' => ['gallery_media.create',Array($assigned_media->finalId,1)],'style'=>'display:inline']) !!}--}}
                        {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                        {{--{!! Form::close() !!}--}}
                        {!! Form::open(['route' => ['gallery_media.update', $all_media->id . '&'.$id], 'method'=>'PUT']) !!}
{{--                        {!! Form::open(['action' => 'GalleryMediaController@create', $all_media->id . '&'.$id]) !!}--}}
                        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <hr/>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('gallery.index') }}"> Back</a>
    </div>















@endsection