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
        $movies = Movie::orderBy("id","desc")->get();
        return view('index',array("movies" => $movies));
    }

    public function mypage()
    {
        $movies = Movie::where("user_id",Auth::id())->orderBy("id","desc")->get();
        return view('mypage',array("movies" => $movies));
    }

    public function comment(Request $request){

      $validatedData = $request->validate([
        'text' => 'required|max:255',
        'id' => 'required'
      ]);

      $id = $request->id;

      $comment = new Comment;
      $comment->text = $request->text;
      $comment->user_id = Auth::id();
      $comment->movie_id = $id;
      $comment->time = date("Y-m-d H:i:s");
      $comment->save();

      return redirect()->action('SocialController@movie',array("id" => $id));
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

      $movieFile = $request->file('file');
      $movieTitle = $request->input('movie_title');
      $movieName = $movieTitle.".mp4";
      $path = Storage::disk('s3')->putFileAs('/', $movieFile, $movieName, 'public');
      $movieUrl = Storage::disk('s3')->url($movieName);

      $thumbnailFile = $request->file('thumbnail');
      $thumbnailName = $request->file('thumbnail')->getClientOriginalName().'.'.$request->file('thumbnail')->getClientOriginalExtension();
      $path = Storage::disk('s3')->putFileAs('/', $thumbnailFile, $thumbnailName, 'public');
      $thumbnailUrl = Storage::disk('s3')->url($thumbnailName);

      $movieRegist = new Movie;
      $movieRegist->text = $movieTitle;
      $movieRegist->user_id = Auth::id();
      $movieRegist->movie = $movieUrl;
      $movieRegist->thumbnail = $thumbnailUrl;
      $movieRegist->time = date("Y-m-d H:i:s");
      $movieRegist->save();

      $movies = Movie::where("user_id",Auth::id())->orderBy("id","desc")->get();
      return view('mypage',array("movies" => $movies));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $movies = Movie::where('text', 'LIKE',"%$search%")->get();

        if($movies->isEmpty()){
          return view('search_text');
        }
        return view('index',array("movies" => $movies));
    }

}
