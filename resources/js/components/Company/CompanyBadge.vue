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
                if( !res.data || res.data == "" ){
                    this.title = 'Vote at the top right corner to show this organizations classification';
                    this.label = 'No classification data found';
                }else{
                    this.title = "Based on public vote";
                    this.label = res.data.name;
                }
            })
            .catch(err => {
                console.log("error-badge" + err);
            })
    },
}
</script>