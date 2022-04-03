<?php

/*===========================================
=            Author: Márcio Renan           =
=            Company: INICIE                =
=            API: GoRest                    =
=            DOC: https://gorest.co.in/     =
=            Copyright (c) 2022             =
===========================================*/

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlController;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $token;
    protected $url;
    protected $headers;

    public function __construct()
    {
        $this->token = "dd54a3b08521ebfc68ef9a51c4d0fd36be9f53b488f10a250f98698420398bb7";
        $this->url = "https://gorest.co.in/public/v2/";
        $this->headers = [
            'Content-Type:application/json',
            'Authorization:Bearer ' . $this->access_token,
            'User-Agent:Mozilla/5.0 (X11; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'
        ];
    }

    // LIST ALL
    public function UserIndex()
    {
        $curl = new CurlController();
        return $curl->get($this->url.'users', []);
    }

    // SAVE USER
    public function UserSave(Request $request)
    {
        $post_data = [
            'name' => $request->get("name"),
            'email' => $request->get("email"),
            'gender' => $request->get("gender"),
            'status' => "active"
        ];

        $curl = new CurlController();
        $post_request = $curl->post($this->url . 'users', $post_data, $this->headers);
        if ($post_request->httpcode == 201) {
            return $this->success("Cadastrado!", json_decode($post_request->response));
        }
        return $this->error($post_request->response);
    }

    // SAVE POST
    public function PostSave(Request $request)
    {

        $post_data = [
            'title' => $request->get("title"),
            'content' => $request->get("content"),
        ];

        $curl = new CurlController();
        $url = $this->url."users/".$request->get("user_id")."/posts";
        $post_request = $curl->post($url, $post_data, $this->headers);
        if ($post_request->httpcode == 201) {
            return $this->success("Post Cadastrado com sucesso!", json_decode($post_request->response));
        }
        return $this->error($post_request->response);
    }

    // SAVE AS COMMENT
    public function CommentSave(Request $request)
    {
        $post_data = [
            'user_name' => $request->get("user_name"),
            'user_email' => $request->get("user_email"),
            'content' => $request->get("content"),
        ];

        $curl = new CurlController();
        $url = $this->url."posts/".$request->get("post_id")."/comments";
        $post_request = $curl->post($url, $post_data, $this->headers);
        if ($post_request->httpcode == 201) {
            return $this->success("Comentário Cadastrado!", json_decode($post_request->response));
        }
        return $this->error($post_request->response);
    }

    // DELET AS COMMENT
    public function CommentDelete(int $id)
    {
        $curl = new CurlController();
        $post_request = $curl->delete($this->url."comments/".$id, $this->headers);
        if ($post_request->httpcode == 204) {
            return $this->success("Comentário Deletado!", json_decode($post_request->response));
        }
        return $this->error($post_request->response);

    }
}
