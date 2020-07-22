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



// ADMIN COMMENTS SERVICES
    
     getAllComments(){
        return axios.get('/api/comments/', {

        })
        .then(response => {
            return response.data;
        }).catch(err => {
            console.log(err);
        })
    }
    

    deleteComment(commentId, ownerId){
        return axios.post('/api/comments/' + commentId, {
            ownerId: ownerId
        })
        .then(response => {
            response = {
                data: response.data,
                message: "comment deleted successfully"
            }
            return response;
        }).catch(err => {
            console.log(err);
        })
    }


    flagComment(commentId, ownerId){
        return axios.patch('/api/comments/' + commentId + '/flag', {
            ownerId: ownerId
        })
        .then(response => {
            response = {
                data: response.data,
                message: "comment flagged successfully"
            }
            return response;
        }).catch(err => {
            console.log(err);
        })
    }

    updateComment(commentId, ownerId, content){
        return axios.patch('/api/comments/' + commentId, {
            content: content,
            ownerId: ownerId
        })
        .then(response => {
            response = {
                data: response.data,
                message: "comment updated successfully"
            }
            return response;
        })
    }

}

export default CommentService;