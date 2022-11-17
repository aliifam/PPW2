<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'id' => 'posts',
            'menu' => 'Gallery',
            'galleries' => Post::whereNotNull('image')->paginate(9),
        );
        return view('gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    * @OA\Get(
    * path="/api/gallery",
    * tags={"gallery"},
    * summary="Return json data post with image",
    * description="Return json data post with image with pagination",
    * operationId="gallery",
    * @OA\Response(
    * response="default",
    * description="successful operation"
    * )
    * )
    */

    public function api()
    {
        $posts = Post::whereNotNull('image')->paginate(10);
        $posts = $posts->toArray();
        $posts['data'] = array_map(function($post){
            $post['image'] = Storage::url($post['image']);
            return $post;
        }, $posts['data']);
        return response()->json($posts);
    }
}
