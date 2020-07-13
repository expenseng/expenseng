<template>
    <div>
        <div class="container p-2" v-for="reply in replies" :key="reply.commentId">
            <div class="container">
                <div class="row container occupy">
                    <div class="col-sm-1 mt-1 row d-flex container">
                        <img :src="comment.getAvatar(reply.ownerId)" class="resize" alt="profile-image">
                    </div>
                    <div class="col-sm-11 ">
                        <div class="d-flex justify-content-between ">
                            <div class="d-flex no-show">
                                <p class="green-text">{{ comment.getUsername(reply.ownerId) }}</p>
                                <p class="ml-3 grey-text small mt-1">{{ "2 min ago" }}</p>
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
</template>

<script>
import CommentService from '../../Service/CommentService';
import Reactions from './Reactions';
export default {
    data() {
        return {
            comment: new CommentService(),
        }
    },

    components:{
        Reactions
    },

    props:{
        replies:{
            required: true,
            type: Array
        }
    },

    methods: {
        
    },
}
</script>