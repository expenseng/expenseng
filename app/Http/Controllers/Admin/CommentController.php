<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;
use App\Citizen;
use App\Events\NewCommentOnResource;
use App\Events\NewReactionOnComment;
use App\Events\NewReplyOnComment;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\toArray;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    

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


    public function index(Request $request)
    {

       return view('backend.comments.indexvue');
        
    }


    public function getAllComments(Request $request){
        $origin = urlencode($request->origin);
        $response = $this->http->get('comments', [
            'query' => [
                // 'limit'  => 2,
                // 'page' => 2
                //'sort' => 'ascending',
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


    public function deleteComment(Request $request, $commentId){
        $response = $this->http->delete('comments/' . $commentId , [
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if($data['status'] == "success"){
            return $data['data'];
        }else{
            Log::error('Error while deleting comment - '.$commentId);
            return false;
        }
    }


    // Delete a Reply
    public function deleteReply(Request $request, $commentId, $replyId){
        $response = $this->http->delete('comments/' . $commentId  . '/replies/' . $replyId,[
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if($data['status'] == "success"){
            return $data['data'];
        }else{
            Log::error('Error while deleting reply - '.$commentId);
            return false;
        }
    }


// Flag a Comment
    public function flagComment(Request $request, $commentId){
        $response = $this->http->patch('comments/' . $commentId . '/flag', [
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if($data['status'] == "success"){
            return $data['data'];
        }else{
            Log::error('Error while flagging comment-'.$commentId);
            return false;
        }
    }



     public function updateComment(Request $request, $commentId){
        $response = $this->http->patch('comments/' . $commentId, [
            "body" => json_encode([
                "ownerId" => $request->ownerId,
                "content" => $request->content,
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if($data['status'] == "success"){
            return $data['data'];
        }else{
            Log::error('Error while flagging comment-'.$commentId);
            return false;
        }
    }



    public function flagReply(Request $request, $commentId, $replyId){
        $response = $this->http->patch('comments/' . $commentId  . '/replies/' . $replyId . '/flag', [
            "body" => json_encode([
                "ownerId" => $request->ownerId
            ])
        ]);

        $data = json_decode($response->getBody(), true);

        if($data['status'] == "success"){
            return $data['data'];
        }else{
            Log::error('Error while flagging comment-'.$commentId);
            return false;
        }
    }


}

