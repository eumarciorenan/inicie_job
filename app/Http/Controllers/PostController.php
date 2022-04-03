<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // LIST ALL POSTS
    public function index()
    {
        $posts = Post::orderBy("id", "DESC")->get();
        return response()->json($posts);
    }

    // SAVE AS POST
    public function Store(Request $request)
    {
        try {
            // VALIDATE INPUT
            $msg_error = [
                'required' => 'O campo :attribute é obrigatório!',
            ];
            $request->validate([
                'title' => 'required',
                'body' => 'required',
                'user_id' => 'required',
            ], $msg_error);

            // SELECT USER
            $user = User::find($request->get("user_id"));
            if ($user == null)
                throw new Exception("Usuário não encontrado", 1);
            $request->request->add(["user_id" => $user->api_id]);

            $in = new ApiController();
            $api_save = $in->PostSave($request);

            if (!$api_save->success){
                new Exception("Ops algo deu errado: " . $api_save->error, 1);
            }
            $request->request->add(["api_id" => $api_save->body->id]);
            $post = new Post();
            $post->user_id = $request->get("user_id");
            $post->title = $request->get("title");
            $post->body = $request->get("body");
            $post->api_id = $request->get("api_id");
            $post->save();

            return $this->success("Post gravado com sucesso!", $post, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {

                $error = $e->errors();
                return $this->error($error, 400);
        }
    }

    // LIST COMMENTS AS POST
    public function Comments($id)
    {
        $posts = Post::with("comments")->find($id);
        return response()->json($posts);
    }
}
