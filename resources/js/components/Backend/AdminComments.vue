<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" style="float:left"> Comments </h5>
                                <!-- <a href="" class="btn btn-primary" style="float:right">ADD NEW</a> -->
                                <p></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" >Date</th>
                                                <th scope="col" >Origin</th>
                                                <th scope="col" >OwnerId</th>
                                                <th scope="col" >RefId</th>
                                                <th scope="col" >Content</th>
                                                <th scope="col" >Replies</th>
                                                <th scope="col">Votes</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>   
                                        <tbody>
                                            <tr v-for ="(comment, index) in comments">
                                                <td>{{comment.createdAt | ago}}</td>
                                                <td>{{cleanOrigin(comment.origin)}}</td>
                                                <td>{{comment.ownerId}}</td>
                                                <td>{{comment.refId}}</td>
                                                <td>{{comment.content}}</td>
                                                <td>{{comment.numOfReplies}}</td>
                                                <td>{{comment.numOfVotes}}</td>
                                                <td class="td-lg">
                                                    <a href="#" class="smallbtn btn" title="edit" data-toggle="modal" data-target=".update-comment-modal" v-on:click="getComment(comment.commentId)"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="smallbtn btn" title="replies" data-toggle="modal" data-target=".replies-modal" v-on:click="viewReplies(comment.commentId)"><i class=" fa fa-reply"></i></a>
                                                    <!-- <a href="#" class="smallbtn btn" title="delete" v-on:click="removeItem(index)"><i class="text-danger fa fa-trash"></i></a> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

            

                    <!-- Comment Replies Modal -->
                    <div class="modal fade replies-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="card">
                                    <div class="card-header">
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="container p-2" >
                                            <div class="container">
                                                <div class="row container occupy">
                                                    <table id="replies" class="table table-striped table-bordered second" style="width:100%">
                                                        <caption>Replies</caption>
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>avatar</th>
                                                                <th>author</th>
                                                                <th>created at</th>
                                                                <th>content</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="reply in replies" :key="reply.replyId">
                                                                <td><user-image :isSmall="true" :ownerId="reply.ownerId"></user-image></td>
                                                                <td><p>{{reply.ownerId}} </p></td>
                                                                <td><p class="ml-3 grey-text small mt-1">{{ reply.createdAt | ago }}</p></td>
                                                                <td><p>{{ reply.content }}</p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div> 
                                        </div>  
                                    </div>
                                </div>
                        </div>
                      </div>
                    </div>


                    <!-- Comment Update Modal -->
                    <div class="modal fade update-comment-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <div class="mx-auto"><user-image :isSmall="true" :ownerId="singleComment.ownerId"></user-image></div> -->
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-header">
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="container p-2" >
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <form class="form">
                                                    <div class="col-form-group">
                                                        <label for="formGroupExampleInput">Content</label>
                                                        <textarea class="form-control" rows="3">{{singleComment.content}} </textarea>
                                                    </div>
                                                         
                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput">Owner</label>
                                                        <input type="text" class="form-control" rows="3" v-model="singleComment.ownerId">
                                                     </div>
                                                     <div class="form-group">
                                                        <label for="formGroupExampleInput">Origin</label>
                                                        <input type="text" class="form-control" rows="3" v-model="singleComment.origin">
                                                     </div>

                                                     <div class="form-group">
                                                        <label for="formGroupExampleInput">RefId</label>
                                                        <input type="text" class="form-control" rows="3" v-model="singleComment.refId">
                                                     </div>         
                                                </form>
                                            </div> 
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger" v-on:click="deleteComment(singleComment.commentId, singleComment.ownerId)">Delete</button>
                                 <!-- <a href="#" class="smallbtn btn" title="delete" v-on:click="deleteComment(singleComment.commentId, singleComment.ownerId)"><i class="text-danger fa fa-trash"></i></a> -->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                    </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Comment from '../../Service/CommentService';
import Replies from '../Comment/Replies'
import UserImage from '../Comment/UserImage';
import Username from '../Comment/Username';


    export default {
       
        data() {
            return {
                comment: new Comment(),
                text: '',
                busy: true,
                comments: [],
                singleComment: [],
                replies: [],
                index: '',
                origin: document.location.pathname, //we are using this as the origin/resourcename
                replies: [],
            }
        },

        components:{
            Replies,
            Username,
            UserImage
    },


        mounted() {

            this.comment.getAllComments()
                    .then(response => {
                        this.busy = false;
                        this.comments = response.records;
                    })

        },

         computed: {
            
        },

        methods:{
            cleanOrigin: function(value){
                return unescape(value)
            },

            viewReplies: function(commentId){
               this.comment.fetchReplies( commentId ?? this.commentId )
                .then(response => {
                    this.busy = false;
                    this.replies = response.records;
                    console.log(commentId);
                })
            },

            deleteComment: function(commentId, ownerId) {
                this.comment.deleteComment(commentId, ownerId)
                .then(response => {
                    this.busy = false;
                    // console.log(response);
                    this.removeItem(this.index);
                });

            },

            getComment: function(commentId){
                for(let i in this.comments){
                    if(this.comments[i].commentId == commentId){
                        this.index = i;
                        return this.singleComment = this.comments[i];
                    }
                }
            },

            removeItem: function(key) {
                 Vue.delete(this.comments, key);
            }

        },

        filters:{
        ago(value){
            return moment(value).fromNow();
        }
    }
    }

    
</script>

<style>
    .smallbtn{
        padding: 1px 5px;
    }

    .resize{
    border-radius: 50%;
    width: 50px;
}


</style>
