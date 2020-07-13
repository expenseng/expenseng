<template>
    <div class="d-flex text-center align-content-center  icons justify-content-start">
        <span class="d-flex mr-3"><i class="far fa-thumbs-up"></i><p class="small mt-1">{{ data.numOfUpVotes }}</p></span>
        <span class="d-flex mr-3"><i class="far fa-thumbs-down"></i> <p class="small mt-1">{{ data.numOfDownVotes }}</p></span>
        <span class="d-flex mr-3" style="cursor:pointer" @click="comment.reply(data.commentId)"><i class="far fa-comment"></i>
            <p class="small mt-1"> {{ data.numOfReplies > 0 ? "Replies " + data.numOfReplies : "Reply" }} </p>
        </span>
    </div>
</template>

<script>
import CommentService from '../../Service/CommentService';
export default {
    data() {
        return {
            comment: new CommentService()
        }
    },

    props:{
        data:{
            required: true,
            type: Object
        }
    }
}
</script>