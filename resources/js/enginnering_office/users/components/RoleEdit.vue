<template>
    <div class="component-wrap" :class="$vuetify.breakpoint.xsOnly?'pt-4':''">
        <v-card>
            <v-card-title>
                <v-icon medium>control_point</v-icon>
                <span class="headline">
                    {{ trans('messages.edit_role') }}
                </span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-layout row wrap>
                    <v-flex xs12 sm6 md6>
                        <v-text-field
                            v-model="role_name"
                            :label="trans('messages.role_name')"
                            v-validate="'required'"
                            data-vv-name="role_name"
                            :data-vv-as="trans('messages.role_name')"
                            :error-messages="errors.collect('role_name')"
                            required
                        ></v-text-field>
                    </v-flex>

                    <v-flex xs12 sm6 md6 style="padding-left: 5%">
                        <v-checkbox :label="trans('data.is_primary')" v-model="is_primary">
                        </v-checkbox>
                    </v-flex>
                </v-layout>
                <v-container grid-list-md>
                    <v-layout row>
                        <v-flex xs12 sm12 md12>
                            <v-icon small> control_point_duplicate </v-icon>
                            <span class="subheading">
                                {{ trans('messages.permissions') }}
                            </span>
                        </v-flex>
                    </v-layout>
                    <v-divider
                        class="mt-1"
                        v-if="
                            $can('role.view') ||
                            $can('role.create') ||
                            $can('role.edit') ||
                            $can('role.delete')
                        "
                    ></v-divider>

                    <v-layout row wrap class="mt-3">
                        <v-flex xs12 sm3 md3>
                            <h4>{{ trans('data.Roles') }}</h4>
                        </v-flex>

                        <v-flex
                            xs12
                            sm5
                            md5
                            v-if="
                                $can('role.view') ||
                                $can('role.create') ||
                                $can('role.edit') ||
                                $can('role.delete')
                            "
                        >
                            <v-checkbox
                                v-if="$can('role.create')"
                                v-model="permissions"
                                :label="trans('data.create_role')"
                                value="role.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('role.edit')"
                                v-model="permissions"
                                :label="trans('data.edit_role')"
                                value="role.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('role.view')"
                                v-model="permissions"
                                :label="trans('data.view_role')"
                                value="role.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('role.delete')"
                                v-model="permissions"
                                :label="trans('data.delete_role')"
                                value="role.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                        <v-flex
                            xs12
                            sm4
                            md4
                            v-if="
                                $can('employeeNote.edit') ||
                                $can('employeeNote.view') ||
                                $can('employeeNote.delete') ||
                                $can('employeeNote.create')
                            "
                        >
                            <v-checkbox
                                v-if="$can('employeeNote.create')"
                                v-model="permissions"
                                :label="trans('messages.add_employee_note')"
                                value="employeeNote.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('employeeNote.view')"
                                v-model="permissions"
                                :label="trans('messages.view_employee_note')"
                                value="employeeNote.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('employeeNote.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_employee_note')"
                                value="employeeNote.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('employeeNote.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_employee_note')"
                                value="employeeNote.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>

                    <v-divider
                        class="mt-1"
                        v-if="
                            $can('employee.edit') ||
                            $can('employee.view') ||
                            $can('employee.delete') ||
                            $can('employee.create')
                        "
                    ></v-divider>
                    <v-layout row wrap class="mt-3">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('employee.edit') ||
                                $can('employee.view') ||
                                $can('employee.delete') ||
                                $can('employee.create')
                            "
                        >
                            <h4>{{ trans('messages.employee') }}</h4>
                        </v-flex>
                        <v-flex xs12 sm4 md4>
                            <v-checkbox
                                v-if="$can('employee.create')"
                                v-model="permissions"
                                :label="trans('messages.add_employee')"
                                value="employee.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('employee.view')"
                                v-model="permissions"
                                :label="trans('messages.view_employee')"
                                value="employee.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('employee.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_employee')"
                                value="employee.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('employee.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_employee')"
                                value="employee.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                        <v-flex
                            xs12
                            sm5
                            md5
                            v-if="
                                $can('employeeNote.edit') ||
                                $can('employeeNote.view') ||
                                $can('employeeNote.delete') ||
                                $can('employeeNote.create')
                            "
                        >
                            <v-checkbox
                                v-if="$can('employeeNote.create')"
                                v-model="permissions"
                                :label="trans('messages.add_employee_note')"
                                value="employeeNote.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('employeeNote.view')"
                                v-model="permissions"
                                :label="trans('messages.view_employee_note')"
                                value="employeeNote.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('employeeNote.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_employee_note')"
                                value="employeeNote.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('employeeNote.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_employee_note')"
                                value="employeeNote.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>
                    <v-divider
                        v-if="
                            $can('customer.edit') ||
                            $can('customer.view') ||
                            $can('customer.delete') ||
                            $can('customer.create')
                        "
                    ></v-divider>

                    <v-layout row wrap class="mt-2">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('customer.edit') ||
                                $can('customer.view') ||
                                $can('customer.delete') ||
                                $can('customer.create')
                            "
                        >
                            <h4>{{ trans('messages.customer') }}</h4>
                        </v-flex>
                        <v-flex xs12 sm3 md3>
                            <v-checkbox
                                v-if="$can('customer.create')"
                                v-model="permissions"
                                :label="trans('messages.add_customer')"
                                value="customer.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('customer.view')"
                                v-model="permissions"
                                :label="trans('messages.view_customer')"
                                value="customer.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('customer.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_customer')"
                                value="customer.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('customer.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_customer')"
                                value="customer.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('contact.edit') ||
                                $can('contact.view') ||
                                $can('contact.delete') ||
                                $can('contact.create')
                            "
                        >
                            <v-checkbox
                                v-if="$can('contact.create')"
                                v-model="permissions"
                                :label="trans('messages.add_contact')"
                                value="contact.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('contact.view')"
                                v-model="permissions"
                                :label="trans('messages.view_contact')"
                                value="contact.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('contact.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_contact')"
                                value="contact.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('contact.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_contact')"
                                value="contact.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('customerNote.edit') ||
                                $can('customerNote.view') ||
                                $can('customerNote.delete') ||
                                $can('customerNote.create')
                            "
                        >
                            <v-checkbox
                                v-if="$can('customerNote.create')"
                                v-model="permissions"
                                :label="trans('messages.add_customer_note')"
                                value="customerNote.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('customerNote.view')"
                                v-model="permissions"
                                :label="trans('messages.view_customer_note')"
                                value="customerNote.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('customerNote.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_customer_note')"
                                value="customerNote.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('customerNote.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_customer_note')"
                                value="customerNote.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>
                    <v-divider
                        v-if="
                            $can('knowledge_base.edit') ||
                            $can('knowledge_base.view') ||
                            $can('knowledge_base.delete') ||
                            $can('knowledge_base.create')
                        "
                    ></v-divider>

                    <v-layout row wrap class="mt-2">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('knowledge_base.edit') ||
                                $can('knowledge_base.view') ||
                                $can('knowledge_base.delete') ||
                                $can('knowledge_base.create')
                            "
                        >
                            <h4>{{ trans('messages.knowladge_base') }}</h4>
                        </v-flex>
                        <v-flex xs12 sm3 md3>
                            <v-checkbox
                                v-if="$can('knowledge_base.create')"
                                v-model="permissions"
                                :label="trans('messages.add_knowledge_base')"
                                value="knowledge_base.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('knowledge_base.view')"
                                v-model="permissions"
                                :label="trans('messages.view_knowledge_base')"
                                value="knowledge_base.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('knowledge_base.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_knowledge_base')"
                                value="knowledge_base.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('knowledge_base.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_knowledge_base')"
                                value="knowledge_base.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>
                    <v-divider
                        v-if="
                            $can('expense.edit') || $can('expense.delete') || $can('expense.create')
                        "
                    ></v-divider>

                    <v-layout row wrap class="mt-2">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('expense.edit') ||
                                $can('expense.delete') ||
                                $can('expense.create')
                            "
                        >
                            <h4>{{ trans('messages.expense') }}</h4>
                        </v-flex>
                        <v-flex xs12 sm3 md3>
                            <v-checkbox
                                v-if="$can('expense.create')"
                                v-model="permissions"
                                :label="trans('messages.add_expense')"
                                value="expense.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('expense.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_expense')"
                                value="expense.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('expense.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_expense')"
                                value="expense.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>
                    <v-divider
                        v-if="$can('leaves.edit') || $can('leaves.delete') || $can('leaves.create')"
                    ></v-divider>

                    <v-layout row wrap class="mt-2">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('leaves.edit') ||
                                $can('leaves.delete') ||
                                $can('leaves.create')
                            "
                        >
                            <h4>{{ trans('messages.leaves') }}</h4>
                        </v-flex>
                        <v-flex xs12 sm3 md3>
                            <v-checkbox
                                v-if="$can('leaves.create')"
                                v-model="permissions"
                                :label="trans('messages.add_leaves')"
                                value="leaves.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('leaves.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_leaves')"
                                value="leaves.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('leaves.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_leaves')"
                                value="leaves.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>
                    <v-divider
                        v-if="
                            $can('tickets.edit') ||
                            $can('tickets.delete') ||
                            $can('tickets.create') ||
                            $can('tickets.view')
                        "
                    ></v-divider>

                    <v-layout row wrap class="mt-2">
                        <v-flex xs12 sm3 md3>
                            <h4>{{ trans('messages.tickets') }}</h4>
                        </v-flex>
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('tickets.edit') ||
                                $can('tickets.delete') ||
                                $can('tickets.create') ||
                                $can('tickets.view')
                            "
                        >
                            <v-checkbox
                                v-if="$can('tickets.create')"
                                v-model="permissions"
                                :label="trans('messages.add_ticket')"
                                value="tickets.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('tickets.view')"
                                v-model="permissions"
                                :label="trans('messages.view_ticket')"
                                value="tickets.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('tickets.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_ticket')"
                                value="tickets.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('tickets.delete')"
                                v-model="permissions"
                                :label="trans('messages.delete_ticket')"
                                value="tickets.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>
                    <v-divider
                        v-if="
                            $can('project.edit') ||
                            $can('project.delete') ||
                            $can('project.create') ||
                            $can('project.list')
                        "
                    ></v-divider>
                    <v-layout row wrap class="mt-2">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('project.edit') ||
                                $can('project.delete') ||
                                $can('project.create') ||
                                $can('project.list')
                            "
                        >
                            <h4>{{ trans('messages.project') }}</h4>
                        </v-flex>
                        <v-flex xs12 sm3 md3>
                            <v-checkbox
                                v-if="$can('project.create')"
                                v-model="permissions"
                                :label="trans('messages.add_project')"
                                value="project.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('project.list')"
                                v-model="permissions"
                                :label="trans('messages.view_project')"
                                value="project.list"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('project.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_project')"
                                value="project.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('project.delete')"
                                v-model="permissions"
                                :label="trans('data.delete_project')"
                                value="project.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>

                    <v-divider
                        v-if="
                            $can('report.edit') ||
                            $can('report.delete') ||
                            $can('report.create') ||
                            $can('report.view')
                        "
                    ></v-divider>
                    <v-layout row wrap class="mt-2">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('report.edit') ||
                                $can('report.delete') ||
                                $can('report.create') ||
                                $can('report.view')
                            "
                        >
                            <h4>{{ trans('data.report') }}</h4>
                        </v-flex>
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('report.edit') ||
                                $can('report.delete') ||
                                $can('report.create') ||
                                $can('report.view')
                            "
                        >
                            <v-checkbox
                                v-if="$can('report.create')"
                                v-model="permissions"
                                :label="trans('data.add_report')"
                                value="report.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('report.view')"
                                v-model="permissions"
                                :label="trans('data.view_report')"
                                value="report.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('report.edit')"
                                v-model="permissions"
                                :label="trans('data.edit_report')"
                                value="report.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('report.delete')"
                                v-model="permissions"
                                :label="trans('data.delete_report')"
                                value="report.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-divider
                        v-if="
                            $can('task.edit') ||
                            $can('task.delete') ||
                            $can('task.create') ||
                            $can('task.view')
                        "
                    ></v-divider>
                    <v-layout row wrap class="mt-2">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('task.edit') ||
                                $can('task.delete') ||
                                $can('task.create') ||
                                $can('task.view')
                            "
                        >
                            <h4>{{ trans('data.task') }}</h4>
                        </v-flex>
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('task.edit') ||
                                $can('task.delete') ||
                                $can('task.create') ||
                                $can('task.view')
                            "
                        >
                            <v-checkbox
                                v-if="$can('task.create')"
                                v-model="permissions"
                                :label="trans('data.add_task')"
                                value="task.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('task.view')"
                                v-model="permissions"
                                :label="trans('data.view_task')"
                                value="task.view"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('task.edit')"
                                v-model="permissions"
                                :label="trans('data.edit_task')"
                                value="task.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('task.delete')"
                                v-model="permissions"
                                :label="trans('data.delete_task')"
                                value="task.delete"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-layout row wrap class="mt-2">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="$can('setting') || $can('profile.edit') || $can('sales.invoices')"
                        >
                            <h4>{{ trans('messages.other') }}</h4>
                        </v-flex>
                        <v-flex xs12 sm3 md3>
                            <v-checkbox
                                v-if="$can('setting')"
                                v-model="permissions"
                                :label="trans('messages.system_setting')"
                                value="setting"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('profile.edit')"
                                v-model="permissions"
                                :label="trans('messages.edit_profile')"
                                value="profile.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('sales.invoices')"
                                v-model="permissions"
                                :label="trans('messages.view_sales')"
                                value="sales.invoices"
                            >
                            </v-checkbox>
                        </v-flex>
                    </v-layout>

                     <v-divider
                        v-if="
                            $can('specialty.edit') ||
                            $can('specialty.delete') ||
                            $can('specialty.create') ||
                            $can('specialty.view')
                        "
                    ></v-divider>
                    <v-layout row wrap class="mt-2">
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('specialty.edit') ||
                                $can('specialty.delete') ||
                                $can('specialty.create') ||
                                $can('specialty.view')
                            "
                        >
                            <h4>{{ trans('data.specialty') }}</h4>
                        </v-flex>
                          
                        <v-flex
                            xs12
                            sm3
                            md3
                            v-if="
                                $can('specialty.edit') ||
                                $can('specialty.delete') ||
                                $can('specialty.create') ||
                                $can('specialty.view')
                            "
                        >
                            <v-checkbox
                                v-if="$can('specialty.create')"
                                v-model="permissions"
                                :label="trans('data.add_specialty')"
                                value="specialty.create"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('specialty.view')"
                                v-model="permissions"
                                :label="trans('data.view_specialty')"
                                value="specialty.view"
                            >
                            </v-checkbox>  
                        
                           
                            <!-- <v-checkbox
                                v-if="$can('specialty.edit')"
                                v-model="permissions"
                                :label="trans('data.edit_tspecialty')"
                                value="specialty.edit"
                            >
                            </v-checkbox>
                            <v-checkbox
                                v-if="$can('specialty.delete')"
                                v-model="permissions"
                                :label="trans('data.delete_specialty')"
                                value="specialty.delete"
                            >
                            </v-checkbox> -->
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                </v-container>
            </v-card-text>
            <v-layout justify-center>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="success"
                        @click="store"
                        :loading="loading"
                        :disabled="loading || !checkActive()"
                    >
                        {{ trans('messages.update') }}
                    </v-btn>
                    <v-btn style="color: #06706d" @click="$router.go(-1)">
                        {{ trans('messages.back') }}
                    </v-btn>
                </v-card-actions>
            </v-layout>
        </v-card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            role_name: '',
            loading: false,
            permissions: [],
            is_primary: '',
            roleId: null,
        };
    },
    created() {
        const self = this;
        self.roleId = self.$route.params.id;
        self.getRole(self.roleId);
    },
    methods: {
        getRole(role_id) {
            const self = this;
            axios
                .get('/enginner_office/roles/' + role_id + '/edit')
                .then(function (response) {
                    self.role_name = response.data.role.name;
                    self.is_primary = response.data.role.is_primary;
                    self.permissions = response.data.permissions;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        store() {
            const self = this;
            let data = {
                name: self.role_name,
                permissions: self.permissions,
                is_primary: self.is_primary,
            };
            self.$validator.validateAll().then((result) => {
                if (result == true) {
                    self.loading = true;
                    axios
                        .put('/enginner_office/roles/' + self.roleId, data)
                        .then(function (response) {
                            self.loading = false;
                            self.$validator.reset();
                            self.$store.commit('showSnackbar', {
                                message: response.data.msg,
                                color: response.data.success,
                            });

                            if (response.data.success === true) {
                                self.goBack();
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            });
        },
    },
};
</script>
