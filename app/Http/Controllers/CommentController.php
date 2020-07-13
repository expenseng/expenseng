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
    private $baseUri = "https://comment.microapi.dev/v1/";

    public function __construct()
    {
        $this->token = env("COMMENTS_TOKEN");
        
        $this->http = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'Authorization' => 'Bearer ' .$this->token,
            ]
        ]);        
    }

    /**
     * Creats org => POST: /organizations
     */
    public function createOrg(){
        
    }

    /**
     * Send POST to /applications
    */
    public function createToken(){
        $response = $this->http->post('/applications', [
            "organizationEmail" => env("COMMENT_ORG_EMAIL", $this->org->email),
            "password" => env("COMMENT_PASSWORD", $this->org->password),
            "organizationId" => env("COMMENT_ORG_ID", $this->org->id),
        ]);
        
        //Assuming all goes well!
        $response = json_encode($response->getBody());
        $this->token = $response['data']['organizationToken'];
    }

    /**
     * POST request to /comments
     */
    public function store(Request $request){
        $response = $this->http->post('/comments', [
            "refId" => rand(),
            "ownerId" => $request->email,
            "content" => "😉" . $request->body,
            "origin" => $request->origin, //this will be a combination of page name "expense" + model id
        ]);

        $response = json_encode($response->getBody());

        if($response['status'] == "success"){
            return true;
        }
    }

    public function show(Request $request){
        $response = $this->http->get('/comments', [
            'query' => [
                'origin' => $request->origin
            ]
        ]);
    }
}
