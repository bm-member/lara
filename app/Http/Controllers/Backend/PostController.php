<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Gate;
// use App\User;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public function index(Request $request)
    {
        if(Gate::allow('isAdmin')){
            if($request->search)
                {
                    $posts=Post::where('title','like','%'.$request->search.'%')->orderBy('id', 'desc')->paginate(6);

        }else{
            $posts = Post::orderBy('id', 'desc')->paginate(6);

        }

    }
        if(Gate::allow('isAuthor')){
            if($request->search)
            {
                $posts=Post::where('title','like','%'.$request->search.'%')
                ->where('user_id',auth()->id())
                ->orderBy('id', 'desc')
                ->paginate(6);
            }else{
                $posts = Post::orderBy('id', 'desc')
                 ->where('user_id',auth()->id())
                 ->paginate(6);

            }
        return view('backend.post.index', compact('posts'));
    }
}



    //     if($request->search)
    //     {
    //         $posts=Post::where('title','like','%'.$request->search.'%')->orderBy('id', 'desc')->paginate(6);
    //     }else{
    //     // $posts = Post::all();
    //     // $posts = Post::orderBy('id', 'desc')->get();
    //     $posts = Post::orderBy('id', 'desc')->paginate(6);
       
    // }
    // return view('backend.post.index', compact('posts'));
    

    public function create()
    {
        return view('backend.post.create');
    }

    public function store(PostRequest $request)
    {
        //dd($request->all());

        /* $request->validate([
            'title' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'ခေါင်းစဉ်လိုအပ်သည်။',
            'content.required' => 'အကြောင်းအရာလိုအပ်သည်။'
        ]); */

        

        /* Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id
        ]); */
        
        /* $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->save(); */

        Post::create($request->all());
        
        return redirect('admin/post')->with('status', 'Created post successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        // $user = User::find($post->user_id);

        return view('backend.post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('backend.post.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        /* $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = 1;
        $post->save(); */

        /* $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id
        ]); */

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('admin/post')->with('status', 'Updated post successfully.');
    }

    public function destroy($id)
    {
        // $post = Post::where('id', $id)->first();
        // $post = Post::find($id);
        $post = Post::findOrFail($id); // with error checking
        $post->delete();
        // return redirect('admin/post')->with('status', 'Deleted post successfully.');
        // return redirect()->back()->with('status', 'Deleted post successfully.');
        return back()->with('status', 'Deleted post successfully.');
    }
}
