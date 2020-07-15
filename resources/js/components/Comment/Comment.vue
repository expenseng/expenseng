<template>
    <div :class="isContained ? 'container' : '' " class="w-75 d-flex flex-column align-content-center justify-content-center">
        <input placeholder="Name" ref="commentatorName" v-model="name" v-if="showName" required class="p-2 mb-2">
        <input placeholder="Email" v-model="email" v-if="showName" required class="p-2 mb-2">
        <textarea placeholder="Write a comment" v-model="comment" v-if="showName" required class="p-2 mb-2"></textarea>
        <input placeholder="Write a Comment" v-if="!hideSmallComment" v-model="comment" @keydown.enter="send" @focus="startComment" class="p-2">
        <button class="btn btn-primary" @click="send" v-if="showName">Comment</button>
    </div>
</template>

<script>
import Comment from '../../Service/CommentService';
export default {
    data() {
        return {
            showName: false,
            hideSmallComment: false,
            comment: "",
            email: "",
            name: "",
            commentService: new Comment(),
            origin: document.location.pathname, //we are using this as the origin/resourcename
        }
    },

    props:{
        isContained: {
            required: false,
            type: Boolean,
            default: true
        },
        isReply: {
            required: false,
            type: Boolean,
            default: false
        },
        commentId:{
            required: false,
            type: String,
            default: ""
        }
    },

    methods: {
        startComment(){
            if(this.firstComment()){
                this.showName = true;
                this.hideSmallComment = true;
            }

            this.autoFocusName()
        },

        autoFocusName(){
            // TODO: Auto focus the name input
            // this.$refs.commentatorName.focus()
        },

        /**
         * Check if we have the user details saved in the cookie
         * Which will mean the user has commented previously
         * And so we won't have to show them the {name} & {email} fields
         */
        firstComment(){
            if(document.cookie.indexOf("commentatorName") > -1){
                //then name and email must exist in the cookie
                return false; //don't show the name & email form
            }else{
                return true;
            }
        },

        send(){
            if(this.isReply){
                this.commentService.storeReply(this.comment, this.email, this.name, this.commentId);
            }else{
                const response = this.commentService
                .storeComments(this.origin, this.comment, this.email, this.name);
            }

            //empty values of comment
            this.comment = this.email = this.name = "";

            //you've finished first comment and are registered in DB
            this.showName = false;
            
            this.hideSmallComment = false; //show the small comment box     
            
            /**
             * now we want to display replies in real time.
             * if commentId is empty, then it is a new comment
             * and a reply otherwise
             * */
            this.$emit('comment', this.commentId);
        },
    },

}
</script>

<style scoped>
    input.w-75.p-2{
        outline: -webkit-focus-ring-color auto 1px;
    }
</style>