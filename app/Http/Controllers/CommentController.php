<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

use function GuzzleHttp\json_decode;

class CommentController extends Controller
{
    protected $token;
    protected $http;
    protected $org;
    private $baseUri = "https://comment.microapi.dev/v1/";

    public function __construct()
    {
        $this->token = env("COMMENTS_TOKEN");
        $this->baseUri = "https://comment.microapi.dev/v1/";

        $this->http = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
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


    public function store(Request $request){
        $response = $this->http->post('comments', [
            "body" => json_encode([
                "refId" => $request->userId, 
                "ownerId" => $request->ownerId, //email
                "content" => "😉" . $request->content,
                "origin" => $request->origin, //this will be the url of the page where comment happened
            ])
        ]);

        $response = json_decode($response->getBody(), true);

        if($response['status'] == "success"){
            return $response['data'];
        }else{
            Log::error("Error from creating a comment" . $response);
            return false;
        }

    }

    public function show(Request $request){
        $response = $this->http->get('comments', [
            'query' => [
                'origin' => $request->query('origin')
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if($data['status'] == "success"){
            return $data['data'];
        }else{
            Log::error("Error from fetching comments" . $data);
            return false;
        }
    }

    public function replies(Request $request){
        $response = $this->http->get('comments/' . $request->commentId . '/replies');

        $data = json_decode($response->getBody(), true);

        if($data['status'] == "success"){
            return $data['data'];
        }else{
            Log::error('Error while fetching replies to '.$request->commentId);
            return false;
        }
    }
}
