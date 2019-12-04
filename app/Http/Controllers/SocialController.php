<?php

namespace magicmovieroom\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

use Illuminate\Support\Facades\Auth;
use magicmovieroom\Comment;
use magicmovieroom\Movie;
use magicmovieroom\User;

class SocialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        // phpinfo();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $movie = Movie::all()->orderBy("id","desc");
        $movie = Movie::orderBy("id","desc")->get();
        return view('index',array("movies" => $movie));
    }

    public function magic_bar()
    {
        return view('magic_bar');
    }

    public function mypage()
    {
        // $movie = Movie::all();
        $movie = Movie::where("user_id",Auth::id())->orderBy("id","desc")->get();
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

      return redirect()->action('SocialController@movie',array("id" => $id));
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

      $comment = movie::all();
      return redirect()->action('SocialController@index');
    }

    public function movie($id){
      $id = intval($id);

      $movie = Movie::where('id', $id)->first();
      $comment = DB::table('comment')
      ->leftJoin('users', 'comment.user_id', '=', 'users.id')
      ->where('movie_id', $id)->get();
      $users = User::all();
      return view('movie',array("movie" => $movie,"texts" => $comment,"users" => $users));
    }

    public function react(){
      return response()->json(['apple' => 'red']);
    }

    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'file' => 'required|mimes:mp4',
        'thumbnail' => 'required|mimes:jpeg,png,bmp',
        'movie_title' => 'required|max:100',
      ]);
      $file = $request->file('file');
      $name = $request->input('movie_title');
      $name_url = $name.".mp4";

      $file_pic = $request->file('thumbnail');
      $name_pic = $request->file('thumbnail')->getClientOriginalName().'.'.$request->file('thumbnail')->getClientOriginalExtension();

      $path = Storage::disk('s3')->putFileAs('/', $file, $name_url, 'public');
      $path = Storage::disk('s3')->putFileAs('/', $file_pic, $name_pic, 'public');
      // return redirect('/');
      $url = Storage::disk('s3')->url($name_url);
      $url_pic = Storage::disk('s3')->url($name_pic);

      $com = new Movie;

      $com->text = $name;
      $com->user_id = Auth::id();
      $com->movie = $url;
      $com->thumbnail = $url_pic;
      $com->time = date("Y-m-d H:i:s");
      $com->save();

      $movie = Movie::where("user_id",Auth::id())->get();
      return view('mypage',array("movies" => $movie));

    }

    public function search(Request $request)
    {
        // $movies = Movie::all();
        $search = $request->input('search');
        $movies = Movie::where('text', 'LIKE',"%$search%")->get();

        if($movies->isEmpty()){
          return view('search_text');
        }
        return view('index',array("movies" => $movies));
    }

}
