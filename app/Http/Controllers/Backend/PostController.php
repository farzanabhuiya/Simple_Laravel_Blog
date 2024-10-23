<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Helpers\SlugGenerator;

class PostController extends Controller
{ use SlugGenerator ;

    
    public function index(Request $request){
        $posts= Post::latest()->paginate(7);
        return view('backend.Post.ShowAllPost',compact('posts'));
    }


    public function create(){
        $posts = Post::latest()->paginate(7);
        return view('backend.Post.CreatePost');
    }


    public function story(Request $request){

               ////validate
          $request->validate([
              'title' =>"required",
              'content' =>"required"
            ]);
         
            $fileName = null; 
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('post', $fileName, 'public');
        }


            $posts = new Post();
            $posts->user_id=Auth::id();
            $posts->slug=$this->generateslug($request->title,Post::class);
            $posts->title = $request->title;
            $posts->image = $fileName;
            $posts->content = $request->content;
            $posts->save();
            return back()->with('success','Post Created successfully!');
            
    }



    public function edit($id){
        $post=Post::find($id);
        return view('backend.Post.editPost',compact('post'));
    }
    

    public function update(Request $request, $id){
        $post=Post::find($id);
        $post->user_id=Auth::id();
        $post->title = $request->title;
        $post->slug=$this->generateslug($request->title,Post::class); 
        $post->content= $request->content;
        $post->save();
        return back()->with('success','Post Upadte successfully!');

    }

    public function delete($id){
        Post::find($id)->delete();
        return back()->with('success','Post Deleted successfully!');
    }


            //  ReadMore
    public function getFullContent($id){
    $post = Post::findOrFail($id);
    return response()->json(['content' => $post->content]);
}


}
