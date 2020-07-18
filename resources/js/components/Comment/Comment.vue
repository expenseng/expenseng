<template>
    <div :class="isContained ? 'container' : '' " class="commentTextArea d-flex flex-column align-content-center justify-content-center">
        <input placeholder="Name" ref="commentatorName" v-model="name" v-if="showName" required class="p-2 mb-2">
        <input placeholder="Email" v-model="email" v-if="showName" required class="p-2 mb-2">
        <textarea-autosize
            placeholder="Write a comment"
            ref="commentInput"
            aria-required="true"
            class="p-2 mb-2"
            v-model="comment"
            :min-height="65"
            :max-height="350"
            @focus.native="startComment"
            @keyup.enter.exact.native="send"
        />
        <span class="text-muted error alert alert-danger" v-if="error != ''">
            {{ error }}
        </span>
        <button class="btn btn-primary" @click="send" v-if="showName">Comment</button>
    </div>
</template>

<script>
import Comment from '../../Service/CommentService';
import Comments from '../Comment/Comments';
export default {
    data() {
        return {
            showName: false,
            hideSmallComment: false,
            comment: "",
            email: "",
            name: "",
            error: "",
            commentService: new Comment(),
            origin: document.location.pathname, //we are using this as the origin/resourcename
        }
    },

    components:{
        Comments
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
            if(this.name == "" || this.email == "") this.error = "Error: all fields are requierd. Please be sure to fill all fields"; return false;

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
        },
    },

}
</script>

<style scoped>
    input.p-2, textarea{
        outline: -webkit-focus-ring-color auto 1px;
    }   

    .commentTextArea{
        width: 100% !important;
    }

    @media screen and (min-width: 600px) {
        .commentTextArea{
            width: 75% !important;
        }
    }

    
</style>