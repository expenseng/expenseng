<template>
    <div>
        <img :src="this.image" class="resize" alt="profile-image">
    </div>
</template>

<script>
import CommentService from '../../Service/CommentService';
export default {
    data() {
        return {
            busy: true,
            image: null,
            commentService: new CommentService()
        }
    },

    mounted() {
        const image = this.commentService.getAvatar(this.ownerId);
        if(typeof image == "object"){
            image.then(response => {
                this.image = response;
            })   
        }else{
            this.image = image;
        }
         
    },

    props:{
        ownerId: {
            required: true,
            type: String
        }
    }
}
</script>