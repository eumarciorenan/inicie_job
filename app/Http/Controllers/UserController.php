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
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index()
    {
        $comments = User::all();
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
                'email' => 'required',
                'gender' => 'required',
            ], $mensagens);

            $in = new ApiController();
            $api_save = $in->UserSave($request);
            if (!$api_save->success){
                new Exception("Erro ao salvar: " . $api_save->error, 400);
            }
            $user = new User();
            $user->name = $request->get("name");
            $user->email = $request->get("email");
            $user->gender = $request->get("gender");
            $user->status = "active";
            $user->api_id = $request->get("api_id");
            $user->save();
            return $user;
            return $this->success("Usuário registrado com sucesso!", $user, 201);

        } catch (\Illuminate\Validation\ValidationException $th) {

            $error = $th->errors();
            return $this->error($error, 400);

        }
    }

    public function Syncronize()
    {
        try {
            $in = new ApiController();
            $emails = [];
            $users = json_decode($in->UserIndex(), true);

            if (count($users) > 0) {
                foreach ($users as $user) {
                    $User = User::where('email', $user['email'])->first();
                    if ($User == null) {
                        array_push($emails, $user['email']);
                        $user['api_id'] = $user["id"];
                        unset($user["id"]);
                        $this->save(new Request($user));
                    }
                }
            }
            return  $this->success("Dados sincronizados!", $emails, 201);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400);
        }
    }

    public function Show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function ShowId($id)
    {
        $user = User::where("api_id", $id)->first();
        return response()->json($user);
    }



}
