<template>
    <span class="badge badge-primary" title="Based on public vote">Government Official</span> 
</template>

<script>
export default {
    data() {
        return {
            label: '',
            voteCounts: 0,
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
                console.log(res);
            })
            .catch(err => {
                console.log(err);
            })
    },
}
</script>