<template>
    <div class="d-flex justify-content-between w-100">
        <img :src="this.loaderGif" v-if="this.loading" alt="Loading..." srcset="">
        <div class="d-flex flex-wrap justify-content-md-between col-sm-12 w-100" v-else>
            <div class="exp-card" v-for="card in cards" :key="card">
                <div class="graph-cont">
                    <chart :element="card.toLowerCase()" :label="card" 
                            :data="series[card.toLowerCase()].data"></chart>
                </div>
                <p class="exp-card1 pl-2">{{ card }}</p>
                <p class="exp-card2 pl-2">
                    {{ 
                        "₦" + Number(series[card.toLowerCase()].total).toLocaleString()
                    }}
                </p>
                <p class="exp-card3 pl-2">{{ new Date().getFullYear() }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import Chart from '../Payments/Chart';

export default {
    data() {
        return {
            cards: [],
            currentYear: new Date().getFullYear(),
            loaderGif: require('../../../img/EXPENSE LOADER.gif'),
            loading : false,
            series: {
                health: {
                    data: [],
                    total: '',
                },
                defence: {
                    data: [],
                    total: '',
                },
                housing: {
                    data: [],
                    total: ''
                },
                education: {
                    data: [],
                    total: ''
                },
            },
        }
    },    

    components:{
        Chart
    },

    mounted() {
        this.loading = true;
        axios.get('/api/expense/budget')
            .then(response => {
                this.loading = false;
                response.data.forEach(element => {
                    this.cards.push(element.label); 
                    if(element.label == "Health"){
                        element.data.map(item => {  
                            if(item.year == this.currentYear){
                                console.log(item.year)
                                this.series.health.total = item.amount;
                            }
                            this.series.health.data.push({amount: item.amount, year: item.year})
                        })
                    }
                    if(element.label == "Defence"){
                        element.data.map(item => {  
                            if(item.year == this.currentYear){
                                this.series.defence.total = item.amount;
                            }
                            this.series.defence.data.push({amount: item.amount, year: item.year})
                        })
                    }
                    if(element.label == "Housing"){
                        element.data.map(item => { 
                            if(item.year == this.currentYear){
                                this.series.housing.total = item.amount;
                            }
                            this.series.housing.data.push({amount: item.amount, year: item.year})
                        })
                    }      
                    if(element.label == "Education"){
                        element.data.map(item => { 
                            if(item.year == this.currentYear){
                                this.series.education.total = item.amount;
                            }
                            this.series.education.data.push({amount: item.amount, year: item.year})
                        })
                    }                    
                });
                this.data = response.data;
            }).catch(err => {
                console.log(err);
            })
    },

    computed: {
        
    },
}
</script>