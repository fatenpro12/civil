import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        // breadcrumbs
        countPendingRoles: 0,
        breadcrumbs: [],

        // loader
        showLoader: false,

        // snackbar
        showSnackbar: false,
        snackbarMessage: '',
        snackbarColor: '',
        snackbarDuration: 100,
        countDedignRequest:0,
        countContractorRequest:0,
        countServiceRequest:0,
        // dialog
        dialogShow: false,
        dialogType: '',
        dialogTitle: '',
        dialogMessage: '',
        dialogIcon: null,
        countVisitRequest:0,
        countRoleRequest:0,
        dialogOkCb: () => {},
        dialogCancelCb: () => {},
        drawer: true,
    },
    mutations: {
        // breadcrumbs
        setBreadcrumbs(state, items) {
            items.unshift({ label: 'Home', name: 'dashboard' });
            state.breadcrumbs = items;
        },
        setCountPendingRoles(state){
            axios
            .get('/requests-role')
            .then(function (response) {
            state.countPendingRoles = response.data.data.filter(x=>x.status == 'pending').length
            
            })
            .catch(function (error) {
                console.log(error);
            });

        },
        setRequests(state,url){
            axios
            .get('getRequestsCount')
            .then(function (response) {
               //  state.countDedignRequest = response.data.msg.data.filter(x=>x.status == 'sent').length
                 state.countDedignRequest = response.data.countDesignRequest
                 state.countContractorRequest = response.data.countContractorRequest
                 state.countServiceRequest = response.data.countServicesRequest
                 state.countVisitRequest = response.data.countVisitsRequest
                 state.countRoleRequest = response.data.countRolesRequest
            });
        },
        // loader
        showLoader(state) {
            state.showLoader = true;
        },
        hideLoader(state) {
            state.showLoader = false;
        },

        // snackbar
        showSnackbar(state, data) {
            if (data.color == true) {
                data.color = 'success';
            }

            if (data.color == false) {
                data.color = 'error';
            }

            state.snackbarDuration = data.duration || 3000;
            state.snackbarMessage = data.message || 'No message.';
            state.snackbarColor = data.color || 'info';
            state.showSnackbar = true;
        },
        hideSnackbar(state) {
            state.showSnackbar = false;
        },

        // dialog
        showDialog(state, data) {
            state.dialogType = data.type || 'confirm';
            state.dialogTitle = data.title;
            state.dialogMessage = data.message;
            state.dialogIcon = data.icon || null;
            state.dialogOkCb = data.okCb || function() {};
            state.dialogCancelCb = data.cancelCb || function() {};
            state.dialogShow = true;
        },
        hideDialog(state) {
            state.dialogShow = false;
        },
        dialogOk(state) {
            state.dialogOkCb();
            state.dialogShow = false;
        },
        dialogCancel(state) {
            state.dialogCancelCb();
            state.dialogShow = false;
        },
        drawer(state, data) {
            state.drawer = data.drawer;
        },
        drawerToggle(state) {
            state.drawer = !state.drawer;
        },
    },
    getters: {
        // get breadcrumbs
        getBreadcrumbs: state => {
            return state.breadcrumbs;
        },

        getCountPendingRoles: state => {
            return state.countPendingRoles;
        },

        // loader
        showLoader: state => {
            return state.showLoader;
        },

        // snackbar
        showSnackbar: state => {
            return state.showSnackbar;
        },
        snackbarMessage: state => {
            return state.snackbarMessage;
        },
        snackbarColor: state => {
            return state.snackbarColor;
        },
        snackbarDuration: state => {
            return state.snackbarDuration;
        },

        // dialog
        showDialog: state => {
            return state.dialogShow;
        },
        dialogType: state => {
            return state.dialogType;
        },
        dialogTitle: state => {
            return state.dialogTitle;
        },
        dialogMessage: state => {
            return state.dialogMessage;
        },
        dialogIcon: state => {
            return state.dialogIcon;
        },
        drawer: state => {
            return state.drawer;
        },
        drawerToggle: state => {
            return state.drawer;
        },
    },
});
