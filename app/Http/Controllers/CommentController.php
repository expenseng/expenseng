<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Carbon\Carbon;
use GuzzleHttp\Client;

class CommentController extends Controller
{
    protected $token;
    protected $http;
    protected $org;

    public function __construct()
    {
        $this->http = new Client([
            'base_uri' => '',
            'headers' => [
                'Authorization' => 'Bearer token ' .$this->token,
            ]
        ]);
        
        $this->org = Comment::first(); //our table should contain only one org?
        /**
         * Every instance we check if we have a valid API token
         */
        $token = Comment::where('adminEmail', env("COMMENT_EMAIL"))
                            ->where('adminPassword', env("COMMENT_PASSWORD"));

        if (!$token->exists() || $token->pluck('token')[0]->created_at) {
            /**
             * Token doesn't exist of has expired
             */
            $this->createToken();
        }else{
            $this->token = $token->pluck('token')[0];
        }
    }

    /**
     * Creats org => POST: /organizations
     */
    public function createOrg(){
        //
    }

    /**
     * Send POST to /organization/token
    */
    public function createToken(){
        $response = $this->http->post('/organizations/token', [
            "organizationEmail" => env("COMMENT_ORG_EMAIL", $this->org->email),
            "password" => env("COMMENT_PASSWORD", $this->org->password),
            "organizationId" => env("COMMENT_ORG_ID", $this->org->id),
        ]);
        
        //Assuming all goes well!
        $this->token = $response['data']['organizationToken'];
    }

    /**
     * POST request to /comments
     */
    public function store(){
        $response = $this->http->post('/comments', [

        ])
    }
}
