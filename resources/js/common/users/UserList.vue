<template>
       <v-data-table
                v-bind:headers="headers"
                v-bind:pagination.sync="pagination"
                :items="items"
                :total-items="totalItems"
                class="elevation-3"
            >
                <template slot="headerCell" slot-scope="props">
                    <span v-if="props.header.value == 'name'">
                        <v-icon small>person</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'email'">
                        <v-icon small>email</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'roles'">
                        <v-icon small>control_point</v-icon> {{ props.header.text }}
                    </span>
                    <span v-else-if="props.header.value == 'last_login'">
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
                                    v-if="$can('employee.view')"
                                    @click="
                                        $router.push({
                                            name: 'users.view',
                                            params: { id: props.item.id },
                                        })
                                    "
                                >
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> visibility </v-icon>
                                        {{ trans('messages.view') }}
                                    </v-list-tile-title>
                                </v-list-tile>
                                <v-list-tile
                                    v-if="$can('employee.edit')"
                                     :disabled="!checkActive()"
                                    @click="
                                        $router.push({
                                            name: edit_url,
                                            params: { id: props.item.id },
                                        })
                                    "
                                >
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> edit </v-icon>
                                        {{ trans('messages.edit') }}
                                    </v-list-tile-title>
                                </v-list-tile>
                                <v-list-tile
                                 :disabled="!checkActive()"
                                    v-if="$can('employee.delete')"
                                    @click="$emit('trash',props.item)"
                                >
                                    <v-list-tile-title>
                                        <v-icon small class="mr-2"> delete_forever </v-icon>
                                        {{ trans('messages.delete') }}
                                    </v-list-tile-title>
                                </v-list-tile>
                            </v-list>
                        </v-menu>
                          </div>
                    </td>
                     <td > <div align="center"> {{ props.item.id }}</div> </td>
                  <td > <div align="center"> {{ props.item.name }}</div> </td>
                  <td> <div align="center">{{ props.item.email }}</div></td>
                  <td v-if="getCurrentUser().user_type_log !== 'ESTATE_OWNER'">
                        <div align="center">
                        <span v-for="(role,index) in props.item.roles" :key="index">
                            {{ roleName(role) }}
                        </span>
                        </div>
                    </td>
                       <td v-if="getCurrentUser().user_type_log !== 'ESTATE_OWNER'">
                        <div align="center">{{ props.item.parent && props.item.parent.roles.find(x => x.name ==='Engineering Office Manager')?props.item.parent.name:null }}</div>
                    </td>
                     <td v-if="getCurrentUser().user_type_log === 'ENGINEERING_OFFICE_MANAGER'">
                        <div align="center">
                            <span>
                                {{
                                  props.item.specialty!= null ? props.item.specialty.name : ''
                                }}
                            </span>
                        </div>
                    </td>

                  <td><div align="center"> {{ props.item.last_login | formatDateTime }} </div></td>
                    <td>
                        <div align="center">
                        <v-avatar outline>
                            <v-icon v-if="props.item.active != null" class="green--text"
                                >check_circle</v-icon
                            >
                            <v-icon class="grey--text" v-else>error_outline</v-icon>
                        </v-avatar>
                        </div>
                    </td>
                </template>
            </v-data-table>
</template>

<script>
export default {
props:{
    headers: [],
    edit_url: null
},
data(){
 return {
    items:[],
    totalItems: null,
    pagination: {
                rowsPerPage: 10,
            },
 }
},
watch:{
     'pagination.page': function() {
            this.$emit('page',this.pagination)
        },
        'pagination.rowsPerPage': function() {
          this.$emit('rowsPerPage',this.pagination)
        },
},
methods:{
          roleName(role) {
            var name = [];

           // if (role.type == 'employee' || role.type == null) {
                name.push(role.name[0].toUpperCase() + role.name.slice(1));
           // }

            return name.join();
        },
           loadUsers(url, name,email) {
            const self = this;

            let params = {
                name: name,
                email: email,
                page: self.pagination.page,
                per_page: self.pagination.rowsPerPage,
            };

            axios.get(url, { params: params }).then(function(response) {
                self.items = response.data.data;
                self.totalItems = response.data.total;
                self.pagination.totalItems = response.data.total;
            });
        },
}
}
</script>