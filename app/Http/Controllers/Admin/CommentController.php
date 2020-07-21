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
        // //
        //  $origin = urlencode($request->origin);
        // $response = $this->http->get('comments', [
        //     'query' => [
                
        //     ]
        // ]);

        // $data = json_decode($response->getBody(), true);
        // $comments = $data['data']['records'];
        // $pageInfo = $data['data']['pageInfo'];


        //  if (Gate::denies('manage-user')) {
        //     return redirect(route('ministry.view'));
        // }
        
       //dump($comments[1]['origin']);
       return view('backend.comments.indexvue');
        
    }


    public function getAllComments(Request $request){
        $origin = urlencode($request->origin);
        $response = $this->http->get('comments', [
            'query' => [
                // 'limit'  => 2,
                // 'page' => 2
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
            // broadcast the new thumbs down
            //event(new NewReactionOnComment($data));
            return $data['data'];
        }else{
            Log::error('Error while posting downvote to '.$commentId);
            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

