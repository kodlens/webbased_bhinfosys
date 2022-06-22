<template>

    <div class="section">
        <div class="columns is-centered">
            <div class="column is-6">
                <b-field>
                    <p class="control">
                        <b-select v-model="search.category" placeholder="Please select...">
                            <option value="bhouse">BOARDING HOUSE</option>
                            <option value="rule ">RULES</option>
                            <option value="amenities">AMENITIES</option>
                            <option value="location">LOCATION (Purok/Street)</option>
                        </b-select>
                    </p>
                    <b-input type="text" v-model="search.key" expanded placeholder="Search Boarding House"></b-input>
                    <p class="control">
                        <b-button class="button is-link" icon-left="magnify" @click="loadBoardingHouses"></b-button>
                    </p>
                   
                </b-field>
            </div>
        </div>

        <div class="buttons is-centered">
            <b-button class="button is-link" icon-left="filter">
                FILTERS
            </b-button>
        </div>

        <!-- <b-carousel-list v-model="test" :data="items" :items-to-show="itemShow">
            <template #item="list">
                
            </template>
        </b-carousel-list> -->

        <div class="result-container">

            <div class="card" v-for="(item, index) in bhouses" :key="index">
                <div class="card-image">
                    <figure class="image 5">
                        <a ><img class="bh-image" :src="`/storage/bhouses/${item.bhouse_img_path}`"></a>
                    </figure>
                    <!--                        <b-tag type="is-danger" rounded style="position: absolute; top: 0;"><b>50%</b></b-tag>-->
                </div>
                <div class="card-content">
                    <div class="content">
                        <p class="title is-6">{{ item.bhouse_name }}</p>
                        <p class="subtitle is-7 mt-4">
                            {{ item.bhouse_desc}}
                        </p>

                        <p class="subtitle is-7 mt-4">
                            Located at: {{ item.street }},  {{ item.barangay.brgyDesc }}
                        </p>
                    </div>

                    <div class="buttons" style="position: absolute; bottom: 0;">
                        <b-button type="is-link" icon-right="chevron-right" tag="a" :href="`/client-bhouse-detail/${item.bhouse_id}`">SEE MORE...</b-button>
                    </div>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">

            </div>
        </div>

    </div><!--root div section -->

</template>

<script>
export default {

    data() {
        return {

            test: 0,
            bhouses: [],
            itemShow: 3,

            search: {
                category: '',
                key: '',
            }
        }
    },


    methods: {

        info(value) {
            this.test = value
        },

        loadBoardingHouses: function(){
            const params = [
                `key=${this.search.key}`,
                `category=${this.search.category}`
            ].join('&')
            axios.get(`/get-client-bhouses?${params}`).then(res=>{
                this.bhouses = res.data;
              
            }).catch(err => {

            });
        },

        onResize(){
            if(window.innerWidth < 600){
                this.itemShow = 2;
            }
            if(window.innerWidth < 400){
                this.itemShow = 1;
            }
        },
    },

    mounted(){
        this.onResize();
        window.addEventListener('resize', this.onResize);

        this.loadBoardingHouses();

    },
    beforeDestroy () {
        if (typeof window === 'undefined') return
        window.removeEventListener('resize', this.onResize)
    },
}
</script>

<style scoped>
    .card{
        margin: 15px;
        width: 350px;
    }
    .carousel-list{
        box-shadow: none;
    }

    .card{
        height: 500px;
    }
    .card .card-image{
        height: 200px;
    }

    .card-content{
        position: relative;
    }
    .content{
        height: 100%;

    }

    .bh-image{
        height: 200px;
        object-fit: cover;
    }

    .result-container{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
</style>
