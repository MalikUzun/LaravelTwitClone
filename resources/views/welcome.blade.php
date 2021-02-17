@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <form method="post" action="/createpost">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title" required/>
                </div>
                <div class="form-group">
                    <textarea name="body" placeholder="Post" rows="10" cols="128" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="but"class="btn btn-primary" value="Share" />
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
