<template>
    <div>
        <ais-instant-search :index-name="selected_index" :search-client="searchClient">
            <ais-autocomplete>
                <div slot-scope="{ currentRefinement, indices, refine }">
                    <div class="input1">
                        <!-- <el-input v-model="updatedEl"></el-input> -->
                        <input type="search" placeholder="Search here" class="form-control" :value="currentRefinement" @input="refine($event.currentTarget.value)">
                        <!-- <el-select @change="updateIndex" v-model="selected_index" placeholder="Select">
                            <el-option label="All" value="site_wide_search" selected></el-option>
                            <el-option label="Payments" value="payments"></el-option>
                            <el-option label="Companies" value="companies"></el-option>
                            <el-option label="Budget" value="budget"></el-option>
                            <el-option label="Sector" value="sector"></el-option>
                            <el-option label="Ministries" value="ministries"></el-option>
                        </el-select> -->
                    </div>
                </div>
            </ais-autocomplete>

            <ais-hits>
                <p class="hh5 pull-left text-left">Search results:</p>
                <div class="div4" slot-scope="{ items }">
                    <div class="col-md-12 d-flex flex-wrap justify-content-around">
                        <div class="col-md-3 diva" v-for="item in items" :key="item.objectID">
                            <span class="badge badge-primary" title="Source">
                                {{ getSource(item.objectID) }}
                            </span>
                            <img :src="item.avatar" v-if="item.objectID.indexOf('Cabinet') > -1" :alt="item.name" srcset="">
                            <img src="/images/image%207.png" v-if="item.objectID.indexOf('Ministry') > -1" :alt="item.name" srcset="">
                            <p class="hh6">
                                {{ item.name ? item.name : item.org_name }}
                            </p>
                            <p class="hh6" v-if="item.objectID.indexOf('Payment') > -1">
                                {{ item.description }}
                            </p>
                            <span class="text-muted" v-if="item.website || item.amount">
                                {{ item.website ? "Website" : "Amount" }} : 
                                    {{ (item.website) ? 
                                        item.website : item.amount 
                                    }}
                            </span>
                            <span class="text-muted" v-if="item.objectID.indexOf('Cabinet') > -1">
                                <small v-if="item.ministry">Ministry {{ item.ministry.name }}</small> <br>
                                <small>Role {{ item.role }}</small> <br>
                                <small>Twitter {{ item.twitter_handle }}</small>
                            </span>
                            <br>
                            <span class="text-muted" v-if="item.amount">
                                <!-- if the result is a budget or payment, return the year and add the right adjectives-->
                                {{ item.payment_code ? "Money paid on " + item.payment_date : item.year + " budget"  }}
                            </span>
                        </div>
                    </div>
                </div>
            </ais-hits>

        </ais-instant-search>
    </div>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';

export default {
  data() {
    return {
      searchClient: algoliasearch(
        process.env.MIX_ALGOLIA_APP_ID,
        process.env.MIX_ALGOLIA_SEARCH
      ),
      selected_index: "site_wide_search",
      searchString: null,
    };
  },

    methods: {
        updateIndex(){
            this.selected_index
        },

        getSource(object){
            if(object.indexOf("Cabinet") > -1){
                return "Cabinets";
            }else if(object.indexOf("Payment") > -1){
                return "Payments";
            }else if(object.indexOf("Ministry") > -1){
                return "Ministries";
            }else if(object.indexOf("Budget") > -1){
                return "Budgets";
            }
        }
    },


};
</script>

<style scoped>
    .el-select .el-input {
        width: 110px;
    }

    .el-select {
        width: 119px;
    }
    
    .diva   {
        background: #FFFFFF;
        padding: 10px 20px;
        box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.04), 0px 0px 2px rgba(0, 0, 0, 0.06), 0px 4px 8px rgba(0, 0, 0, 0.04);
        border-radius: 10px;
        margin-bottom: 40px;
        padding-bottom: 25px;
    }

    span.badge.badge-primary {
        position: absolute;
        left: 13px;
        bottom: 6px;
    }
</style>