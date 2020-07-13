class CommentService{

    getAvatar(ownerId){
        return "https://en.gravatar.com/userimage/109657943/5d0f4515d1fc87ab9acaf9eebf82f99e.png";
    }

    reply(comemntId){

    }

    getUsername(ownerId){
        axios.get('/api/comments/user')
        return "Olaegbe Samuel";
    }

    storeUser(email, name){
        document.cookie = "commentator=true";
        document.cookie = "user="+name;
        document.cookie = "email="+email;

        axios.post('/api/comments/user')
        .then(response => {
            return response.data;
        }).catch(err => {
            console.log(err);
        })
    }

    getUser(){
        
    }
}

export default CommentService;