<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Movie;
use App\User;

class SocialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // phpinfo();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movie = Movie::all();
        return view('index',array("movies" => $movie));
    }

    public function magic_bar()
    {
        return view('magic_bar');
    }

    public function mypage()
    {
        // $movie = Movie::all();
        $movie = Movie::where("user_id",Auth::id())->get();
        return view('mypage',array("movies" => $movie));
    }

    public function comment(Request $request){

      $validatedData = $request->validate([
        'text' => 'required|max:255',
        'id' => 'required'
      ]);

      $a = $_POST;

      $id = $request->id;

      $com = new Comment;
      $com->text = $request->text;
      $com->user_id = Auth::id();
      $com->movie_id = $id;
      $com->time = date("Y-m-d H:i:s");
      $com->save();
      // var_dump($request->name);

      // $comment = Comment::all();
      // return view('index',array("texts" => $comment));
      // return redirect()->action('SocialController@index');
      // return view('index');
      return redirect()->action('SocialController@movie',array("id" => $id));
      // return redirect('/');

    }


    public function movie_post(Request $request){

      $validatedData = $request->validate([
        'title' => 'required|max:255',

      ]);


      $a = $_POST;
      $youtube_id = explode("=",$request->url);

      $com = new Movie;
      $com->text = $request->title;
      $com->user_id = Auth::id();
      $com->movie = $youtube_id[1];
      $com->time = date("Y-m-d H:i:s");
      $com->save();
      // var_dump($request->name);

      $comment = movie::all();
      // return view('index',array("texts" => $comment));
      return redirect()->action('SocialController@index');
      // return view('index');
      // return redirect()->action('SocialController@movie',array("id" => $id));
      // return redirect('/');

    }

    public function movie($id){
      // var_dump($id);
      $id = intval($id);

      $movie = Movie::where('id', $id)->first();
      // $comment = Comment::where('movie_id', $id)->get();
      $comment = DB::table('comment')
      ->leftJoin('users', 'comment.user_id', '=', 'users.id')
      ->where('movie_id', $id)->get();
      $users = User::all();
      return view('movie',array("movie" => $movie,"texts" => $comment,"users" => $users));
    }

    public function react(){
      return response()->json(['apple' => 'red']);
      // return ['apple' => 'red', 'peach' => 'pink'];
    }
}
