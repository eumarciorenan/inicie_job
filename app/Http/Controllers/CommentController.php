<?php

/*===========================================
=            Author: Márcio Renan           =
=            Company: INICIE                =
=            API: GoRest                    =
=            DOC: https://gorest.co.in/     =
=            Copyright (c) 2022             =
===========================================*/

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::orderBy("id", "DESC")->get();
        return response()->json($comments);
    }


    public function Store(Request $request)
    {
        try {
            $mensagens = [
                'required' => 'O campo :attribute é obrigatório!',
            ];
            $request->validate([
                'name' => 'required',
                'body' => 'required',
                'email' => 'required',
                'post_id' => 'required',
            ], $mensagens);

            $post = Post::find($request->get("api_id"));
            if ($post == null){
             new Exception("Post não encontrado", 1);
            }
            $request->request->add(["api_id" => $post->api_id]);

            $in = new ApiController();
            $api_store = $in->CommentSave($request);
            if (!$api_store->success){
                new Exception("Erro ao salvar em GoRest: " . $api_store->error, 1);
            }
            $request->request->add(["api_id" => $api_store->body->id]);
            $post = $this->save($request);
            return $this->success("Comentário registrado com sucesso!", $post, 201);
        } catch (\Illuminate\Validation\ValidationException $th) {
            $error = $th->errors();
            return $this->error($error, 400);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400);
        }
    }


    public function FirstPostStore(Request $request)
    {
        try {
            $mensagens = [
                'required' => 'O campo :attribute é obrigatório!',
            ];
            $request->validate([
                'name' => 'required',
                'body' => 'required',
                'email' => 'required',
            ], $mensagens);

            $post = Post::orderBy("id", "DESC")->first();
            if ($post == null){
                new Exception("Post não encontrado", 1);
            }
            $request->request->add(["post_id" => $post->id]);
            $request->request->add(["api_postid" => $post->go_rest_id]);

            $in = new ApiController();
            $api_save = $in->CommentSave($request);
            if (!$api_save->success){
                new Exception("Erro ao salvar em GoRest: " . $api_save->error, 1);
            }
            $request->request->add(["go_rest_id" => $api_save->body->id]);
            $comment = new Comment();
            $comment->name = $request->get("name");
            $comment->email = $request->get("email");
            $comment->body = $request->get("body");
            $comment->post_id = $request->get("post_id");
            $comment->api_id = $request->get("go_rest_id");
            $comment->save();
            return $comment;
            return $this->success("Comentário registrado no post mais recente!", $post, 201);
        } catch (\Illuminate\Validation\ValidationException $th) {
            $error = $th->errors();
            return $this->error($error, 400);

        }
    }

    public function destroy($id)
    {
        try {
            $comment = Comment::find($id);
            if ($comment == null){
                new Exception("Comentário não encontrado", 1);
            }
            $in = new ApiController();
            $api_save = $in->CommentDelete($comment->api_id);
            if (!$api_save->success)
                throw new Exception("Erro ao deletar em GoRest: " . $api_save->error, 1);

            $comment->delete();
            return $this->success("Comentário deletado!", [], 201);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400);
        }
    }
}
