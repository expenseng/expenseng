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
    }

    getAvatar(ownerId){
        const gravatar = "https://www.gravatar.com/avatar/";
        const userEmail = this.getCookieValue("commentatorEmail");
        const userHash = this.getCookieValue("commentatorAvatar");
        /**
         * If the same email we have stored in the cookie is the one whose
         * avatar we have to display then fetch it and do so
         */
        if(userEmail == ownerId){
            return gravatar + userHash;
        }else{
            // return axios.get('/api/comments/user/avatar', {
            //     email: ownerId
            // })
            // .then(response => {
            //     return response.data;
            // })

            return "";
        }
    }

    reply(comemntId){

    }

    cookieExists(){
        return document.cookie.indexOf("commentatorName") > -1;
    }

    /**
     * 
     * @param {string} ownerId 
     */
    getUsername(ownerId){
        return axios.get('/api/comments/user', {
            email: ownerId
        })
        .then(response => {
            return response;
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
        return axios.get('/api/comments?origin=' + resource)
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

    upvote(commentId){
        return axios.patch('/api/comments/' + commentId + '/votes/upvote')
                    .then(response => {
                        return response.data;
                    })
    }
}

export default CommentService;