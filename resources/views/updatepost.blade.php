@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">


                <form method="post" action="/savepost">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{$data->title}}" required/>
                    </div>
                    <div class="form-group">
                        <textarea name="body" placeholder="Post" rows="10" cols="128"  required>{{$data->body}}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="but" class="btn btn-primary" value="{{$data->id}}"> Update</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
