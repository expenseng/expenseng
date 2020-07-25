<template>
    <div>
        <div class="d-flex text-center align-content-center  icons justify-content-start">
            <span class="d-flex mr-3 reaction" title="Upvote this comment" @click="upvote"><i class="far fa-thumbs-up"></i><p class="small mt-1">{{ data.numOfUpVotes }}</p></span>
            <span class="d-flex mr-3 reaction" title="Downvote this comment" @click="downvote"><i class="far fa-thumbs-down"></i> <p class="small mt-1">{{ data.numOfDownVotes }}</p></span>
            <span class="d-flex mr-3 reaction" title="Flag this comment" v-if="data.numOfFlags < 1" @click="flag"><i class="far fa-flag"></i><p class="small mt-1">{{ data.numOfFlags }}</p></span>
            <span class="d-flex mr-3 reaction" title="Reply to this comment" v-if="!hideReply" @click="reply = !reply"><i class="far fa-comment"></i>
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
            didUpvote: false,
            didDownvote: false,
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
            this.didUpvote = !this.didUpvote;

            this.data.numOfUpVotes = this.didUpvote ? this.data.numOfUpVotes+1 : this.data.numOfUpVotes-1;

            this.comment.upvote(this.data.commentId, this.data.ownerId)
                    .then(res => {
                        console.log(res);
                    })
        },

        downvote(){
            this.didDownvote = !this.didDownvote;

            this.data.numOfDownVotes = this.didDownvote ? this.data.numOfDownVotes+1 : this.data.numOfDownVotes-1;

            this.comment.downvote(this.data.commentId, this.data.ownerId)
                    .then(res => {
                        console.log(res);
                    })
        },

        flag(){
            this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    
                }
            })
        }
    },

    mounted() {
        /**
         * Start listening for new reactions
         */
        window.Echo.channel('expense-reaction')
                    .listen('NewReactionOnComment', (e) => {
                        if(e.data.commentId == this.data.commentId){
                            console.log(e.data);
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