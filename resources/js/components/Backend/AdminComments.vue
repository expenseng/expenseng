<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0" style="float:left">All Comments </h3>
                                <a href="" class="btn btn-primary" style="float:right">ADD NEW</a>
                                <p></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Origin</th>
                                                <th>OwnerId</th>
                                                <th>RefId</th>
                                                <th>Content</th>
                                                <th>Replies</th>
                                                <th>Votes</th>
                                                <th class="col-md-1 text-center">Action</th>
                                            </tr>
                                        </thead>   
                                        <tbody>
                                            <tr v-for ="comment in comments">
                                                <td>{{comment.createdAt}}</td>
                                                <td>{{cleanOrigin(comment.origin)}}</td>
                                                <td>{{comment.ownerId}}</td>
                                                <td>{{comment.refId}}</td>
                                                <td>{{comment.content}}</td>
                                                <td>{{comment.numOfReplies}}</td>
                                                <td>{{comment.numOfVotes}}</td>
                                                <td class="td-lg">
                                                    <a :href="{{comment.commentID}}" class="smallbtn btn" title="edit"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="smallbtn btn" title="replies" v-b-modal.modal-scrollable v-on:click="viewReplies"><i class=" fa fa-reply"></i></a>
                                                    <a href="#" class="smallbtn btn" title="delete"><i class="text-danger fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    


                    <div>
                        <b-button v-b-modal.modal-scrollable>Launch scrolling modal</b-button>

                        <b-modal id="modal-scrollable" scrollable title="Scrollable Content">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0" style="float:left"> </h3>
                                        <a href="{{route('logout')}}" class="btn btn-primary" style="float:right">ADD NEW</a>
                                        <p></p>
                                    </div>
                                    <div class="card-body">
                                         <replies :commentId="comment.commentId" :replyCount="comment.numOfReplies"></replies>
                                    </div>
                                </div>
                            </div>
                        </b-modal>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Comment from '../../Service/CommentService';
import Replies from '../Comment/Replies'

    export default {
       
        data() {
            return {
                comment: new Comment(),
                text: '',
                busy: true,
                comments: [],
                replies: [],
                origin: document.location.pathname, //we are using this as the origin/resourcename
            }
        },

        components:{
            Replies,
    },


        mounted() {

            this.comment.getAllComments()
                    .then(response => {
                        this.busy = false;
                        this.comments = response.records;
                    })

            // return axios.get('/api/comments', {       
            // })
            // .then(response => {
            //     this.busy = false;
            //     this.comments = response.data.records;
            //     console.log(response.data.records);
            // }).catch(err => {
            //     console.log(err);
            // })

        },

         computed: {
            
        },

        methods:{
            cleanOrigin: function(value){
                return unescape(value)
            },
            deleteComment: function(value){
                return unescape(value)
            },

            viewReplies: function(commentId){
                this.comment.fetchReplies(commentId)
                    .then(response => {
                        this.busy = false;
                        this.replies = response.records;
                    })
            },
        }
    }

    
</script>

<style>
    .smallbtn{
        padding: 1px 5px;
    }
</style>
