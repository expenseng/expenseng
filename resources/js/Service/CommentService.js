class CommentService{

    constructor(){
        if(this.cookieExists()){
            this.name = this.getCookieValue("commentatorName");
            this.email = this.getCookieValue("commentatorEmail");
            this.avatar = this.getCookieValue("commentatorAvatar");
        }else{
            this.name = "";
            this.email = "";
            this.avatar = "";
        }
        // this.email = this.getCookieValue("commentatorEmail");
    }

    getAvatar(ownerId){
        const gravatar = "https://www.gravatar.com/avatar/";
        return axios.post('/api/comments/user/avatar', {
            email: ownerId
        })
        .then(response => {
            return gravatar + response.data;
        })
    }
    

    cookieExists(){
        return document.cookie.indexOf("commentatorName") > -1;
    }

    /**
     * 
     * @param {string} ownerId 
     */
    getUsername(ownerId){
        return axios.post('/api/citizens', {
            email: ownerId
        })
        .then(response => {
            return response.data;
        })        
    }

    getCookieValue(a) {
        var b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
        return b ? b.pop() : '';
    }

    firstComment(email, name){
        this.email = email;
        this.name = name;
        
        let date = new Date();
        //Set cookie to expire after 100 days
        var expires = date.setDate(100);

        //now store the user
        this.storeUser(email, name)
            .then(response => {
                // store the user md5 hash to be used for gravatar
                var user = response;
                document.cookie = "commentatorAvatar="+user.md5Hash;
            })

        document.cookie = "commentatorName="+name;
        document.cookie = "commentatorEmail="+email;
        document.cookie = "expires="+expires
    }

    storeUser(email, name){
        return axios.post('/api/comments/user', {
            email: email,
            name: name
        })
        .then(response => {
            return response.data;
        }).catch(err => {
            console.log(err);
        })
    }

    getResourceComments(resource){
        return axios.post('/api/comments/resource', {
            origin: resource
        })
        .then(response => {
            return response.data;
        }).catch(err => {
            console.log(err);
        })
    }

    storeComments(origin, comment, email, name){

        if(!this.cookieExists()){
            this.firstComment(email, name)
        }

        return axios.post('/api/comments', {
            origin: origin,
            content: comment,
            ownerId: this.email,
            refId: this.name,
        }).then(response => {
            return response.data;
        })
    }

    storeReply(comment, email, name, commentId){
        if(!this.cookieExists()){
            this.firstComment(email, name)
        }

        return axios.post('/api/comments/' + commentId + '/replies', {
            content: comment,
            email: this.email,
        }).then(response => {
            return response.data;
        })
    }

    fetchReplies(commentId){
        return axios.get('/api/comments/' + commentId + '/replies')
        .then(response => {
            return response.data;
        })
    }

    upvote(commentId, ownerId){
        return axios.patch('/api/comments/' + commentId + '/votes/upvote', {
            ownerId: ownerId
        })
        .then(response => {
            return response.data;
        })
    }

    downvote(commentId, ownerId){
        return axios.patch('/api/comments/' + commentId + '/votes/downvote', {
            ownerId: ownerId
        })
        .then(response => {
            return response.data;
        })
    }

    deleteComment(commentId, ownerId){
        return axios.post('/api/comments/'+commentId+'/delete', {
            ownerId: ownerId
        }).then(response => {
            return response.data;
        })
    }

    deleteReply(commentId, owner, replyId){
        return axios.post('/api/comments/'+commentId+'/replies/'+replyId+'/delete', {
            ownerId: owner
        }).then(response => {
            return response.data;
        })
    }

    isMyComment(comment){
        return this.email == comment.ownerId;
    }

    flagComment(commentId, ownerId){
        return axios.patch('/api/comments/'+commentId+'/flag', {
            ownerId: ownerId
        }).then(response => {
            return response.data;
        })
    }

    flagReply(commentId, replyId, ownerId){
        return axios.patch('/api/comments/'+commentId+'/replies/'+replyId+'/flag', {
            ownerId: ownerId
        }).then(response => {
            return response.data;
        })
    }
}

export default CommentService;