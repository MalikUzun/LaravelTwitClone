<?php

namespace App\Http\Controllers;

use App\friend;
use App\Http\Requests;
use App\Post;
use App\User;
use Cassandra\Date;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('posts')->leftJoin('friends', 'friends.added_id', '=', 'posts.creator_id')->where('friends.adder_id','=',auth()->user()->id)->orderBy('posts.created_at', 'desc')->get();

        $arr = array();



        return view('main', ['data' => $data]);
    }

    public function addfriends()
    {
            $arr = array();
            $sub = DB::table('friends')->where('adder_id','=',auth()->user()->id)->get();
            foreach ($sub as $p){
                array_push($arr,$p->added_id);
            }
            array_push($arr,auth()->user()->id);
            $data = DB::table('users')->whereNotIn('id', $arr)->get();



            return view('addfriends', ['data' => $data]);



    }

    public function search(Request $req )
    {
        $arr = array();
        $sub = DB::table('friends')->where('adder_id','=',auth()->user()->id)->get();
        foreach ($sub as $p){
            array_push($arr,$p->added_id);
        }

        $name = $req -> input('search_name');
        $data = DB::table('users')->where([['name','LIKE','%'.$name.'%'],['id','!=',auth()->user()->id]])->whereNotIn('id',$arr)->get();

        return view('addfriends', ['data' => $data]);
    }


    public function index2()
    {

       return view('home');
    }

    public function welcome()
    {
       return view('welcome');

    }
    public function friends()
    {
        $data = DB::table('users')->leftJoin('friends', 'friends.added_id', '=', 'users.id')->where('friends.adder_id','=',auth()->user()->id)->orderBy('friends.created_at', 'desc')->get();
        $datafollower = DB::table('users')->leftJoin('friends', 'friends.adder_id', '=', 'users.id')->where('friends.added_id','=',auth()->user()->id)->orderBy('friends.created_at', 'desc')->get();
        return view('friends',['data' => $data],['datafollower' => $datafollower]);

    }

    public function usersposts()
    {
        $data = DB::table('posts')->where('creator_id','=',auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('usersposts',['data' => $data]);

    }

    public function create_post(Request $req)
    {

        Post::create([
            'creator_id' => auth()->user()->id,
            'title' => $req['title'],
            'body' => $req['body']

        ]);
        return view('welcome');


    }

    public function add_friend(Request $req)
    {

        friend::create([
            'adder_id' => auth()->user()->id,
            'added_id' => $req['but'],

        ]);

        return $this->addfriends(null);
    }

    public function deletefriends(Request $req)
    {
        $search =  friend::where([['adder_id','=',auth()->user()->id],['added_id' ,'=',$req['but']]]);
        $search -> delete();
        return $this->friends(null);

    }

    public function deleteposts(Request $req)
    {
        $search =  Post::where('id','=',$req['but']);
        $search -> delete();
        return $this->usersposts(null);

    }

    public function updatepost(Request $req)
    {
        $data = DB::table('posts')->where('id','=',$req['butup'])->first();

        return view('updatepost',['data' => $data]);

    }

    public function savepost(Request $req)
    {
        $search = Post::where('id','=',$req['but'])->first();

        $search->title = $req['title'];
        $search->body = $req['body'];
        $search->save();
        return $this->usersposts();
    }


}


