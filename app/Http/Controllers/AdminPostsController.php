<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photos;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')->with('categories', Category::pluck('name','id')->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();


        $input['user_id'] =  Auth::user()->id;

        if($photo = $request->file('photo'))
        {
            $name = time(). $photo->getClientOriginalName();
            $photo->move('images',$name);
            $photo = Photos::create(['path'=>$name]);

            $input['photo_id']= $photo->id;
        }

        Post::create($input);

        Session::flash('post_created','Post with Title' . $input['title'] . ' created!');

        return redirect('admin/posts/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.posts.edit')->with(['post'=>Post::findOrFail($id), 'categories'=>Category::pluck('name','id')->all()]);
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
        $input = $request->all();

        $input['user_id'] =  Auth::user()->id;

        if($photo = $request->file('photo'))
        {
            $name = time(). $photo->getClientOriginalName();

            if(Post::findOrFail($id)->photo)
            unlink(public_path(). Post::findOrFail($id)->photo->path);

            $photo->move('images',$name);
            $photo = Photos::create(['path'=>$name]);

            $input['photo_id']= $photo->id;
        }


        Session::flash('post_edited','Post with Title' . $input['title'] . ' created!');

        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('admin/posts/');
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

        $photo = $post->photo;

        unlink(public_path(). $photo->path);


        $post->delete();

        return redirect('/admin/posts');
    }
}
