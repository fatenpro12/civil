<!-- Employees -->
<template>
    <div class="component-wrap" :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
        <Create ref="specialtyAdd"></Create>
        <Edit ref="specialtyEdit"></Edit>
        <!-- <v-tabs v-model="tabs" fixed-tabs height="47" class="elevation-3">
            <v-tab :href="'#tab-1'" @click="getStatistics">
                <v-icon>bar_chart</v-icon>
                {{ trans('messages.statistics') }}
            </v-tab>

            <v-tab :href="'#tab-2'">
                <v-icon>filter_list</v-icon>
                {{ trans('messages.filters') }}
            </v-tab>
        </v-tabs>

        <v-tabs-items v-model="tabs">
            <v-divider></v-divider>
            <v-tab-item :value="'tab-1'">
                <v-card flat class="elevation-2">
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout row wrap>
                                <v-flex xs12 sm3 md3 v-if="statistics.users > 0">
                                    <span class="subheading font-weight-medium info--text">
                                        {{ trans('messages.total') }}: {{ statistics.users }}
                                    </span>
                                </v-flex>
                                <v-flex xs12 sm3 md3 v-if="statistics.active > 0">
                                    <span class="subheading font-weight-medium success--text">
                                        {{ trans('messages.active') }}: {{ statistics.active }}
                                    </span>
                                </v-flex>
                                <v-flex xs12 sm3 md3 v-if="statistics.in_active > 0">
                                    <span class="subheading font-weight-medium warning--text">
                                        {{ trans('messages.in_active') }}:
                                        {{ statistics.in_active }}
                                    </span>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item :value="'tab-2'">
                <v-card flat class="elevation-2">
                    <v-card-text>
                        <v-layout>
                            <v-flex xs12 sm12>
                                <v-container grid-list-md>
                                    <v-layout row wrap>
                                        <v-flex xs12 sm6 md6>
                                            <v-text-field
                                                prepend-icon="search"
                                                :label="trans('messages.filter_by_name')"
                                                v-model="filters.name"
                                            ></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6 md6>
                                            <v-text-field
                                                prepend-icon="search"
                                                :label="trans('messages.filter_by_email')"
                                                v-model="filters.email"
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-flex>
                        </v-layout>
                    </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs-items> -->
        <v-card class="mt-3">
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ trans('data.specialties') }}
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn
                    v-if="$can('specialty.create')"
                    :disabled="!checkActive()"
                    @click="create()"
                    style="background-color: #06706d; color: white"
                    class="lighten-1"
                >
                    {{ trans('data.new_specialty') }}
                    <v-icon right dark>add</v-icon>
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <!-- data table -->
            <v-data-table
                v-bind:headers="headers"
                v-bind:pagination.sync="pagination"
                :items="items"
                :total-items="totalItems"
                class="elevation-3"
            >
                <template slot="headerCell" slot-scope="props">
                    <span v-if="props.header.value == 'created_by'">
                        <v-icon small>person</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'email'">
                        <v-icon small>email</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'roles'">
                        <v-icon small>control_point</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'created_at'">
                        <v-icon small>av_timer</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else>{{ props.header.text }}</span>
                </template>
                <template slot="items" slot-scope="props">
                    <td>
                        <div align="center">
                            <v-menu>
                                <v-btn icon slot="activator"> <v-icon>more_vert</v-icon> </v-btn>
                                <v-list>
                                    <v-list-tile
                                        v-if="$can('employee.edit')"
                                        :disabled="!checkActive()"
                                        @click="edit(props.item)"
                                    >
                                        <v-list-tile-title>
                                            <v-icon small class="mr-2"> edit </v-icon>
                                            {{ trans('messages.edit') }}
                                        </v-list-tile-title>
                                    </v-list-tile>
                                    <!-- <v-list-tile
                                        v-if="$can('employee.delete')"
                                        @click="trash(props.item)"
                                        :disabled="!checkActive()"
                                    >
                                        <v-list-tile-title>
                                            <v-icon small class="mr-2"> delete_forever </v-icon>
                                            {{ trans('messages.delete') }}
                                        </v-list-tile-title>
                                    </v-list-tile> -->
                                </v-list>
                            </v-menu>
                        </div>
                    </td>
                    <td>
                        <div align="center">{{ props.item.id }}</div>
                    </td>
                    <td>
                        <div align="center">{{ props.item.name }}</div>
                    </td>

                    <td>
                        <div align="center">{{ props.item.en_name }}</div>
                    </td>
                    <td>
                        <div align="center">{{ props.item.ar_name }}</div>
                    </td>
                    <td>
                        <div align="center">
                            {{ props.item.created_at ? createdDate(props.item.created_at) : '-' }}
                        </div>
                    </td>
                    <td>
                        <div align="center">{{ props.item.specialty_creator?props.item.specialty_creator.name:'' }}</div>
                    </td>
                </template>
            </v-data-table>
        </v-card>
        <br />
        <div align="center">
            <v-btn
                style="background-color: #06706d; color: white"
                @click="$router.go(-1)"
                :loading="loading"
                :disabled="loading"
            >
                {{ trans('messages.back') }}
            </v-btn>
        </div>
        <br />
    </div>
</template>

<script>
import store from '../../store'
import Create from './Create';
import Edit from './Edit';
import _ from 'lodash';
export default {
    components: {
        Create,
        Edit,
    },
    data() {
        const self = this;
        return {
            dialog: false,
            loading: false,
            headers: [
                {
                    text: self.trans('messages.action'),
                    value: false,
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('messages.id'),
                    value: 'id',
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('messages.name'),
                    value: 'name',
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('data.en_name'),
                    value: 'en_name',
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('data.ar_name'),
                    value: 'ar_name',
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('messages.created_at'),
                    value: 'created_at',
                    align: 'center',
                    sortable: false,
                },
                {
                    text: self.trans('data.created_by'),
                    value: 'created_by',
                    align: 'center',
                    sortable: false,
                },
            ],
            items: [],
            totalItems: 0,
            pagination: {
                rowsPerPage: 10,
            },

            tabs: 'tab-1',
            filters: {
                name: '',
            },
        };
    },
    mounted() {
        const self = this;
        self.$eventBus.$on(
            ['SPECIALTY_ADDED', 'SPECIALTY_UPDATED', 'SPECIALTY_DELETED', 'SPECIALTY_ADDED'],
            () => {
                self.loadSpecialties(() => {});
            }
        );
    },
    watch: {
        'pagination.page': function () {
            this.loadSpecialties(() => {});
        },
        'pagination.rowsPerPage': function () {
            this.loadSpecialties(() => {});
        },
        'filters.name': _.debounce(() => {
            const self = this;
            self.loadSpecialties(() => {});
        }, 700),
    },
    methods: {
        create() {
            const self = this;
            self.$refs.specialtyAdd.create();
        },
        edit(item) {
            const self = this;
            self.$refs.specialtyEdit.create(item);
        },
        createdDate(date) {
            const current_datetime = new Date(date);
            return current_datetime.toLocaleDateString('en-US');
        },
        trash(specialty) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                message: self.trans('messages.you_cant_restore_it'),
                okCb: () => {
                    axios
                        .delete('specialty/' + specialty.id)
                        .then(function (response) {
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            self.$eventBus.$emit('SPECIALTY_DELETED');
                        })
                        .catch(function (error) {
                            self.$store.commit('hideLoader');

                            if (error.response) {
                                self.$store.commit('showSnackbar', {
                                    message: error.response.data.msg,
                                    color: response.data.success,
                                });
                            } else if (error.request) {
                                console.log(error.request);
                            } else {
                                console.log('Error', error.message);
                            }
                        });
                },
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },

        loadSpecialties(cb) {
            const self = this;
            let params = {
                page: self.pagination.page,
                per_page: self.pagination.rowsPerPage,
            };

            axios.get('specialty', { params: params }).then(function (response) {
                if (response.data.success === true) {
                    self.items = response.data.msg.data;
                    self.totalItems = response.data.msg.total;
                    self.pagination.totalItems = response.data.msg.total;
                } else {
                    self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });

                    self.$store.commit('hideLoader');
                }
            });
        },
    },
};
</script>
