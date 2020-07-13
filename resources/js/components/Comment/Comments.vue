<template lang="">
    <div>
        <div class="container mb-4 mt-4" v-for="data in comments">
            <div class="card p-3">
                <div class="container">
                    <div class="row occupy">
                        <div class="col-sm-1 mt-1 row d-flex container">
                            <img :src="comment.getAvatar(reply.ownerId)" class="resize" alt="profile-image">
                        </div>
                        <div class="col-sm-11" :id="data.commentId">
                            <div class="d-flex justify-content-between  no-show">
                                <div class="d-flex">
                                    <p class="green-text">{{ comment.getUsername(data.ownerId) }}</p>
                                    <p class="ml-3 grey-text small mt-1">{{ data.time }}</p>
                                </div>
                                <i class="fas fa-ellipsis-h grey-text"></i>
                            </div>
                            <div>
                                <p>{{ data.content }}</p>
                            </div>
                            <div class="d-flex text-center align-content-center  icons justify-content-start">
                                <span class="d-flex mr-3"><i class="far fa-thumbs-up"></i><p class="small mt-1">{{ data.numOfUpVotes }}</p></span>
                                <span class="d-flex mr-3"><i class="far fa-thumbs-down"></i> <p class="small mt-1">{{ data.numOfDownVotes }}</p></span>
                                <span class="d-flex mr-3" style="cursor:pointer" @click="comment.reply(data.commentId)"><i class="far fa-comment"></i>
                                    <p class="small mt-1"> {{ data.numOfReplies > 0 ? "Replies " + data.numOfReplies : "Reply" }} </p>
                                </span>
                            </div>
                        </div>
                        <div class="container mb-4 mt-4" v-if="data.numOfReplies > 0">
                            <replies :replies="data.replies"></replies>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <comment></comment>
    </div>
</template>

<script>

import CommentService from '../../Service/CommentService';
import Comment from './Comment';
import Replies from './Replies'

export default {
    data() {
        return {
            comment: new CommentService(),
            text: '',
            origin: '',
            comments: [
                {
                    "commentId": "5f0b822e47fc48001694258b",
                    "refId": "1",
                    "applicationId": "5f08a7c604c43b0014558260",
                    "ownerId": "001",
                    "content": "Hola mi corazon 😉",
                    "origin": "expense page",
                    "numOfVotes": 0,
                    "numOfUpVotes": 0,
                    "numOfDownVotes": 0,
                    "numOfFlags": 0,
                    "numOfReplies": 0,
                    "replies": [],
                },
                {
                    "commentId": "5f0b822e47fc48001694258b",
                    "refId": "1",
                    "applicationId": "5f08a7c604c43b0014558260",
                    "ownerId": "001",
                    "content": "Hola mi corazon 😉",
                    "origin": "expense page",
                    "numOfVotes": 0,
                    "numOfUpVotes": 0,
                    "numOfDownVotes": 0,
                    "numOfFlags": 0,
                    "numOfReplies": 1,
                    "replies": [],
                },
            ],
        }
    },

    components:{
        Replies,
        Comment
    },

    mounted() {
        //get associated first repliy for comments with a reply
        this.comments.map(comment => {
            if(comment.numOfReplies > 0){
                comment.replies.push(
                    {
                        "ownerId": "001",
                        "content": "A reply to a certain comment"
                    },
                    {
                        "ownerId": "001",
                        "content": "A reply to a certain comment"
                    }
                )
            }
        })
    },

    methods: {
        fetch(){
            axios.get('/api/comments/' + this.origin)
                .then(response => {
                    this.data = response.data;
                }).catch(err => {
                    console.log(err);
                })
        },

        reply(id){
            var parentEl = document.querySelector("#"+id).prepend("");
        },

        createNewReplyDom(parentId){
            
        },

        getAvatar(ownerId){

        },

        send(){
            axios.post('/api/comments', {
                email: "olaegbesamuel@gmail.com",
                body: this.comment,
                origin: "fgexpense",
            }).then(response => {
                console.log(response);
            }).catch(err => {
                console.log(err);
            })
        },

        getUsername(){
            return "Samuel";
        }
    },
}
</script>

<style scoped>
.comments .top img{
    padding-right: 10px;
}

.coat h1{
    display: inline-block;
    left: 106px;
    top: 16.5px;
    margin-left: 20px;
    font-family: Lato;
    font-style: normal;
    font-weight: bold;
    font-size: 40px;
    line-height: 48px;
    /* identical to box height */
    color: #323E48;
}

.topic{
    width: 400px;
    height: 41.25px;


    font-family: Lato;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;

    color: #1F2430;
}

.subtopic1{
    width: 169px;
    height: 28.9px;
    left: 100px;
    top: 546px;

    font-family: Lato;
    font-style: normal;
    font-weight: normal;
    font-size: 24px;
    line-height: 29px;
    color: #6765EC;
}

.subtopic2{
    width: 152.99px;
    height: 52.5px;
    left: 415px;
    top: 546px;

    font-family: Lato;
    font-style: normal;
    font-weight: bold;
    font-size: 24px;
    line-height: 29px;

    color: #00945E;
}

.subtopic3{
    margin-top: -10px;
    width: 31.18px;
    height: 28.13px;
    left: 100px;
    top: 587.88px;

    font-family: Lato;
    font-style: normal;
    font-weight: normal;
    font-size: 13px;
    line-height: 16px;

    color: #1F2430;
}

.closer{
    margin-top: -30px;
}

.comm-section a{
    text-decoration: none;
    display: inline-block;
    padding-right: 70px;
    text-align: center;
}

.comm-section h5{
    color: #A1A3A8;
}
.comm-section .h51{
    color: #00945E;
}

.comm{
    margin-left: 5%;
}

.comm div{
    display: inline-block;
}

.comm-image{
    margin-top: -30px;
    margin-right: 10px;
}

.comm .p1{
 width: 300px;
height: 19px;
left: 213.01px;
top: 835px;

font-family: Lato;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
color: #005938;
}

.comm .p1 span{
width: 71px;
height: 19px;
left: 341.39px;
top: 835px;
margin-left: 5px;
font-family: Lato;
font-style: normal;
font-size: 16px;
line-height: 19px;
color: #62666E;
}

.comm h5{
line-height: 29px;
font-size: 22px;
margin-bottom: 20px;
color: #1F2430;
}

.hidden{
    display: none;
}

.p2 span{
padding: 20px;
width: 17px;
height: 17px;
left: 237.32px;
top: 918.79px;
font-family: Lato;
font-style: normal;
font-weight: normal;
font-size: 14.1896px;
line-height: 17px;
color: #1F2430;
}


.inner-comm{
    padding-left: 50px;
}

.input-comm{
    border: 1px solid #BCBDC1;
    box-sizing: border-box;
    border-radius: 5px;
    margin: 50px;
    height: 40px;
    padding-top: 5px;
}

input{
    padding-left: 15px;
    border-width: 1px;
    border-style: solid;
    border-radius: 3px;
    padding-right: 73px !important;
}

.input-comm img{
    float: right;
    padding-right: 20px;
}

@media (max-width: 960px){
    .top .img{
        height: 18px;        
    }
   
    .coat{
        align-self: center;
        text-align: center;
    }

    .coat img{
        display: inline-block;
        height: 100px;
        justify-items: center;
    }

    .coat h1{
        font-size: 23px;
        
        
    }

    .topic{
        font-size: 15px;
        margin-bottom: -15px;
    }

    .subtopic1{
        font-size: 13px;
        margin-bottom: -5px;
    }

    .subtopic2{
        font-size: 13px;
        margin-bottom: -5px;
    }

    .subtopic3{
        font-size: 13px;
        
    }

    .comm div{
        display: inline-block;
    }

    .comm-section h5{
        margin-right: -20px;
        font-size: 17px;
    }

    /* .comm-section .hide{
        display: none;
    } */

    .comm-image img{
        height: 40px;
    }

    .comm-writeup .p1{
        font-size: 13px;
    }

    .shown{
        display: none;
    }

    .hidden{
        display: contents;
    }

    .comm .p1 span{
        font-size: 12px;
    }
    .comm h5{
        font-size: 15px;
        }

        .comm .p2 img{
            height: 12px;
        }    
        .comm .p2 span{
            
            font-size: 11px;
        } 
        
        .input-comm{
            font-size: 13px;
        }

        .input-comm img{
            height: 13px;
            margin-left: -10px;
            
        }
}

@media (max-width: 480px){
    
    .top .img{
        height: 10px;
        
        
    }
    .top img{
        margin: -5px;
    }


    .coat{
        align-self: center;
        text-align: center;
    }

    .coat img{
        display: inline-block;
        height: 50px;
        justify-items: center;
    }

    .coat h1{
        font-size: 15px;
        
        
    }

    .topic{
        font-size: 12px;
        margin-bottom: -15px;
    }

    .subtopic1{
        font-size: 10px;
        margin-bottom: -5px;
    }

    .subtopic2{
        font-size: 10px;
        margin-bottom: -5px;
    }

    .subtopic3{
        font-size: 10px;
        
    }

    .comm div{
        display: inline-block;
    }

    .comm-section h5{
        margin-right: -20px;
        font-size: 10px;
    }

    .comm-section .hide{
        display: none;
    }

    .comm-image img{
        height: 30px;
    }

    .comm-writeup .p1{
        font-size: 10px;
    }


    .shown{
        display: none;
    }

    .hidden{
        display: contents;
    }

    .comm .p1 span{
        font-size: 10px;
    }
    .comm h5{
        font-size: 13px;
        }

        .comm .p2 img{
            height: 10px;
        }    
        .comm .p2 span{
            
            font-size: 10px;
        } 
        
        .input-comm{
            font-size: 13px;
        }

        .input-comm img{
            height: 13px;
            margin-left: -10px;
            
        }
}
</style>