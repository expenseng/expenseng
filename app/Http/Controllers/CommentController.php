<?php
namespace App\Http\Controllers;

use App\Comment;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;
use App\Citizen;
use App\Events\NewCommentOnResource;
use App\Events\NewReactionOnComment;
use App\Events\NewReplyOnComment;
use Illuminate\Support\Facades\Log;
use function GuzzleHttp\json_decode;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $token;
    private $http;
    private $org;
    private $baseUri = "https://comment.microapi.dev/v1/";

    public function __construct()
    {
        $this->token = \env("COMMENTS_TOKEN");
        $this->baseUri = "https://comment.microapi.dev/v1/";

        if (!$this->token) {
            $this->token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBsaWNhdGlvbklkIjoiNWYxMmI4NDI2MzVmM2UwMDE0MmJjOWE2IiwiYWRtaW5JZCI6IjVmMTJiN2UyNjM1ZjNlMDAxNDJiYzlhNSIsImlhdCI6MTU5NTA2MjMzOSwiZXhwIjoxNTk3NjU0MzM5fQ.B6o9MmBZ8GMUFsSnrlrOlq4NlDu7gTrtT17MXGKXS7c";
        }

        $this->http = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'Authorization' => 'Bearer ' .$this->token,
                'debug' => true,
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    /**
     * Creats org => POST: /organizations
     */
    public function createOrg()
    {
    }

    /**
     * Send POST to /applications
    */
    public function createToken()
    {
        $response = $this->http->post('/applications', [
            "organizationEmail" => env("COMMENT_ORG_EMAIL", $this->org->email),
            "password" => env("COMMENT_PASSWORD", $this->org->password),
            "organizationId" => env("COMMENT_ORG_ID", $this->org->id),
        ]);

        //Assuming all goes well!
        $response = json_encode($response->getBody());
        $this->token = $response['data']['organizationToken'];
    }


    public function store(Request $request)
    {
        
        $response = $this->http->post('comments', [
            "body" => json_encode([
                "refId" => $request->refId, //username
                "ownerId" => $request->ownerId, //email
                "content" => $request->content,
                "origin" => urlencode($request->origin), //this will be the url of the page where comment happened
            ])
        ]);

        $response = json_decode($response->getBody(), true);

        if ($response['status'] == "success") {
            //broadcast the new comment to everyone else except the current user
            broadcast(new NewCommentOnResource($response))->toOthers();

            return $response['data'];
        } else {
            Log::error("Error from creating a comment" . $response);
            return false;
        }
    }

    public function show(Request $request)
    {
        $origin = urlencode($request->origin);
        $response = $this->http->get('comments', [
            'query' => [
                'origin' => $origin,
                'isFlagged' => 'false',
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if ($data['status'] == "success") {
            return $data['data'];
        } else {
            Log::error("Error from fetching comments" . $data);
            return false;
        }
    }

    public function replies($commentId)
    {
        $response = $this->http->get('comments/' . $commentId . '/replies');

        $data = json_decode($response->getBody(), true);

        if ($data['status'] == "success") {
            return $data['data'];
        } else {
            Log::error('Error while fetching replies to '.$commentId);
            return false;
        }
    }

    public function reply(Request $request)
    {
        $response = $this->http->post('comments/' . $request->commentId . '/replies', [
            "body" => json_encode([
                "ownerId" => $request->email,
                "content" => $request->content,
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if ($data['status'] == "success") {
            //broadcast the new reply
            event(new NewReplyOnComment($data));
            return $data['data'];
        } else {
            Log::error('Error while posting replies to '.$request->commentId);
            return false;
        }
    }

    public function upvote(Request $request, $commentId)
    {
        $response = $this->http->patch('comments/' . $commentId . '/votes/upvote', [
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if ($data['status'] == "success") {
            // broadcast the new thumbs up
            event(new NewReactionOnComment($data));
            return $data['data'];
        } else {
            Log::error('Error while posting upvote to '.$commentId);
            return false;
        }
    }

    public function downvote(Request $request, $commentId)
    {
        $response = $this->http->patch('comments/' . $commentId . '/votes/downvote', [
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if ($data['status'] == "success") {
            // broadcast the new thumbs down
            event(new NewReactionOnComment($data));
            return $data['data'];
        } else {
            Log::error('Error while posting downvote to '.$commentId);
            return false;
        }
    }

    public function deleteComment(Request $request, $commentId){
        $response = $this->http->delete('comments/' . $commentId, [
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if($data['status'] == "success"){
            return $data['data'];
        }
    }

    public function deleteReply(Request $request, $commentId, $replyId){
        $response = $this->http->delete('comments/' . $commentId . '/replies/' . $replyId, [
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if($data['status'] == "success"){
            return $data['data'];
        }
    }

    /**
     * Stores a new user in the citizens table
     * so we can retrieve their info next time
     */
    public function onboardUser(Request $request)
    {
        Cookie::queue("commentator", "true");

        $user = Citizen::firstOrcreate([
            "name" => $request->name,
            "email" => $request->email,
        ]);

        $user['md5Hash'] = md5(strtolower(trim($user['email'])));

        return $user;
    }

    public function fetchUser($email)
    {
        $user = Citizen::where('email', $email)->first('name');
        return $user;
    }

    public function avatar(Request $request)
    {
        /**
         * Since a first time user must have been
         * stored in the DB, we will check if the user
         * exists and fetch their email
         */
        $user = Citizen::firstOrNew([ "email" => $request->email ]);
        $email = $user->email;
        return md5(strtolower(trim($email)));
    }

    public function flagComment(Request $request, $commentId){
        $response = $this->http->patch('/comments/' . $commentId . '/flag', [
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response);

        if($data['status'] == "success"){
            return $data['data'];
        }
    }

    public function flagReply(Request $request, $commentId, $replyId){
        $response = $this->http->patch('/comments/' . $commentId . '/replies' . $replyId . '/flag', [
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response);

        if($data['status'] == "success"){
            return $data['data'];
        }
    }
}
