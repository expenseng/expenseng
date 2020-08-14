<template>
    <div class="d-flex justify-content-between w-100">
        <img :src="this.loaderGif" v-if="this.loading" alt="Loading..." srcset="">
        <flickity ref="flickity" :options="flickityOptions" class="d-flex flex-wrap justify-content-md-between col-sm-12 w-100 main-carousel" v-else>
            <div class="exp-card carousel-cell" v-for="card in this.series" :key="card.label">
                    <div class="graph-cont">
                        <chart :element="card.label.substring(0, 20).replace(/ /g, '').replace(',', '').toLowerCase()" 
                                label="5 year expenses trend" 
                                :data="card.data"></chart>
                    </div>
                    <p class="exp-card1 pl-2">{{ card.label }}</p>
                    <p class="exp-card2 pl-2">
                        {{ 
                            "₦" + Number(card.total).toLocaleString()
                        }}
                    </p>
                    <p class="exp-card3 pl-2 text-muted">Total spent over the past 5 years</p>
            </div>
        </flickity>
    </div>
</template>

<script>

import Chart from '../Payments/Chart';
import Flickity from 'vue-flickity';

export default {
    data() {
        return {
            cards: [],
            currentYear: new Date().getFullYear(),
            loaderGif: require('../../../img/EXPENSE LOADER.gif'),
            loading : false,
            series: [],
            flickityOptions: {
                initialIndex: 0,
                prevNextButtons: true,
                pageDots: true,
                cellAlign: 'left',
                contain: true,
                autoPlay: true,
            }
        }
    },    

    components:{
        Chart,
        Flickity
    },

    mounted() {

        this.loading = true;
        axios.get('/api/ministries/expenses')
            .then(response => {
                this.loading = false;
                this.cards = response.data;
                for (const key in this.cards) {
                    if (this.cards.hasOwnProperty(key)) {
                        const element = this.cards[key];
                       
                        var object = [];
                        var total = [];

                        for (const key in element.yearbyyear) {
                            if (element.yearbyyear.hasOwnProperty(key)) {
                                const money = element.yearbyyear[key];

                                object.push({
                                    amount: money,
                                    year: key
                                });

                                total.push(money);
                            }
                        }

                        this.series.push(
                            { 
                                label: key,    
                                data: object,
                                total: total.reduce( (a, b) => { return a + b; }),  
                            }
                        )
                    }
                }
            }).catch(err => {
                console.log(err);
            })
    },
}
</script>

<style lang="css">
    .main-carousel{
        overflow: hidden;
        min-height: 380px;
    }

    .flickity-button {
        position: absolute;
        background: #00945ea6;
        border: none;
        color: #fff;
    }

    p.exp-card1.pl-2 {
        margin-bottom: 0.5px;
    }

    .exp-card{
        min-height: 330px;
    }
</style>