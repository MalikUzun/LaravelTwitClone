@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <form method="post" action="/deletefriends">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <div class="card-body">
                                <h1>Followed Users</h1>
                                @foreach($data as $p)
                                    <tr>
                                        <th><h3>{{$p->name}}</h3></th>

                                        <th>
                                            <div class="form-group">
                                                <button type="submit" name="but" class="btn btn-primary" value="{{$p->added_id}}"> Unfollow</button>
                                            </div>
                                        </th>
                                        <br>
                                    </tr>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1>Followers</h1>
                        @foreach($datafollower as $p)
                            <tr>
                                <th><h3>{{$p->name}}</h3></th>

                                <th>

                                </th>
                                <br>
                            </tr>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
