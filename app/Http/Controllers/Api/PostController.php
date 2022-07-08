<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $posts = Post::all();
        return response()->json(['message' => 'Successfully', 'data' => $posts->toArray()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title'     => 'required|min:5',
            'artikel'   => 'required|min:10'
        ]);

       $posts = DB::table('posts')->insert([
            'image' => $request->image,
            'title' => $request->title,
            'artikel' => $request->artikel,
        ]);

        return response([
            'data' => $posts,
            'message' => 'success',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
    // {
    //     $posts = Post::find($id);
    //     if ($posts != null) {
    //         return response([
    //             'data' => $posts,

    //         ], 200);
    //     }
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
        $validate=$request->validate([
            'image' => ['required'],
            'title' => ['required'],
            'artikel' => ['required'],

        ]);
        $posts = DB::table('posts')->where('id', $id)->first();
        DB::table('posts')->where('id', $id)->update([
            'image' => $request->image,
            'title' => $request->title,
            'artikel' => $request->artikel,
        ]);
        return response([
            'data' => $posts,
            'message' => 'success',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::table('posts')->where('id', $id)->delete();
        return response([
            'message' => 'Data berhasil dihapus!',
        ], 200);
    }
}
