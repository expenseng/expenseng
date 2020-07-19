<template>
    <div>
        <div class="text-center" v-if="busy">
            <div class="spinner-grow spinner-grow-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <img :src="this.image" class="resize" :class="isSmall ? 'h-50' : ''" alt="profile-image">
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
                this.busy = false;
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
        },
        isSmall:{
            required: false,
            type: Boolean
        }
    }
}
</script>

<style lang="css" scoped>
    .spinner-grow{
        background-color: green !important;
    }
</style>