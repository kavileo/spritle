<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\PostLike;
use App\Models\UserPost;

use App\Models\PostComment;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();

        $posts=UserPost::with(['postliked','user','postcomment.user'])->orderBy('id','DESC')->get();


        return view('home',compact('posts'));

    }

    public function postlike(Request $request){
        try {
            $Postlike=PostLike::where('user_id',Auth::user()->id)->where('post_id',$request->id)->first();
            if(isset($Postlike->id)){
                $Postlike=$Postlike->delete();
                $likeCount=PostLike::where('post_id',$request->id)->count();

                return response()->json(['message' => 'success','data'=>$likeCount,'liked'=>0],200);
            }else{
                $Postlike= new PostLike;
                $Postlike->post_id=$request->id;
                $Postlike->user_id=Auth::user()->id;
                $Postlike->save();
                $likeCount=PostLike::where('post_id',$request->id)->count();
                return response()->json(['message' => 'success','data'=>$likeCount,'liked'=>1],200);
            }

        } catch (\Throwable $th) {
            return response()->json(['message' => 'failure'],500);
        }

    }

    public function commentpost(Request $request){

        try {
           $PostComment=new PostComment;
           $PostComment->user_id=Auth::user()->id;
           $PostComment->post_id=$request->post_id;
           $PostComment->comments=$request->comments;
           $PostComment->save();
           return back()->with('flash_success','Commented Successfully.');
        } catch (\Throwable $th) {

            return back()->with('flash_error','Something Went Wrong.');


        }
    }


    public function post(){
        return view('post');
    }

    public function poststore(Request $request){

        try {
            $this->validate($request,[
                'description' => 'required'

            ]);
            $UserPost= new UserPost;
            $UserPost->user_id=Auth::user()->id;
            $UserPost->description=$request->description;
            $UserPost->save();
            return redirect()->route('home')->with('flash_success','Posted Successfully.');
        } catch (\Throwable $th) {
            return back()->with('flash_error','Something Went Wrong.');

        }
    }

}
