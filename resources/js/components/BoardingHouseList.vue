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
            <b-button class="button is-link" @click="openModalFilter" icon-left="filter">
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




        <!--modal create-->
        <b-modal v-model="modalFilter" has-modal-card
                 trap-focus
                 :width="640"
                 aria-role="dialog"
                 aria-label="Modal"
                 aria-modal>

            <form @submit.prevent="submit">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Filters</p>
                        <button
                            type="button"
                            class="delete"
                            @click="modalFilter = false"/>
                    </header>

                    <section class="modal-card-body">
                        <div class="">
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Price Range" grouped>
                                        <b-field label="min price" label-position="on-border">
                                            <b-numberinput controls-alignment="right" controls-position="compact" v-model="filter.min_price"></b-numberinput>
                                        </b-field>

                                        <b-field label="max price" label-position="on-border">
                                            <b-numberinput controls-alignment="right" :min="0" controls-position="compact" v-model="filter.max_price"></b-numberinput>
                                        </b-field>
                                    </b-field>

                                    <hr>
                                    <div class="subtitle">Type of place</div>

                                    <b-field label="Private Room">
                                        <b-checkbox type="checkbox">
                                            Your own home in a home.
                                        </b-checkbox>
                                    </b-field>

                                    <b-field label="Shared Room">
                                        <b-checkbox type="checkbox">
                                            A sleeping space and common areas that may be shared with others.
                                        </b-checkbox>
                                    </b-field>

                                    <hr>

                                    <div class="subtitle">Amenities</div>

                                    <div class="is-flex is-flex-wrap-wrap">
                                        <div v-for="(el, ix) in amenities" :key="ix">
                                            <b-checkbox>{{ el.amenity }}</b-checkbox>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Close"
                            @click="modalFilter=false"/>
                        <button
                            :class="btnClass"
                            label="Save"
                            type="is-success">SEARCH</button>
                    </footer>
                </div>
            </form><!--close form-->
        </b-modal>
        <!--close modal-->

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
            },

            modalFilter: false,

            errors: {},
            fields: {},
            amenities: [],

            filter: {
                min_price: 250,
                max_price: 500,
            },


            btnClass: {
                'is-loading': false,
                'button': true,
                'is-primary' : true
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

        loadAmenities: function(){
            axios.get(`/load-open-amenities?`).then(res=>{
                this.amenities = res.data;
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


        openModalFilter: function(){
            this.modalFilter = true;

        },


    },

    mounted(){
        this.onResize();
        window.addEventListener('resize', this.onResize);

        this.loadBoardingHouses();
        this.loadAmenities();

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
