class CommentService{

    constructor(){
        this.user = getUser();
        this.comment = "";
    }

    getAvatar(ownerId){
        return "https://en.gravatar.com/userimage/109657943/5d0f4515d1fc87ab9acaf9eebf82f99e.png";
    }

    reply(comemntId){

    }

    getUsername(ownerId){
        return "Olaegbe Samuel";
    }

    storeUser(email, name){
        document.cookie = "commentator=true";
        document.cookie = "user="+name;
        document.cookie = "email="+email;

        this.user.name = name;
        this.user.email = email;
    }

    getUser(){
        
    }
}

export default CommentService;