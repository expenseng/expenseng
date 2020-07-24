<template>

            <div class="row">

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
                                            <th scope="col">Flags</th>
                                            <th scope="col" class="text-center" style="width:13%">Actions</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        <tr v-for ="(comment, index) in comments" >
                                            <td>{{comment.createdAt}}</td>
                                            <td>{{cleanOrigin(comment.origin)}}</td>
                                            <td>{{comment.ownerId}}</td>
                                            <td>{{comment.refId}}</td>
                                            <td>{{comment.content}}</td>
                                            <td>{{comment.numOfReplies}}</td>
                                            <td>{{comment.numOfVotes}}</td>
                                            <td>{{comment.numOfFlags}}</td>
                                            <td class="td-lg">
                                                <a href="#" class="smallbtn " title="edit" data-toggle="modal" data-target=".update-comment-modal" v-on:click="getSingleComment(comment.commentId)"><i class="text-dark fa fa-edit"></i></a>
                                                <a href="#" class="smallbtn " title="replies" data-toggle="modal" data-target=".replies-modal" v-on:click="viewReplies(comment.commentId, index)"><i class=" text-info fa fa-comment"></i></a>
                                                <a href="" class="smallbtn " title="flag" v-on:click.prevent="flagComment(comment.commentId, comment.ownerId, index)"><i class="text-warning fa fa-flag"></i></a>
                                                <a href="" class="smallbtn " title="delete" v-on:click.prevent="deleteComment(comment.commentId, comment.ownerId, index)"><i class="text-danger fa fa-trash"></i></a>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>
        

                <!-- Comment Replies Modal -->
                <div class="modal fade replies-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content" >
                        <div class="card">
                                <div class="card-header">
                                    
                                </div>
                                <div class="card-body">
                                    <div class="container p-2" >
                                        <div class="container">
                                            <div class="row occupy">
                                                <table id="replies" class="table table-striped table-bordered second table-responsive{-sm|-md|-lg|-xl" style="width:100%">
                                                    <caption v-if="replies[0]" class="small">Replies for Comment {{ replies[0].commentId}}</caption>
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Author</th>
                                                            <th>Created</th>
                                                            <th>Content</th>
                                                            <th>Flags</th>
                                                            <th>Votes</th>
                                                            <th class="text-center" style="width:13%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(reply, index) in replies" :key="reply.replyId">
                                                            <td><p class="small">{{reply.ownerId}} </p></td>
                                                            <td><p class="ml-3 grey-text small mt-1">{{ reply.createdAt | ago }}</p></td>
                                                            <td><p class="small">{{ reply.content }}</p></td>
                                                            <td><p class="small">{{ reply.numOfFlags }}</p></td>
                                                             <td><p class="small">{{ reply.numOfVotes }}</p></td>
                                                            <td class="td-lg">
                                                                <a href="#" class="smallbtn " title="edit" v-on:click="getSingleComment(comment.commentId)"><i class="text-dark fa fa-edit"></i></a>
                                                                <a href="" class="smallbtn " title="delete" v-on:click.prevent="deleteReply(reply.commentId, reply.replyId, reply.ownerId, index)"><i class=" text-danger fa fa-trash"></i></a>
                                                                <a href="" class="smallbtn " title="flag" v-on:click.prevent="flagReply(reply.commentId, reply.replyId, reply.ownerId, index)"><i class="text-warning fa fa-flag"></i></a>
                                                                
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div> 
                                    </div>  
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
                </div>


                <!-- Comment Update Modal -->
                <div class="modal fade update-comment-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="mx-auto" v-if="singleComment[0]"><user-image :isSmall="true" :ownerId="singleComment.ownerId"></user-image></div>
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
                                                        <textarea v-model="singleComment.content" class="form-control" rows="3">{{singleComment.content}} </textarea>
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
                                <button type="button" class="btn btn-primary" v-on:click.prevent="updateComment(singleComment.commentId, singleComment.ownerId, singleComment.content)">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                    </div>
                </div>

            </div>

</template>

<script>
import Comment from '../../Service/AdminCommentService';
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
                // index: '',
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
                    });
        },

         computed: {
            
        },

        methods:{
            cleanOrigin: function(value){
                return unescape(value)
            },

            viewReplies: function(commentId, index){
               this.comment.fetchReplies( commentId ?? this.commentId )
                .then(response => {
                    this.busy = false;
                    this.replies = response.records;
                    // this.index = index;
                })
            },

             deleteComment: function(commentId, ownerId, index) {
                this.$swal({
                    title: "Delete this comment?",
                    text: "Are you sure? You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Delete"
                }).then((result) => { 
                    if (result.value) {
                        //this.removeComment(commentId, ownerId, index);
                        this.comment.deleteComment(commentId, ownerId)
                        .then(response => {
                            this.busy = false;
                            this.$swal('Success', response.message, 'OK');
                            Vue.delete(this.comments, index);
                        });
                    }
                });

            },

            flagComment: function(commentId, ownerId, index) {
                this.comment.flagComment(commentId, ownerId)
                .then(response => {
                    this.busy = false;
                    this.$swal('Success', response.message, 'OK');
                    this.comments[index].numOfFlags = response.data.numOfFlags;
                });

            },

            updateComment: function(commentId, ownerId, content) {
                this.comment.updateComment(commentId, ownerId, content)
                .then(response => {
                    this.busy = false;
                    this.$swal('Success', response.message, 'OK');
                });

            },

            getSingleComment: function(commentId){
                for(let i in this.comments){
                    if(this.comments[i].commentId == commentId){
                        return this.singleComment = this.comments[i];
                    }
                }
            },

            
            deleteReply: function(commentId, replyId, ownerId, index) {
                this.comment.deleteReply(commentId, replyId, ownerId)
                .then(response => {
                    this.busy = false;
                    this.$swal('Success', response.message, 'OK');
                    this.removeReply(index);
                    this.comments[this.index].numOfReplies = this.comments[this.index].numOfReplies-1;
                    
                });

            },

            
            flagReply: function(commentId, replyId, ownerId, index) {
                this.comment.flagReply(commentId, replyId, ownerId)
                .then(response => {
                    this.busy = false;
                    this.$swal('Success', response.message, 'OK');
                    this.replies[index].numOfFlags = response.data.numOfFlags;
                });

            },


            removeReply: function(key) {
                 Vue.delete(this.replies, key);
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
