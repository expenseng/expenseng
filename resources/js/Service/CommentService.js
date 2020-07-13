class CommentService{

    constructor(){
        this.name = "";
        this.email = "";
        this.avatar = "";
    }

    getAvatar(ownerId){
        axios.get('/api/comments/user/avatar', {
            email: ownerId
        })
        .then(response => {
            return response.data.name;
        })
    }

    reply(comemntId){

    }

    cookieExists(){
        return document.cookie.indexOf("commentatorName") > 1;
    }

    /**
     * 
     * @param {string} ownerId 
     */
    getUsername(ownerId){
        if(this.cookieExists()){
            return this.getCookieValue("commentatorName");
        }else{
            axios.get('/api/comments/user', {
                email: ownerId
            })
            .then(response => {
                return response.data.name;
            })
        }
        
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

        document.cookie = "commentatorName="+name;
        document.cookie = "commentatorEmail="+email;
        document.cookie = "expires="+expires

        //now store the user
        this.storeUser(email, name);
    }

    storeUser(email, name){
        return axios.post('/api/comments/user', {
            email: email,
            name: name
        })
        .then(response => {
            // this.email = response.data;
            return response.data;
        }).catch(err => {
            console.log(err);
        })
    }

    getUser(){
        axios.post('/api/comments/user', {
            email: this.email
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
        if(this.cookieExists()){
            return axios.post('/api/comments', {
                origin: origin,
                content: comment,
                ownerId: email,
            }).then(response => {
                return response.data;
            })
        }else{
            this.firstComment(email, name)
        }
    }
}

export default CommentService;