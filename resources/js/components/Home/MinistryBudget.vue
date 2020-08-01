<template>
    <div class="d-flex justify-content-between w-100">
        <img :src="this.loaderGif" v-if="this.loading" alt="Loading..." srcset="">
            <div class="d-flex flex-wrap justify-content-md-between col-sm-12 w-100" v-else>
                <carousel>
                        <div class="exp-card" v-for="card in this.series" :key="card.label">
                            <slide>
                                <div class="graph-cont">
                                    <chart :element="card.label.substring(0, 25).replace(/ /g, '').toLowerCase()" 
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
                            </slide>
                        </div>
                </carousel>
            </div>
    </div>
</template>

<script>
import Chart from '../Payments/Chart';
import { Carousel, Slide } from 'vue-carousel';
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
        Chart,
        Carousel,
        Slide
    },

    mounted() {
        this.loading = true;
        axios.get('/api/expense/budget')
            .then(response => {
                this.loading = false;
                this.cards = response.data;
                // console.log(response.data);
                // response.data.forEach(element => {
                for (const key in this.cards) {
                    if (this.cards.hasOwnProperty(key)) {
                        const element = this.cards[key];
                        this.series.push(
                            { 
                                label: key,    
                                data: element.data, 
                                total: element.data.find(data => data.year == 2020).amount
                            }
                        )
                    }
                }
                // });
            }).catch(err => {
                console.log(err);
            })
    },

    computed: {
        
    },
}
</script>