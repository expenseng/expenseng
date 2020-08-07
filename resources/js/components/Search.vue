<template>
    <div>
        <ais-instant-search :index-name="selected_index" :search-client="searchClient">
            <ais-autocomplete>
                <div slot-scope="{ currentRefinement, indices, refine }">
                    <div class="input1">
                        <el-input placeholder="Search" v-model="search" class="input-with-select">
                            <el-select @change="updateIndex" v-model="selected_index" slot="prepend" placeholder="Select">
                                <el-option label="All" value="site_wide_search" selected></el-option>
                                <el-option label="Payments" value="payments"></el-option>
                                <el-option label="Companies" value="companies"></el-option>
                                <el-option label="Budget" value="budget"></el-option>
                                <el-option label="Sector" value="sector"></el-option>
                                <el-option label="Ministries" value="ministries"></el-option>
                            </el-select>
                            <el-button slot="append" @click="refine" icon="el-icon-search"></el-button>
                        </el-input>
                    </div>
                </div>
            </ais-autocomplete>

            <p class="hh5">Search results:</p>
            <ais-hits>
                <div class="div4" slot-scope="{ items }">
                    <div class="div5">
                        <div class="diva" v-for="item in items" :key="item.objectID">
                            <img :src="item.avatar" v-if="item.objectID.indexOf('Cabinet') > -1" :alt="item.name" srcset="">
                            <p class="hh6">
                                {{ item.name ? item.name : item.org_name }}
                            </p>
                            <p class="hh7">Source: {{ item.objectID }}</p>
                            <p class="hh7">{{ item.website ? "Website" : "Amount" }} : {{ item.website ? item.website : item.amount }}</p>
                            <p class="hh7" v-if="item.amount">
                                <!-- if the result is a budget or payment, return the year and add the right adjectives-->
                                Source: {{ item.payment_code ? "Money paid on " + item.payment_date : item.year + " budget"  }}
                            </p>
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
      search: null
    };
  },

    methods: {
        refine(){
            this.searchClient.refine(this.search);
        },

        updateIndex(){
            this.selected_index
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
</style>