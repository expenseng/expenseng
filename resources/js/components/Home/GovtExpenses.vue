<template>
    <div>
        <div class="exp-card" v-for="card in data" :key="card">
            <div class="graph-cont">
                <chart element="health" label="Health" :data="this.card.payments"></chart>
            </div>
            <p class="exp-card1">{{ this.health.label }}</p>
            <p class="exp-card2">
                {{ this.health.totalPayment }}
            </p>
            <p class="exp-card3">{{ this.health.year }}</p>
        </div>
    </div>
</template>

<script>
import Chart from '../Payments/Chart';

export default {
    data() {
        return {
            data: {
                payments: [],
                label: [],
                totalPayments: [],
            }
        }
    },    
    
    components:{
        Chart
    },

    mounted() {
        axios.get('/api/expense/health')
            .then(response => {
                response.data.map(item => {
                    this.data.payments.push({amount:item.amount, year: item.year});
                    this.data.label.push(item.label);
                    this.data.totalPayments = item.amount;
                })
                this.data = response.data;
                console.log(response);
            }).catch(err => {
                console.log(err);
            })
    },
}
</script>