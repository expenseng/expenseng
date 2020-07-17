<template>
    <div>
        <div class="d-flex text-center align-content-center  icons justify-content-start">
            <span class="d-flex mr-3 reaction" @click="upvote"><i class="far fa-thumbs-up"></i><p class="small mt-1">{{ data.numOfUpVotes }}</p></span>
            <span class="d-flex mr-3 reaction" @click="downvote"><i class="far fa-thumbs-down"></i> <p class="small mt-1">{{ data.numOfDownVotes }}</p></span>
            <span class="d-flex mr-3 reaction" v-if="!hideReply" @click="reply = true"><i class="far fa-comment"></i>
                <p class="small mt-1"> {{ data.numOfReplies > 0 ? "Replies " + data.numOfReplies : "Reply" }} </p>
            </span>
        </div>
        <comment :isContained="false" :isReply="true" :commentId="data.commentId" v-if="reply" class="w-100 pt-3"></comment>
    </div>
</template>

<script>
import CommentService from '../../Service/CommentService';
import Comment from '../Comment/Comment';
export default {
    components:{
        Comment
    },

    data() {
        return {
            comment: new CommentService(),
            reply: false,
        }
    },

    props:{
        data:{
            required: true,
            type: Object
        },

        hideReply:{
            required: false,
            default: false,
            type: Boolean
        }
    },

    methods: {
        upvote(){
            this.comment.upvote(this.data.commentId, this.data.ownerId)
                    .then(res => {
                        // this.data.numOfUpVotes += 1;
                        console.log(res);
                    })
        },

        downvote(){
            this.comment.upvote(this.data.commentId, this.data.ownerId)
                    .then(res => {
                        // this.data.numOfUpVotes += 1;
                        console.log(res);
                    })
        }
    },

    mounted() {
        /**
         * Start listening for new replies
         */
        window.Echo.channel('expense-reaction')
                    .listen('NewReactionOnComment', (e) => {
                        if(e.data.commentId == this.data.commentId){
                            // console.log(e.data);
                            this.data.numOfUpVotes = e.data.numOfUpVotes;
                            this.data.numOfDownVotes = e.data.numOfDownVotes;
                        }
                    });
    },
}
</script>

<style scoped>
    .reaction{
        cursor: pointer;
    }
</style>