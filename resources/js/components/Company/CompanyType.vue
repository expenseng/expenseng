<template>
    <div>
        <!-- Show button to trigger this pop up -->
        <a href="#" @click="show" v-if="!alreadyVoted()">Help us improve this page <i class="far fa-edit"></i></a>

        <!-- Modal -->
        <div class="modal fade" id="voteModal" tabindex="-1" role="dialog" aria-labelledby="vote" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="voteTitle">Help us improve contractors data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Feedback -->
                    <div class="alert alert-dismissible fade show" :class="feedback.status == 'success' ? 'alert-success' : 'alert-error' " role="alert" v-if="feedback.message != ''">
                        <span v-html="feedback.message"></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- End Feedback -->
                    <span class="text-muted">Select one of options below which best describes this contractor:</span>
                    <br/>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" v-model="companyType" value="govtparastatal" class="custom-control-input" id="govtparastatal">
                        <label class="custom-control-label" for="govtparastatal">Government Parastatal</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" v-model="companyType" value="privatecompany" class="custom-control-input" id="privatecompany">
                        <label class="custom-control-label" for="privatecompany">Private Contractor (Company)</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" v-model="companyType" value="privatecontractor" class="custom-control-input" id="privatecontractor">
                        <label class="custom-control-label" for="privatecontractor">Private Contractor (Individual)</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" v-model="companyType" value="govtofficial" class="custom-control-input" id="govtofficial">
                        <label class="custom-control-label" for="govtofficial">Government Official</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" @click="save" :disabled="loading" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "VoteCompany",
    data() {
        return {
            visible: false,
            loading: false,
            companyType: '',
            feedback: {
                message: '',
                status: ''
            },
        }
    },

    props:{
        companyId: {
            required: true,
            type: String
        }
    },

    methods: {
        show(e){
            if(e){
                e.preventDefault(); //prevent button default action
            }
            
            $('#voteModal').modal('show');
            //inform the component when the modal is shown
            this.visible = true;
        },

        save(){
            this.loading = true;
            //exit if no option is selected
            if(!this.companyType) return false;

            axios.post('/api/companies/vote/'+this.companyId, {   type: this.companyType  })
            .then(res => {
                //set cookie for this company
                this.createCookie();

                this.feedback.message = "<strong>Thank you, comrade! 🙋🏽‍♀️🙋🏽‍♂️</strong> Your answer has been saved successfully.";
                this.feedback.status = "success";
                this.companyType = ''; //remove user selection
                // a certain user can only vote once so we will keep the submit button disabled
            })
            .catch(err => {
                this.feedback.message = "<strong>Sorry, an error occured</strong> We couldn't save your response because.." + err;
                this.feedback.status = "error";
                console(err);
            })
        },

        /**
         * Check if the company ID is stored in cookie
         */
        alreadyVoted(){
            return document.cookie.indexOf("votedCompany") > -1 && this.getCookieValue("votedCompany") == this.companyId;
        },

        /**
         * Store the company ID in cookie
         */
        createCookie(){
            document.cookie = "votedCompany="+this.companyId+";max-age="+(31536000 * 12)+";";
        },

        getCookieValue(a) {
            var b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
            return b ? b.pop() : '';
        }

    },

    mounted() {
        if(!this.alreadyVoted()){
            setTimeout(() => {
                this.show();
            }, 5000);
        }
        
    },
}
</script>

<style scoped>
    input{
        cursor: pointer;
    }

    a, i{
        color: green;
        font-size: small;
    }
</style>