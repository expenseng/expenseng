<template>
    <div :class="isContained ? 'container' : '' " class="d-flex flex-column align-content-center justify-content-center">
        <span v-if="errors.length > 0" class="container d-flex justify-content-center">
            <span class="text-muted error alert alert-danger" v-for="error in errors" :key="error">
                {{ error }}
            </span>
        </span>
        <form @submit.prevent="send" class="commentTextArea d-flex flex-column align-content-center justify-content-center" :class="isContained ? 'container' : '' ">
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
            <button class="btn btn-primary" type="submit" v-if="showName">Comment</button>
            <div class="col-md-12 p-0">
                <small class="text-muted p-0 col-md-6 pull-left" v-if="!busy">Press enter to send</small>
                <div class="col-md-6 form-check pull-right text-right" v-if="started">
                    <input type="checkbox" @change="anonymous" class="form-check-input" id="anonymousCommenter">
                    <label class="text-muted" for="anonymousCommenter">Comment as an anonymouse citizen</label>
                </div>
            </div>

            <div class="spinner-border spinner-border-sm float-right" v-if="busy" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </form>
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
            busy: false,
            started: false,
            name: "",
            isAnon: false,
            errors: [],
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
        },
        editContent:{
            required: false,
            type: String,
            default: null
        }
    },

    methods: {
        startComment(){
            if(this.firstComment()){
                this.showName = true;
                this.hideSmallComment = true;
                this.started = true; //this tells us the user has focused on comment box
            }
        },

        /**
         * Check if we have the user details saved in the cookie
         * Which will mean the user has commented previously
         * And so we won't have to show them the {name} & {email} fields
         */
        firstComment(){
            if(document.cookie.indexOf("commentatorName") > -1 || this.isAnon == true){
                //then name and email must exist in the cookie
                return false; //don't show the name & email form
            }else{
                return true;
            }
        },

        anonymous(){
            //don't ask for name
            this.showName = !this.showName;
            this.isAnon = !this.isAnon; //toggle.
        },

        send(){

            if(this.firstComment()){
                if(!this.name){
                    this.errors.push("Dear friend, we'll love to know your name")
                    return false;
                }

                if(!this.email){
                    this.errors.push("How about a point of contact? We'll use your email to identify you next time you visit.")
                    return false;
                }

                if(!this.comment){
                    this.errors.push("Let your voice be heard today, join thousands of civil Nigerians in the journey to hold the leadership responsible.")
                    return false;
                }
            }
            
            if(!this.comment){
                this.errors.push("Let your voice be heard today, join thousands of civil Nigerians in the journey to hold the leadership responsible.")
                return false;
            }

            this.busy = true;

            if(this.isReply){
                this.commentService.storeReply(this.comment, this.email, this.name, this.commentId, this.isAnon)
                    .then(response => {
                        this.busy = false;
                    })
            }else{
                const response = this.commentService
                .storeComments(this.origin, this.comment, this.email, this.name, this.isAnon)
                .then(response => {
                    this.busy = false;
                    this.$emit('newComment', response);
                })
            }

            //empty values of comment
            this.comment = this.email = this.name = "";

            //you've finished first comment and are registered in DB
            this.showName = false;
            
            this.hideSmallComment = false; //show the small comment box     
        },
    },

    mounted() {
        if(this.editContent){
            this.comment = this.editContent;
        }
    },

    watch: {
        editContent(newValue, oldValue){
            this.comment = newValue;
        }
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