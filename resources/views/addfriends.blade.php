@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

          <form method="post" action="/search">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="search_name" class="form-control" placeholder="..." />
                </div>

                <div class="form-group">
                    <input type="submit" name="but"class="btn btn-primary" value="Search" />
                </div>
            </form>
            </div>


            <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <form method="post" action="/addfriend">
                    {{csrf_field()}}
                <div class="card-body">
                    @foreach($data as $p)
                        <tr>

                            <th>{{$p->name}} is a member since {{$p->created_at}}</th>
                            <br>
                            <th>
                                <div class="form-group">
                                    <button type="submit" name="but" class="btn btn-primary" value="{{$p->id}}"> Follow</button>
                                </div>
                            </th>

                            <br>
                        </tr>
                    @endforeach
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
