<template>
    <div class="container mb-4 mt-4" v-if="this.replyCount > 0">
        <a href="#" @click.prevent="fetchReplies()">
            {{!this.showReply ? "Display" : "Hide"}} {{this.replyCount}} 
            {{ this.replyCount > 1 ? " replies" : " reply" }} to this comment
        </a>
        <div class="d-flex align-items-center" v-if="busy">
            <strong>Loading...</strong>
            <div class="spinner-border spinner-border-sm ml-auto" role="status" aria-hidden="true"></div>
        </div>
        <div v-if="showReply">
            <div class="container p-2" v-for="reply in replies" :key="reply.replyId">
                <div class="container" v-if="reply.numOfFlags < 1">
                    <div class="row container occupy">
                        <div class="col-sm-1 mt-1 row d-flex container">
                            <user-image :isSmall="true" :ownerId="reply.ownerId"></user-image>
                        </div>
                        <div class="col-sm-11 ">
                            <div class="d-flex justify-content-between ">
                                <div class="d-flex no-show">
                                    <username :object="reply"></username>
                                    <p class="ml-3 grey-text small mt-1">{{ reply.createdAt | ago }}</p>
                                </div>
                                <div class="dropdown">
                                    <i class="fas fa-ellipsis-h grey-text dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" v-if="comment.isMyComment(reply)" @click.prevent="edit(reply.commentId)">Edit</a>
                                        <a class="dropdown-item" href="#" v-if="comment.isMyComment(reply)" @click.prevent="doDelete('parent', reply.commentId)">Delete</a>
                                        <a class="dropdown-item" href="#" v-if="reply.numOfFlags < 1" @click.prevent="flag(reply.commentId)">Flag</a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>{{ reply.content }}</p>
                            </div>
                            <reactions :data="reply" :hideReply="true"></reactions>
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
        fetchReplies(commentId = null){

            this.showReply = !this.showReply;

            /**
             * Since this can be toggeled, we want to only make 
             * a request when the reply has not been fetched
             * EDIT: We want to make the request when the replyCount 
             * is higher than the replies length because we will be 
             * mutating replyCount although Vue.js doesn't like it 👅
             */
            if(this.replies.length < this.replyCount){
                this.busy = true;
                
                this.comment.fetchReplies( commentId ?? this.commentId )
                .then(response => {
                    this.busy = false;
                    this.replies = response.records;
                })
            }

        }
    },

    mounted() {
        /**
         * Start listening for new replies
         */
        window.Echo.channel('expense-comment')
                    .listen('NewReplyOnComment', (e) => {
                        if(e.data.commentId == this.commentId){
                            this.replies.push(e.data);
                            this.replyCount += 1;
                            this.showReply = true;
                        }
                    });
        
    },

    filters:{
        ago(value){
            return moment(value).fromNow();
        }
    }
}
</script>