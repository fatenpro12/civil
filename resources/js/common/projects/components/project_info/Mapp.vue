<template>
    <div>
        <v-dialog v-model="dialog" width="800">
            <v-card>
                <v-card-title class="text-h5"> {{ trans('data.locate_map') }} </v-card-title>
                <v-card-text>
                    <GmapMap
                        :center="center"
                        :zoom="8"
                        style="width: 100%; height: 350px"
                        ref="mapRef"
                        @click="handleMapClick"
                    >
                        <GmapMarker
                            :position="marker.position"
                            :clickable="true"
                            :draggable="true"
                            @drag="handleMarkerDrag"
                            @click="panToMarker"
                        />
                    </GmapMap>
                </v-card-text>
                <v-divider class="mx-4"></v-divider>

                <v-card-text>
                    <v-layout row>
                        <v-flex
                            md4
                            v-bind:class="{ style_rtl: $checklang(), style_ltr: !$checklang() }"
                        >
                            <v-text-field
                                v-model="lon_map"
                                :label="trans('data.lon')"
                            ></v-text-field>
                        </v-flex>

                        <v-flex md4>
                            <v-text-field
                                v-model="lat_map"
                                :label="trans('data.lat')"
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
                <!-- <button @click="geolocate">Detect Location</button>

            <p>Selected Position: {{ marker.position }}</p> -->
                <!-- <v-divider></v-divider> -->
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="dialog = false">
                        {{ trans('data.close') }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<style scoped>
.style_rtl {
    padding-left: 5px;
}

.style_ltr {
    padding-right: 5px;
}
</style>
<script>
const isEmpty = (str) => !str.trim().length;
export default {
    name: 'GoogleMap',
    props: {
        lat: String,
        lon: String,
    },
    data() {
        return {
            lon_map: null,
            lat_map: null,
            marker: { position: { lat: this.lat, lng: this.lon } },
            center: { lat: this.lat, lng: this.lon },

            mapOptions: {
                disableDefaultUI: true,
            },
            dialog: false,
            loading: false,
        };
    },

    mounted() {
        this.geolocate();
    },
    methods: {
        //detects location from browser
        checkEmpty(str) {
            return !str.trim().length;
        },

        geolocate(data = null) {
            const self = this;
            //!self.checkEmpty(self.lat) && !self.checkEmpty(self.lon)
            if (data != null) {
            } else {
                navigator.geolocation.getCurrentPosition((position) => {
                    self.center = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    self.marker.position = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                 //   self.lat_map = position.coords.latitude;
                  //  self.lon_map = position.coords.longitude;
                   /// this.$emit('fillCordinate', { lat: position.coords.latitude, lon: position.coords.longitude });
                });
            }
        },

        //sets the position of marker when dragged
        handleMarkerDrag(e) {
            this.marker.position = { lat: e.latLng.lat(), lng: e.latLng.lng() };
        },

        //Moves the map view port to marker
        panToMarker() {
            this.$refs.mapRef.panTo(this.marker.position);
            this.$refs.mapRef.setZoom(10);
        },

        //Moves the marker to click position on the map
        handleMapClick(e) {
            this.marker.position = { lat: e.latLng.lat(), lng: e.latLng.lng() };
            this.lat_map = e.latLng.lat();
            this.lon_map = e.latLng.lng();
            this.$emit('fillCordinate', { lat: e.latLng.lat(), lon: e.latLng.lng() });
            console.log(e);
        },

        create(data) {
            const self = this;
            console.log(data.lat.toString())
            if (!self.checkEmpty(data.lat.toString()) && !self.checkEmpty(data.lon.toString())) {
               self.lat_map = data.lat;
                self.lon_map =data.lon;
                self.marker.position = {
                    lat: parseFloat(data.lat),
                    lng: parseFloat(data.lon),
                };
                self.$refs.mapRef.panTo(self.marker.position);
            }

            //self.geolocate(data);
       
            // alert(data.lat)

            self.dialog = true;
        },
    },
};
</script>