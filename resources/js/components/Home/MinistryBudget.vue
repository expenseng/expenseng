<template>
    <div class="d-flex justify-content-between w-100">
        <img :src="this.loaderGif" v-if="this.loading" alt="Loading..." srcset="">
        <div class="d-flex flex-wrap justify-content-md-between col-sm-12 w-100" v-else>
            <div class="exp-card" v-for="card in this.series" :key="card.label">
                <div class="graph-cont">
                    <chart :element="card.label.substring(0, 15).replace(/ /g, '').toLowerCase()" 
                            :label="card.label" 
                            :data="card.data"></chart>
                </div>
                <p class="exp-card1 pl-2">{{ card.label }}</p>
                <p class="exp-card2 pl-2">
                    {{ 
                        "₦" + Number(card.total).toLocaleString()
                    }}
                </p>
                <p class="exp-card3 pl-2">{{ card.data.year }}</p>
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
            series: [],
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
                this.cards = response.data;
                response.data.forEach(element => {
                    this.series.push(
                        { 
                            label: element.org_name,    
                            data: [{amount: element.amount, year: element.year}], 
                            total: ''
                        }
                    )
                });
            }).catch(err => {
                console.log(err);
            })
    },

    computed: {
        
    },
}
</script>