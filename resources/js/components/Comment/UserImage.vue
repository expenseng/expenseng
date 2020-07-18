<template>
    <div>
        <div class="lds-ring" v-if="busy"><div></div><div></div><div></div><div></div></div>
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
    .lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid #00945e;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #00945e transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>