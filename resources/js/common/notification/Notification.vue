<template>
    <div class="component-wrap">
        <TaskShow ref="taskShow"></TaskShow>
        <v-menu offset-y min-width="400">
            <v-btn flat icon slot="activator" @click="markAsRead">
                <v-badge overlap right color="red">
                    <template slot="badge" v-if="notifications_count > 0">
                        <span> {{ notifications_count }} </span>
                    </template>
                    <v-icon :color="colorIcon" medium>notifications</v-icon>
                </v-badge>
            </v-btn>
            
            <v-list
                three-line
                dense
                v-if="notifications.length > 0"
                style="max-height: 400px"
                class="scroll-y"
            >
                <div v-for="(notification, index) in notifications" :key="index">
                    <!-- project notification -->

                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type == 'App\\Notifications\\AskPermissionNotification'
                        "
                        @click="
                            $router.push({
                                name: 'requests_role.list',
                                //  params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.user_admin.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.user_admin.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.ask_permission_notification_text', {
                                        user_name: notification.user.name,
                                        permission_name: notification.data['permission_name'],
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\AcceptedPermissionNotification'
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.requester.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.requester.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.accept_permission_notification_text', {
                                        user_name: notification.user.name,
                                        permission_name: notification.data['permission_name'],
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\RejectedPermissionNotification'
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.requester.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.requester.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.reject_permission_notification_text', {
                                        user_name: notification.user.name,
                                        permission_name: notification.data['permission_name'],
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\ProjectRequestCreatedNotification'
                        "
                        @click="
                            $router.push({
                                /*   $router.push({
                                //
                                name: 'view_visit_enginner_office_request_list',
                                params: { id: notification.data['request_id'] },
                            })*/
                                name: 'visit_request_enginner_office_list',
                                params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.project.creator)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.office.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.recieve_new_visit_request', {
                                        project_name: notification.project.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
<v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\AcceptProjectFromOwner'
                        "
                        @click="
                            $router.push({
                            
                                name: 'projects.list'
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.project.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.estate.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.accepted_project', {
                                        project: notification.project.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\RejectProjectFromOwner'
                        "
                        @click="
                            $router.push({
                            
                                name: 'projects.list'
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.project.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.estate.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.rejected_project', {
                                        project: notification.project.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile
                        v-if="
                            notification.type && notification.project &&
                            notification.type == 'App\\Notifications\\ProjectCreatedNotification'
                        "
                        @click="
                            $router.push({
                                name: 'view_project',
                                params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.project.creator)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.project.creator.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title v-if="getCurrentUser().id === notification.project.created_by">
                                {{
                                    trans('messages.project_notification_text_for_creater', {
                                        project_name: notification.project.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                               <v-list-tile-sub-title v-else>
                                {{
                                    trans('messages.project_notification_text', {
                                        project_name: notification.project.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <v-list-tile
                        v-if="
                            notification.type && notification.project &&
                            notification.type == 'App\\Notifications\\ProjectEditedNotification'
                        "
                        @click="
                            $router.push({
                                name: 'view_project',
                                params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.project.creator)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.user.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.project_edit_notification_text', {
                                        project_name: notification.project.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <!-- request engineering office -->

                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\AcceptedRequestOfficeNotification'
                        "
                        @click="
                            $router.push({
                                //name: 'projects.project-tasks.list',
                                name: 'visit_request_estate_list'//'visit_request_list',
                                //params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.office.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.office.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.office_accept_notification_text', {
                                        office: notification.office.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\RejectedRequestOfficeNotification'
                        "
                        @click="
                            $router.push({
                                //name: 'projects.project-tasks.list',
                                name: 'visit_request_estate_list'//'visit_request_list',
                                //params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.office.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.office.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.office_reject_notification_text', {
                                        office: notification.office.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
      <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\RequestSenderNotification'
                        "
                        @click="requestSenderRoute(notification)"
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.estate.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.request_send_success', {
                                        request: notification.request_id,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <!-- task notification -->

                     <!-- request contracting office contractor_request_engineering_list-->
 <v-list-tile
                        v-if="
                            notification.type && 
                            getCurrentUser().user_type_log == 'ESTATE_OWNER' &&
                            notification.type ==
                                'App\\Notifications\\AcceptRequestSendedFromContractor'
                        "
                        @click="
                            $router.push({
                                //name: 'projects.project-tasks.list',
                                name: 'contractor_request_estate_list',
                                //params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.office.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.office.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.office_accept_notification_text', {
                                        office: notification.office.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    
                     <v-list-tile
                        v-if="
                            notification.type && 
                            getCurrentUser().user_type_log == 'ENGINEERING_OFFICE_MANAGER' &&
                            notification.type ==
                                'App\\Notifications\\AcceptRequestSendedFromContractor'
                        "
                        @click="
                            $router.push({
                                name: 'contractor_request_engineering_list',
                                //params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.office.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.office.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.office_accept_notification_text', {
                                        office: notification.office.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                     <!-- end request -->
                            <!-- request support service office -->
 <v-list-tile
                        v-if="
                            notification.type &&
                             getCurrentUser().user_type_log == 'ESTATE_OWNER' &&
                            notification.type ==
                                'App\\Notifications\\AcceptRequestSendedFromSupportServiceOffice'
                        "
                        @click="
                            $router.push({
                                //name: 'projects.project-tasks.list',
                                name: 'support-service_estate_list',
                                //params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.office.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.office.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.office_accept_notification_text', {
                                        office: notification.office.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                     <v-list-tile
                        v-if="
                            notification.type &&
                            getCurrentUser().user_type_log == 'ENGINEERING_OFFICE_MANAGER' &&
                            notification.type ==
                                'App\\Notifications\\AcceptRequestSendedFromSupportServiceOffice'
                        "
                        @click="
                            $router.push({
                                //name: 'projects.project-tasks.list',
                                name: 'support-service_engineer_list',
                                //params: { id: notification.project.id },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.office.name)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.office.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.office_accept_notification_text', {
                                        office: notification.office.name,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                     <!-- end request -->
                    <v-list-tile
                        @click="view(notification.task)"
                        v-if="
                            notification.type &&
                            notification.type == 'App\\Notifications\\TaskCreatedNotification'
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.task.task_creator)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.task.task_creator.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.task_notification_text', {
                                        task_subject: notification.task.subject,
                                    })
                                }}
                            </v-list-tile-sub-title>
                            <v-list-tile-sub-title>
                                {{ trans('messages.project') }} :
                                {{ notification.task.project.name }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <!-- leave notification (applied)-->
                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type == 'App\\Notifications\\LeaveApplied'
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.applicant)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.applicant.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{ trans('messages.leave_applied_notification_text') }}
                            </v-list-tile-sub-title>
                            <v-list-tile-sub-title>
                                {{ trans('messages.date') }} :
                                {{ notification.leave.start_date | formatDate }}
                                {{ trans('messages.to') }}
                                {{ notification.leave.end_date | formatDate }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <!-- leave notification (responded)-->
                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type == 'App\\Notifications\\LeaveResponded'
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.answered_by)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.answered_by.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{ trans('messages.leave_answered_notification_text') }}
                            </v-list-tile-sub-title>
                            <v-list-tile-sub-title>
                                {{ trans('messages.status') }} :
                                <span class="text-capitalize">
                                    {{ notification.leave_answered.status }}
                                </span>
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <!-- reminder -->
                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type == 'App\\Notifications\\SendReminderNotification'
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.remind_to)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-capitalize font-weight-bold">
                                    {{ notification.remind_to.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.reminder.remind_on | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                <span class="text-capitalize font-weight-bold">
                                    {{ trans('messages.reminder_notification_text') }}
                                </span>
                            </v-list-tile-sub-title>
                            <v-list-tile-sub-title>
                                <span class="text-capitalize"
                                    >{{ notification.reminder.remind_for }}
                                </span>
                            </v-list-tile-sub-title>
                            <v-list-tile-sub-title>
                                <span class="text-capitalize">
                                    {{ trans('messages.lead') }} : {{ notification.lead.company }}
                                </span>
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <!-- ticket created -->
                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type == 'App\\Notifications\\TicketCreated'
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                        @click="
                            $router.push({
                                name: 'tickets.view',
                                params: { id: notification.ticket.id },
                            })
                        "
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.created_by)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-capitalize font-weight-bold">
                                    {{ notification.created_by.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                <span
                                    v-html="
                                        trans('messages.created_ticket', {
                                            ref_no: notification.ticket.reference_no,
                                        })
                                    "
                                ></span>
                            </v-list-tile-sub-title>
                            <v-list-tile-sub-title>
                                <span class="text-capitalize">
                                    {{ trans('messages.title') }} : {{ notification.ticket.title }}
                                </span>
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <!--design reuquest  !-->

                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type == 'App\\Notifications\\ShowDesignRequestOffer'
                        "
                        @click="
                            $router.push({
                             //   name: 'show_design_request_price_estate_list',
                                name: 'design_request_estate_list',
                                params: { id: notification.data['design_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.project.creator)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.enginner.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.design_request_offer_notification_text', {
                                        stage: notification.stage.value,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <!------------------------------------Accepted design----------------------------------------------------!-->
                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\AcceptDesignRequestByEstateOwner'
                        "
                        @click="
                            $router.push({
                                name: 'design_request_enginnering_office_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.estate.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.design_request_accept_notification_text', {
                                        stage: notification.stage.value,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                      <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\AcceptContractorRequestByEstateOwner'
                        "
                        @click="
                            $router.push({
                                name: 'contractor_request_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.estate.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.contractor_request_accept_notification_text', {
                                    
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                        <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\AcceptSupportServiceOfficeRequestByEstateOwner'
                        "
                        @click="
                            $router.push({
                                name: 'support_service_request_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.estate.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.support_request_accept_notification_text', {
                                        
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                    <!------------------------------------rejected design----------------------------------------------------!-->
                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\RejectDesignRequestByEstateOwner'
                        "
                        @click="
                            $router.push({
                                name: 'design_request_enginnering_office_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                         <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar> >

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    <!-- {{ notification.estate.name }} -->
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.design_request_reject_notification_text', {
                                        stage: notification.stage.value,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile> 
                       <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\RejectContractorRequestByEstateOwner'
                        "
                        @click="
                            $router.push({
                                name: 'contractor_request_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                         <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar> >

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    <!-- {{ notification.estate.name }} -->
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.contractor_request_reject_notification_text', {
                                        
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile> 
                       <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\RejectSupportServiceOfficeRequestByEstateOwner'
                        "
                        @click="
                            $router.push({
                                name: 'support_service_request_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                         <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar> >

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    <!-- {{ notification.estate.name }} -->
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.RejectSupportServiceOfficeRequestByEstateOwner', {
                                       
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile> 
                    <!------------------------------------senf design to employee design----------------------------------------------------!-->

                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type =='App\\Notifications\\DesignRequestSendedToEmployees'"
                        @click="
                            $router.push({
                                name: 'design_request_enginnering_office_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.office)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.office.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.design_request_send_to_employee_notification_text', {
                                         stage: notification.stage.value,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
<!------------------------------------senf design to office----------------------------------------------------!-->
 <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type =='App\\Notifications\\DesignRequestEngineerRejected'"
                        @click="
                            $router.push({
                                name: 'design_request_estate_list',
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.office)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.office.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.design_request_send_to_owner_notification_text', {
                                     office: notification.office.name
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\AskDesignRequestOffer'" 
                        @click="
                            $router.push({
                                name: 'design_request_enginnering_office_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.estate.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.ask_for_design_request_enginnering_office_notification_text', {
                                      //  stage: notification.stage.value,
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                       <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\AskContractorRequestOffer'" 
                        @click="
                            $router.push({
                                name: 'contractor_request_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.estate.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.ask_for_contracting_company_notification_text', {
                                      
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                      <v-list-tile
                        v-if="
                            notification.type &&
                            notification.type ==
                                'App\\Notifications\\AskSupportServiceRequestOffer'" 
                        @click="
                            $router.push({
                                name: 'support_service_request_list',
                                // params: { id: notification.data['design_enginner_id'] },
                            })
                        "
                        :style="notificationBackgroundColor(notification.read_at)"
                        avatar
                    >
                        <v-list-tile-avatar>
                            <avatar
                                :members="convertObjectToArray(notification.estate)"
                                :tooltip="true"
                            >
                            </avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                <span class="text-uppercase font-weight-bold">
                                    {{ notification.estate.name }}
                                </span>
                                <span class="pl-5">
                                    {{ notification.created_at | formatDateTime }}
                                </span>
                            </v-list-tile-title>
                            <v-list-tile-sub-title>
                                {{
                                    trans('messages.ask_for_support_service_office_notification_text', {
                                       
                                    })
                                }}
                            </v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-divider v-if="index + 1 < notifications.length" :key="index"></v-divider>
                </div>
                <v-list-tile>
                    <v-btn
                        outline
                        small
                        color="info"
                        dark
                        block
                        v-if="!_.isNull(url)"
                        @click="markAsRead"
                    >
                        {{ trans('messages.load_more') }}
                    </v-btn>
                </v-list-tile>
            </v-list>
            <v-list v-else>
                <v-list-tile>
                    <v-list-tile-content>
                        <v-list-tile-title>
                            <p v-if="loading" class="text-md-center font-weight-medium">
                                {{ trans('messages.loading') }}
                            </p>

                            <p
                                v-if="notifications.length == 0 && loading == false"
                                class="text-md-center font-weight-medium"
                            >
                                {{ trans('messages.no_notification_found') }}
                            </p>
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-menu>
    </div>
</template>
<script>
import TaskShow from '../projects/tasks/Show';
export default {
    components: {
        TaskShow,
    },
    props:{
colorIcon: null
    },
    data() {
        return {
            notifications_count: null,
            badgeColor: {
                color: 'red',
            },
            notifications: [],
            url: null,
            loading: false,
        };
    },
    mounted: function () {
        const self = this;
        self.url = '/notifications-mark-as-read';
        self.getNotificationsFromApi();
       
        setInterval(() => {
            self.getNotificationsFromApi();
        }, APP.NOTIFICATION_REFRESH_TIMEOUT);
    },
    methods: {
        requestSenderRoute(item){
            let name= ''
            if(item.request_type == 'design request')
            name = this.getCurrentUser().user_type_log === 'ESTATE_OWNER'?'design_request_estate_list':'design_request_enginnering_office_list'
             if(item.request_type == 'visit request')
            name = this.getCurrentUser().user_type_log === 'ESTATE_OWNER'?'visit_request_estate_list':'visit_request_enginner_office_list'
              if(item.request_type == 'contractor request')
            name = this.getCurrentUser().user_type_log === 'ESTATE_OWNER'?'contractor_request_estate_list':'contractor_request_engineering_list'
              if(item.request_type == 'service request')
            name = this.getCurrentUser().user_type_log === 'ESTATE_OWNER'?'support-service_estate_list':'support-service_engineer_list'
              if(item.request_type == 'role request')
            name = 'requests_role_common.list'
this.$router.push({
                                //name: 'projects.project-tasks.list',
                                name: name//'visit_request_list',
                                //params: { id: notification.project.id },
                            })
        },
        getNotificationsFromApi() {
            const self = this;
            axios
                .get('/notifications')
                .then(function (response) {
                    self.notifications_count = response.data;
                     
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        markAsRead() {
            const self = this;

            self.loading = true;
            if (self.url == null) {
                self.url = '/notifications-mark-as-read';
                self.notifications = [];
            }

            axios
                .get(self.url)
                .then(function (response) {
                    self.loading = false;
                    if(self.getCurrentUser().user_type_log == 'ESTATE_OWNER')
                    self.notifications = _.concat(self.notifications, 
                    response.data.data.filter(val => val.type != 'App\\Notifications\\AskDesignRequestOffer' && val.type != 'App\Notifications\ProjectRequestCreatedNotification'));
                    else
                    self.notifications = _.concat(self.notifications, response.data.data);
                    console.log(self.notifications)
                    self.url = _.get(response, 'data.next_page_url', null);
                    self.getNotificationsFromApi();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        view(task) {
            const self = this;
            self.$refs.taskShow.view(task);
        },
        notificationBackgroundColor(type) {
            if (type != null) {
                return { opacity: '0.6' };
            }
        },
        convertObjectToArray(notificationObject) {
            var user = [];

            user.push(notificationObject);

            return user;
        },
    },
};
</script>
