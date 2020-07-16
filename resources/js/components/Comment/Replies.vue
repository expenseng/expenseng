<template>
    <div>
        <a href="#" @click.prevent="fetchReplies()">{{!this.showReply ? "Display" : "Hide"}} {{this.replyCount}} {{ this.replyCount > 1 ? " replies" : " reply" }} to this comment</a>
        <div class="d-flex align-items-center" v-if="busy">
            <strong>Loading...</strong>
            <div class="spinner-border spinner-border-sm ml-auto" role="status" aria-hidden="true"></div>
        </div>
        <div v-if="showReply">
            <div class="container p-2" v-for="reply in replies" :key="reply.replyId">
                <div class="container">
                    <div class="row container occupy">
                        <div class="col-sm-1 mt-1 row d-flex container">
                            <user-image :isSmall="true" :ownerId="reply.ownerId"></user-image>
                        </div>
                        <div class="col-sm-11 ">
                            <div class="d-flex justify-content-between ">
                                <div class="d-flex no-show">
                                    <username :ownerId="reply.ownerId"></username>
                                    <p class="ml-3 grey-text small mt-1">{{ reply.createdAt | ago }}</p>
                                </div>
                                <i class="fas fa-ellipsis-h grey-text no-show"></i>
                            </div>
                            <div>
                                <p>{{ reply.content }}</p>
                            </div>
                            <reactions :data="reply"></reactions>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</template>

<script>
import CommentService from '../../Service/CommentService';
import Reactions from './Reactions';
import moment from 'moment';
import UserImage from './UserImage';
import Username from './Username';

export default {
    data() {
        return {
            comment: new CommentService(),
            replies: [],
            showReply: false,
            busy: false,
        }
    },

    components:{
        Reactions,
        Username,
        UserImage
    },

    props:{
        commentId:{
            required: true,
            type: String
        },
        replyCount:{
            required: true,
            type: Number
        }
    },

    methods: {
        fetchReplies(){

            this.showReply = !this.showReply;

            /**
             * Since this can be toggeled, we want to only make 
             * a request when the reply has not been fetched
             */
            if(this.replies.length == 0){
                this.busy = true;
                
                this.comment.fetchReplies(this.commentId)
                .then(response => {
                    this.busy = false;
                    this.replies = response.records;
                })
            }

        }
    },

    filters:{
        ago(value){
            return moment(value).fromNow();
        }
    }
}
</script>