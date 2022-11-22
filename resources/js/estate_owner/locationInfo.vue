
<template>
    <v-container>
         <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        <Mapp
            @fillCordinate="fillCordinate1($event)"
            ref="mapref"
            :lat="location.lat"
            :lon="location.lon"
        />
        <v-layout class="h-full">
            <v-flex xs12 sm12>
                <v-card class="elevation-3">
                    <v-card-title primary-title xs8 sm8>
                        <div>
                            <div class="headline">
                                {{ trans('data.location_info') }}
                            </div>
                        </div>
                          <v-spacer></v-spacer>
                    <v-btn flat icon @click="dialog = false"> <v-icon>clear</v-icon> </v-btn>
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout row wrap>
                                <v-flex md3>
                                    <v-autocomplete
                                        item-text="value"
                                        item-value="key"
                                        :items="province_municipalities"
                                        v-model="location.province_municipality"
                                        :label="trans('data.province_municipality')"
                                        :data-vv-as="trans('data.province_municipality')"
                                        :error-messages="errors.collect('province_municipality')"
                                         :disabled="isEdit"
                                    ></v-autocomplete>
                                </v-flex>
                                <v-flex md3>
                                    <v-select
                                        item-text="value"
                                        item-value="key"
                                        :items="municipalities"
                                        v-model="location.municipality"
                                        :label="trans('data.municipality')"
                                        :data-vv-name="location.municipality"
                                        :data-vv-as="trans('data.municipality')"
                                        :error-messages="errors.collect('municipality')"
                                         :disabled="isEdit"
                                    ></v-select>
                                </v-flex>

                                <v-flex md3>
                                    <v-select
                                        item-text="value"
                                        item-value="key"
                                        :items="categories_location"
                                        v-model="location.category"
                                        :label="trans('data.category')"
                                        :data-vv-name="location.category"
                                        :data-vv-as="trans('data.category')"
                                        :error-messages="errors.collect('category')"
                                         :disabled="isEdit"
                                    ></v-select>
                                </v-flex>

                                <v-flex md3>
                                    <v-select
                                        item-text="value"
                                        item-value="key"
                                        :items="neighborhoods"
                                        v-model="location.neighborhood"
                                        :label="trans('data.neighborhood')"
                                        :data-vv-name="location.neighborhood"
                                        :data-vv-as="trans('data.neighborhood')"
                                        :error-messages="errors.collect('neighborhood')"
                                        :disabled="isEdit"
                                    ></v-select>
                                </v-flex>

                                <v-flex md3>
                                    <v-select
                                        item-text="value"
                                        item-value="key"
                                        :items="districts"
                                        v-model="location.district"
                                        :label="trans('data.district')"
                                        :data-vv-name="location.district"
                                        :data-vv-as="trans('data.district')"
                                        :error-messages="errors.collect('district')"
                                      :disabled="isEdit"
                                    ></v-select>
                                </v-flex>

                                <v-flex md3>
                                    <v-text-field
                                        v-model="location.plan_id"
                                        :label="trans('data.plan_id')"
                                           :disabled="isEdit"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex md3>
                                    <v-text-field
                                        v-model="location.piece_number"
                                        :label="trans('data.piece_number')"
                                         :disabled="isEdit"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex md3>
                                    <v-text-field
                                        v-model="location.size_number"
                                        type="number"
                                        :label="trans('data.size_number')"
                                         :disabled="isEdit"
                                    >
                                    </v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout row wrap>
                                <v-flex md3>
                                    <v-text-field
                                        v-model="location.northern_border"
                                        :label="trans('data.northern_border')"
                                        :disabled="isEdit"
                                    >
                                    </v-text-field>
                                </v-flex>
                                <v-flex md3>
                                    <v-text-field
                                        v-model="location.eastern_border"
                                        :label="trans('data.eastern_border')"
                                        :disabled="isEdit"
                                    >
                                    </v-text-field>
                                </v-flex>
                                <v-flex md3>
                                    <v-text-field
                                        v-model="location.western_border"
                                        :label="trans('data.western_border')"
                                        :disabled="isEdit"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex md3>
                                    <v-text-field
                                        v-model="location.southern_border"
                                        :label="trans('data.southern_border')"
                                        :disabled="isEdit"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex md3>
                                    <v-autocomplete
                                        item-text="value"
                                        item-value="key"
                                        :items="statuses"
                                        v-model="location.status"
                                        :label="trans('data.location_status')"
                                        :disabled="isEdit"
                                    ></v-autocomplete>
                                </v-flex>

                                <v-flex md3>
                                    <v-menu
                                        v-model="menu1"
                                        :close-on-content-click="false"
                                        max-width="290"
                                    >
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field
                                                :value="computedDateFormattedMomentjs"
                                                clearable
                                                :label="trans('data.instrument_date')"
                                                readonly
                                                    :disabled="isEdit"
                                                v-bind="attrs"
                                                v-on="on"
                                                @click:clear="location.instrument_date = null"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="location.instrument_date"
                                            @change="menu1 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-flex>
                                <v-flex md3>
                                    <v-text-field
                                        v-model="location.instrument_number"
                                        :label="trans('data.instrument_number')"
                                            :disabled="isEdit"
                                    ></v-text-field>
                                </v-flex>

                                <v-flex md3>
                                 
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex md4>
                                    <v-text-field
                                        :disabled="isEdit"
                                        v-model="location.lon"
                                        :label="trans('data.lon')"
                                    ></v-text-field>
                                </v-flex>

                                <v-flex md4>
                                    <v-text-field
                                     :disabled="isEdit"
                                        v-model="location.lat"
                                        :label="trans('data.lat')"
                                    ></v-text-field>
                                </v-flex>
                                <v-flex md3 v-if="!isEdit">
                                    <v-btn
                                        @click="createcordinate"
                                        large
                                        
                                        dark
                                        style="background-color: #06706d; color: white"
                                    >
                                        {{ trans('data.locate_map') }}

                                        <!-- //<v-icon>add</v-icon> -->
                                    </v-btn>
                                </v-flex>
                                <v-flex md12 sm12 xl12 class="mt-3">
                                                                 <v-btn color="white darken-1" class="primary" flat @click="saveData">
                        {{ trans('data.save') }}
         </v-btn>
                                                <v-btn color="white darken-1" class="bg-gray-400" flat @click="dialog=false">
                        {{ trans('data.close') }}
         </v-btn>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-flex>
          
        </v-layout>
         </v-dialog>
    </v-container>
</template>
<script>
import Mapp from '../common/projects/components/project_info/Mapp.vue';

export default {
    components: {
        Mapp,
    },

    props: {
        customerId: String,
    },
    data() {
        // https://github.com/date-fns/date-fns/blob/master/docs/upgradeGuide.md#string-arguments

        return {
            date: null, 
            dialog: false,
            menu: false,
            modal: false,
            menu1: false,
            menu2: false,
            isEdit: false,
            province_municipalities: [],
            municipalities: [],
            categories_location: [],
            neighborhoods: [],
            districts: [],
            location: {
                province_municipality: '',
                municipality: '',
                category: '',
                neighborhood: '',
                district: '',
                plan_id: '',
                piece_number: '',
                size_number: '',
                instrument_number: '',
                instrument_date: '',
                northern_border: '',
                eastern_border: '',
                western_border: '',
                southern_border: '',
                status: '',
                lon: '',
                lat: '',
                id: '',
            },
            statuses: [],
        };
    },
    created() {
        const self = this;
        // console.log(self.location1)
        self.getLocationStatus();
        self.getLocationInfo();
    },
    computed: {
        computedDateFormattedMomentjs() {
            const self = this;
            return self.location.instrument_date;
            // ? moment(self.location.instrument_date).format('dddd, MMMM Do YYYY')
            // : '';
        },
        computedDateFormattedDatefns() {
            const self = this;
            return self.location.instrument_date;
            // ? format(parseISO(self.location.instrument_date), 'EEEE, MMMM do yyyy')
            //  : '';
        },
    },
    methods: {
        saveData(){
    const self = this;
            let data = self.location;

                self.loading = true;
                axios
                    .post('/locations', data)
                    .then(function (response) {
                        if (response.data.success) {
                            self.loading = false;
                            self.dialog = false;
                            self.$emit('savedLocation',response.data.id);
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                        } else {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
        },
        openLocationDialog(){
            this.dialog = true
        },
        getLocationStatus() {
            const self = this;
            axios
                .get('/get-location-status')
                .then(function (response) {
                    self.statuses = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        fillCordinate1(data) {
            const self = this;
            self.location.lon = data.lon;
            self.location.lat = data.lat;
        },
        nextStep() {
            const self = this;
            //  alert(JSON.stringify(self.location))
            this.$emit('next', this.location);
        },

        createcordinate() {
            const self = this;

            this.$refs.mapref.create(self.location);
        },
        fillEditData(data, isEdit) {
            const self = this;
            self.isEdit = isEdit;

            self.location = data;

        },
    },
};
</script>