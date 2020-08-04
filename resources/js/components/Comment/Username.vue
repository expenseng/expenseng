<template>
    <div>
        <p class="green-text">{{ username.name }} <span v-if="anonymous" title="Comment from an anonymous user" class="badge badge-secondary">Anon</span> </p>
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
            anonymous: false,
        }
    },

    mounted() {
        this.commentService.getUsername(this.object.ownerId)
            .then(response => {
                if(response == ""){
                    //anonymous user won't be registered in the DB
                    this.anonymous = true;
                    this.username = {name: this.object.refId ?? this.object.ownerId}
                }else{
                    this.username = response;
                }
            })
    },

    props:{
        object:{
            type: Object,
            required: true
        }
    }
}
</script>