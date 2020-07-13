<template>
    <div>
        <div class="container w-75 d-flex flex-column align-content-center justify-content-center">
            <input placeholder="Name" ref="commentatorName" v-model="name" v-if="showName" required class="p-2 mb-2">
            <input placeholder="Email" v-model="email" v-if="showName" required class="p-2 mb-2">
            <textarea placeholder="Write a comment" v-model="comment" v-if="showName" required class="p-2 mb-2"></textarea>
            <input placeholder="Write a Comment" v-if="!hideSmallComment" @focus="startComment" class="p-2">
            <button class="btn btn-primary" v-if="showName">Comment</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showName: false,
            hideSmallComment: false,
            comment: "",
            email: "",
            name: ""
        }
    },

    methods: {
        startComment(){
            if(this.firstComment){
                this.showName = true;
                this.hideSmallComment = true;
            }

            this.autoFocusName()
        },

        autoFocusName(){
            this.$refs.commentatorName.focus()
        },
    },

    computed: {
        /**
         * Check if we have the user details saved in the cookie
         * Which will mean the user has commented previously
         * And so we won't have to show them the {name} & {email} fields
         */
        firstComment(){
            if(document.cookie.indexOf("commentator") > 1){
                //then name and email must exist in the cookie
                return false; //don't show the name & email form
            }else{
                return true;
            }
        }
    },
}
</script>

<style scoped>
    input.w-75.p-2{
        outline: -webkit-focus-ring-color auto 1px;
    }
</style>