class AdminCommentService{

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
 

    cookieExists(){
        return document.cookie.indexOf("commentatorName") > -1;
    }


    fetchReplies(commentId){
        return axios.get('/api/comments/' + commentId + '/replies')
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


    deleteReply(commentId, replyId, ownerId){
        return axios.post('/api/comments/' + commentId + '/replies/' + replyId,{
            ownerId: ownerId
        })
        .then(response => {
            response = {
                data: response.data,
                message: "reply deleted successfully"
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

    // Flag a comment reply
    flagReply(commentId, replyId, ownerId){
        return axios.patch('/api/comments/' + commentId + '/replies/' + replyId + '/flag', {
            ownerId: ownerId
        })
        .then(response => {
            response = {
                data: response.data,
                message: "reply flagged successfully"
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

export default AdminCommentService;