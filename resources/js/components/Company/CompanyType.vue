<template>
    <div>
        <!-- Show button to trigger this pop up -->
        <a href="#" @click="show">Help us improve this page</a>

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
                    <span class="text-muted">Select one of options below which best describes this contractor:</span>
                    <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="company_type" class="custom-control-input" id="govtparastatal">
                        <label class="custom-control-label" for="govtparastatal">Government Parastatal</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="company_type" class="custom-control-input" id="privatecompany">
                        <label class="custom-control-label" for="privatecompany">Private Contractor (Company)</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="company_type" class="custom-control-input" id="privatecontractor">
                        <label class="custom-control-label" for="privatecontractor">Private Contractor (Individual)</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="company_type" class="custom-control-input" id="govtofficial">
                        <label class="custom-control-label" for="govtofficial">Government Official</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
        }
    },

    methods: {
        show(){
            $('#voteModal').modal('show');
            //inform the component when the modal is shown
            this.visible = true;
        }
    },

    mounted() {
        setTimeout(() => {
            this.show();
        }, 3000);
    },
}
</script>

<style scoped>
    input{
        cursor: pointer;
    }
</style>