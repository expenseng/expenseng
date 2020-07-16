<template>
    <div>
        <p class="green-text">{{ username.name }}</p>
    </div>
</template>

<script>
import CommentService from '../../Service/CommentService'
export default {
    name: 'Username',
    data() {
        return {
            commentService: new CommentService,
            username: '',
        }
    },

    mounted() {
        this.commentService.getUsername(this.ownerId)
            .then(response => {
                this.username = response;
            })
    },

    props:{
        ownerId:{
            type: String,
            required: true
        }
    }
}
</script>