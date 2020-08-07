<template>
    <div>
        <ais-instant-search index-name="site_wide_search" :search-client="searchClient">
            <!-- <ais-index index-name="ministries" /> -->
            <ais-autocomplete>
                <div slot-scope="{ currentRefinement, indices, refine }">
                    <div class="input1">
                        <input type="search" name="stext"  class="input3" 
                                id="" placeholder="Search for reports, profiles and projects"
                                :value="currentRefinement"
                                @input="refine($event.currentTarget.value)"
                                >
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
    };
  },
};
</script>
