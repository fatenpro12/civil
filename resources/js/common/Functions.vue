<script>
import store from '../store'
export default {
    methods: {
        $can(permissionName) {
            let permissions= this.$store.getters['auth/permissions']
            
            return _.get(permissions, permissionName, false);
        },
   
             createdDate(date) {
            const current_datetime = new Date(date);
            return current_datetime.toLocaleDateString('en-US');
        },
                    sendRequest(id) {
            const self = this;
            self.$store.commit('showDialog', {
                type: 'confirm',
                icon: 'warning',
                title: self.trans('messages.are_you_sure'),
                okCb: () => {
                    axios
                        .post('/confirm-design', { design_id: id })
                        .then(function (response) {
                            if (response.data.success === true) {
                                self.$eventBus.$emit('DESIGN__UPDATED');
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
                cancelCb: () => {
                    console.log('CANCEL');
                },
            });
        },
   getColor(status) {
            if (status == 'new') {
                return 'red';
            } else if (status == 'not_started') {
                return 'grey';
            } else if (status == 'pending') {
                return 'yellow';
            } else if (status == 'sent') {
                return 'orange';
            } else if (status == 'accepted') {
                return 'green';
            } else if (status == 'rejected') {
                return '#c71717';
            }
              else if (status == 'recieved') {
                return 'cyan';
            }
            else if (status == 'finished') {
                return 'rgb(102 151 88)';
            }
            else if(status=='completed'){
                return '#06706d';
            }
            else if (status == 'in_progress') {
                return 'blue';
            } else if (status == 'on_hold') {
                return 'red';
            }
            else if (status == 'cancelled') {
                return 'orange';
            }
        },
                pickFile(ref) {
      this.$refs[ref].click()
    },
                    getLocationInfo() {
            const self = this;
            axios
                .get('/get-location-info')
                .then(function (response) {
                    self.province_municipalities = response.data.provinceMunicipalities;
                    self.municipalities = response.data.municipalities;
                    self.categories_location = response.data.categoriesLocation;
                    self.neighborhoods = response.data.neighborhoods;
                    self.districts = response.data.districts;
                })
               .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });
        },
        $checklang() {
            return localStorage.getItem('currentLange')=='ar'?true:false;
        },
        checkType() {
            return this.$store.getters['auth/user'].user_type_log;
        },
        getCurrentUser() {
            return this.$store.getters['auth/user'];
        },
         getEmployee(user_id) {
            const self = this;
            axios
                .get('/admin/users/' + user_id + '/name')
                .then(function(response) {
                    self.data = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        getCurrentLang(){
            return localStorage.getItem('currentLange')
        },
                 textAreaWrite(event){
   if(event.which === 13)
    this.lineCount>=3?event.preventDefault():''

  },
        getLanguages(){
           return this.$store.getters['settings/languages']
        },
        checkActive() {
            let user = this.$store.getters['auth/user']
            return user.active !=null;
        },
        $hasRole(roleName) {
             let roles= this.$store.getters['auth/roles']
            return _.get(roles, roleName, false);
      
        },
              viewProject(id) {
            const self = this;
            self.$router.push({
                name: 'view_project',
                params: { id: id },
            });
        },
                 getProject(project_id) {
         const self = this;
            axios
                .get('/get-project/'+ project_id)
                .then(function (response) {
                    self.project  = response.data.data;
                })
               .catch((err)=>{
                console.log(err.response.status)
                if (err.response.status === 401) {
            store.dispatch('auth/handleResponse',err.response)
                } 
            });
        },
        trans(string, params = []) {
            var str = _.get(window.i18n, string);
            _.forEach(params, function (value, key) {
                str = _.replace(str, ':' + key, value);
            });

            return str;
        },
        percentage(value, total) {
            return (value / total) * 100;
        },
        projectProgress(totalTask, completedtask) {
            var total_project_work = 0;
            if (totalTask > 0 && completedtask > 0) {
                total_project_work = (completedtask / totalTask) * 100;
            } else {
                total_project_work = 0;
            }

            return _.floor(total_project_work);
        },
                getprogress(status) {
            if (status == 'not_started') {
                return this.projectProgress(5, 1);
            } else if (status == 'in_progress') {
                return this.projectProgress(5, 2);
            } else if (status == 'on_hold') {
                return this.projectProgress(5, 3);
            } else if (status == 'completed') {
                return this.projectProgress(5, 5);
            } else if (status == 'cancelled') {
                return this.projectProgress(5, 0);
            }
        },
        goBack(goBackByStep) {
            //(-ve  => go back/ +ve => go forward)
            var step = goBackByStep || -1;
            setTimeout(() => {
                this.$router.go(step);
            }, 1000);
        },
        defaultDateRange() {
            const self = this;
            var dateRange = [
                {
                    label: self.trans('messages.today'),
                    range: [moment().format('YYYY-MM-DD'), moment().format('YYYY-MM-DD')],
                },
                {
                    label: self.trans('messages.yesterday'),
                    range: [
                        moment().subtract(1, 'days').format('YYYY-MM-DD'),
                        moment().subtract(1, 'days').format('YYYY-MM-DD'),
                    ],
                },
                {
                    label: self.trans('messages.last_7_days'),
                    range: [
                        moment().subtract(6, 'days').format('YYYY-MM-DD'),
                        moment().format('YYYY-MM-DD'),
                    ],
                },
                {
                    label: self.trans('messages.last_30_days'),
                    range: [
                        moment().subtract(29, 'days').format('YYYY-MM-DD'),
                        moment().format('YYYY-MM-DD'),
                    ],
                },
                {
                    label: self.trans('messages.this_month'),
                    range: [
                        moment().startOf('month').format('YYYY-MM-DD'),
                        moment().endOf('month').format('YYYY-MM-DD'),
                    ],
                },
                {
                    label: self.trans('messages.last_month'),
                    range: [
                        moment().subtract(1, 'month').startOf('month').format('YYYY-MM-DD'),
                        moment().subtract(1, 'month').endOf('month').format('YYYY-MM-DD'),
                    ],
                },
                {
                    label: self.trans('messages.this_year'),
                    range: [
                        moment().startOf('year').format('YYYY-MM-DD'),
                        moment().endOf('year').format('YYYY-MM-DD'),
                    ],
                },
            ];

            return dateRange;
        },
        flatPickerDate() {
            var config = {
                altInput: true,
                altFormat: this.$store.getters['auth/DATE_FORMAT'].KEY,
            };
            return config;
        },
        flatPickerDateTime() {
            var format = '';
            var enable_24_hr = false;

            if (this.$store.getters['auth/TIME_FORMAT'] == 12) {
                format = this.$store.getters['auth/DATE_FORMAT'].KEY + ' h:i K';
            } else {
                format = this.$store.getters['auth/DATE_FORMAT'].KEY + ' H:i';
                enable_24_hr = true;
            }

            var config = {
                altInput: true,
                altFormat: format,
                enableTime: true,
                time_24hr: enable_24_hr,
            };

            return config;
        },
    },
};
</script>
