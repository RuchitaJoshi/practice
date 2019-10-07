<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Console\Input\Input;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('created_at')->paginate(5);

//        To prevent pagination over range. For over range, It will redirect you to the same display page.
        abort_unless($posts->count(), 204);

        return view('posts.index', compact('posts'));
    }

    public function search(Request $request)
    {
        $search = $request->get('title');

        $result = Post::where('title', 'LIKE', '%'. $search. '%')->get();

        return response()->json($result);

    }

    public function ajaxRequestPost(){
//        $input = request()->all();
//        return response()->json(['success'=>true,['data'=>'simple ajax submission']]);
        dd("hi");
    }

    public function giveme(Request $request)
    {
        $id = $request->input('id');
        $post = Post::findOrFail($id);
        return $post;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        return view('posts.create');
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Post
     */
    public function store(CreatePostRequest $request)
    {
//        $file = $request->file('file');
//        echo $file->getClientOriginalName();
//
//        $this->validate($request, [
//            'title'=>'required',
//            'body'=>'required'
//        ]);
//
//        $input = $request->all();
//
//        if($file = $request->file('file')){
//            $name = $file->getClientOriginalName();
//            $file->move('images', $name);
//            $input['path'] = $name;
//        }
//       Post::create(Input::all());


//        Post::create(['title'=>$request->title, 'body'=>$request->body, 'user_id'=>1]);
//        return redirect('/posts');


//            $post = new Post();
//            $post->user_id = 1;
//            $post->title = $request->input('title');
//            $post->body = $request->input('body');
//            $post->save ();
//            return $post;
//            return redirect('/posts');
//            return response ()->json ( $post );

//        $post = Post::create(['user_id'=>1, 'title'=>$request->title, 'body'=>$request->body]);
        $post = Post::create($request->input());
        return response()->json($post);
            //return redirect('/posts');
        //return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

//        $post->update(['title'=>$request->title, 'body'=>$request->body]);

        $post->update($request->input());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }

}
