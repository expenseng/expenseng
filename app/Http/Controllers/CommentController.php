<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class CommentController extends Controller
{
    public function __construct()
    {
        /**
         * Every instance we check if we have a valid API token
         */
        $token = Comment::where('adminEmail', env("COMMENT_EMAIL"))
                            ->where('adminPassword', env("COMMENT_PASSWORD"));

        if(!$token->exists() || $token->pluck('token')[0]->created_at){
            /**
             * Token doesn't exist of has expired
             */
        }
    }
}
