<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index(){

        $posts = Post::orderBy('id', 'desc')->with('user', 'category')->get();

        return response()->json([
            'posts' => $posts,
        ], 200);
    }

    public function store(PostRequest $request){

        try{

            $image_extension_part = substr($request->photo, 0, strpos($request->photo, ';'));
            $image_extension = explode('/', $image_extension_part)[1];

            $image_name = time().'.'.$image_extension;
            $image = Image::make($request->photo)->resize(200, 200);
            $path = public_path().'/posts/';
            $image->save($path.$image_name);

            $request->merge([
                'user_id' => Auth::user()->id,
                'photo' => $image_name]);

            Post::create($request->all());

            return response()->json([
                'message' => 'Post added successfully!',
            ], 200);

        }catch (\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    public function delete($id){
        try{

            $post = Post::findOrFail($id);

            $image = public_path().'/posts/'.$post->photo;
            if(file_exists($image)){
                @unlink($image);
            }
            $post->delete();

            return response()->json([
                'message' => 'Post deleted successfully!'
            ], 200);

        }catch (\Exception $e){

            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
