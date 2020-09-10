<template>
    <span class="badge badge-primary" :title="title">{{ label }}</span> 
</template>

<script>
export default {
    data() {
        return {
            label: '',
            voteCounts: 0,
            title: '',
        }
    },
    props:{
        companyId:{
            required: true,
            type: String
        }
    },
    created() {
        axios.get('/api/companies/type/' + this.companyId)
            .then(res => {

                var privateContractor, individualContractor, govtOrganization, govtOfficial;
                
                if(res.data == ""){
                    privateContractor = individualContractor = govtOrganization = govtOfficial = 0;
                }else{
                    privateContractor = parseInt(res.data.company);
                    individualContractor = parseInt(res.data.individual);
                    govtOfficial = parseInt(res.data.govt_official);
                    govtOrganization = parseInt(res.data.govt_organization);
                }
                    console.log(privateContractor, individualContractor, govtOrganization, govtOfficial);

                if( Math.max(privateContractor, individualContractor, govtOfficial, govtOrganization) == 0){
                    this.title = 'Vote at the top right corner to show this organizations classification';
                    this.label = 'No classification data found';
                }else{
                    this.title = "Based on public vote";

                    if (Math.max(privateContractor, individualContractor, govtOrganization, govtOfficial) == privateContractor){
                        this.label = "Private Contractor (Company)";
                        this.voteCounts = privateContractor;
                    }else if(Math.max(privateContractor, individualContractor, govtOrganization, govtOfficial) == individualContractor){
                        this.label = "Private Contractor (Individual)";
                        this.voteCounts = individualContractor;
                    }else if(Math.max(privateContractor, individualContractor, govtOrganization, govtOfficial) == govtOrganization){
                        this.label = "Government Parastatal";
                        this.voteCounts = govtOrganization;
                    }else if(Math.max(privateContractor, individualContractor, govtOrganization, govtOfficial) == govtOfficial){
                        this.label = "Government Official (Person)";
                        this.voteCounts = govtOfficial;
                    }
                }
            })
            .catch(err => {
                console.log(err);
            })
    },
}
</script>