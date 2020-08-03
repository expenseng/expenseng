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

    /**
     * Generate a name and store in this browser
     * Next time use this name instead of generating 
     * a new one.
     */
    anonymousName(){
        if(document.cookie.indexOf("comment_slug") > -1){
            return this.getCookieValue("comment_slug"); //return stored name
        }else{
            var Chance = require('chance');
            var chance = new Chance();
            
            const name = chance.first()  + " of Lagos";
            
            //store in cookie for future use.
            document.cookie = "comment_slug="+name;

            return name;
        }
    }

    storeComments(origin, comment, email, name, anon=false){

        if(!this.cookieExists() && !anon){
            this.firstComment(email, name)
        }

        return axios.post('/api/comments', {
            origin: origin,
            content: comment,
            ownerId: anon ? "anonymous" : this.email,
            refId: anon ? this.anonymousName() : this.name,
        }).then(response => {
            return response.data;
        })
    }

    storeReply(comment, email, name, commentId, anon = false){
        if(!this.cookieExists() && !anon){
            this.firstComment(email, name)
        }

        return axios.post('/api/comments/' + commentId + '/replies', {
            content: comment,
            email: anon ? this.anonymousName() : this.email,
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