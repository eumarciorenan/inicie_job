<?php

/*===========================================
=            Author: Márcio Renan           =
=            Company: INICIE                =
=            API: GoRest                    =
=            DOC: https://gorest.co.in/     =
=            Copyright (c) 2022             =
===========================================*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = [
        'api_id',
        'post_id',
        'user_id',
        'user_name',
        'user_email',
        'content',
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
