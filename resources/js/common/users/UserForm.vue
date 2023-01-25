<template>
<div>
     <SignaturePad ref="signature" @save="signatureUrl = $event"/>
   <v-form ref="form" v-model="valid" lazy-validation enctype="multipart/form-data">
                <v-card-title>
                    <v-icon medium>person</v-icon>
                    <slot name="title">
                    <span class="headline">
                        {{ trans('data.add_employee') }}
                    </span>
                    </slot>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout row wrap>
                            <v-flex xs12 sm6>
                                <v-text-field
                                    :placeholder="trans('messages.name')"
                                    v-model="name"
                                    :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('messages.name'),
                                            }),
                                    ]"
                                    :data-vv-as="trans('messages.name')"
                                    :error-messages="errors.collect('name')"
                                    required
                                ></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm6>
                                <v-text-field
                                    :placeholder="trans('messages.email')"
                                    v-model="email"
                                    :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('messages.email'),
                                            }),
                                        (v) => /.+@.+\..+/.test(v) || trans('messages.email_valid'),
                                    ]"
                                    :error-messages="errors.collect('email')"
                                    required
                                ></v-text-field>
                            </v-flex>
                             <v-flex xs12 sm12>
                                <v-text-field
                                    v-model="id_card_number"
                                    :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('data.id_card_number', {
                                                name: trans('data.id_card_number'),
                                            }),
                                    ]"
                                    type="number"
                                    :placeholder="trans('data.id_card_number')"
                                    required
                                ></v-text-field>
                            </v-flex>
                                             <v-flex xs12 sm6>
                                                 <v-text-field
            v-model="password"
            :append-icon="show1 ? 'visibility' : 'visibility_off'"
            :type="show1 ? 'text' : 'password'"
            name="input-10-1"
            autocomplete="new-password"
           :placeholder="trans('data.password')"
            hint="At least 6 characters"
            counter
            @click:append="show1 = !show1"
              :rules="!User?[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('messages.password'),
                                            }),
                                        ,
                                        (v) =>
                                            (v && v.length >= 6) ||
                                            trans('messages.string_length', {
                                                name: trans('messages.password'),
                                                length: '6',
                                            }),
                                        ,
                                    ]:[]"
                                    :required="!User?true:false"
          ></v-text-field>
        </v-flex>

                           
                            <v-flex xs12 sm6>
                                <v-text-field
                                    :placeholder="trans('messages.confirm_password')"
                                    type="password"
                                    v-model="passwordConfirm"
                                    :rules="[
                                        (v) =>
                                            !(v != password && password.length > 0) ||
                                            trans('messages.password_not_match'),
                                    ]"
                                    required
                                ></v-text-field>
                            </v-flex>

                                <slot name="engineer">
                                  <v-flex xs12 sm6>
                                <v-autocomplete
                                    multiple
                                        :clearable="true"
                                    :deletable-chips="true"
                                    :dense="true"
                                    search-input=""
                                    :solo-inverted="false"
                                    :eager="true"
                                    :loading="false"
                                    :validate-on-blur="false"
                                    :persistent-placeholder="false"
                                    :chips="true"
                                  
                                    item-text="name"
                                    item-value="id"
                                    :items="roles"
                                    v-model="form_fields.role_ids"
                                    @change="getEnginneringTypes"
                                    :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('messages.role'),
                                            }),
                                    ]"
                                    :placeholder="trans('messages.role')"
                                    required
                                ></v-autocomplete>
                            </v-flex>
                            <v-flex xs12 sm6 md6>
                                <v-autocomplete
                                v-if="form_fields.role_ids && form_fields.role_ids.find(val => val == 7)"
                                    item-text="value"
                                    item-value="key"
                                    :value="specialty_id"
                                    :clearable="true"
                                    :deletable-chips="true"
                                    :dense="true"
                                    search-input=""
                                    :solo-inverted="false"
                                    :eager="true"
                                    :loading="false"
                                    :validate-on-blur="false"
                                    :persistent-placeholder="false"
                                    :chips="true"
                                    :items="enginnering_types"
                                    v-model="specialty_id"
                                    :placeholder="trans('data.enginnering_type')"
                                    :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('data.enginnering_type'),
                                            }),
                                    ]"
                                    required
                                >
                                </v-autocomplete>
                            </v-flex>
                            </slot>
                                     <v-flex xs12 sm6 md4>
                                    <v-autocomplete
                                        item-text="value"
                                        item-value="key"
                                        :items="province_municipalities"
                                        v-model="location_data"
                                          :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('data.province_municipality'),
                                            }),
                                    ]"
                                        :placeholder="trans('data.province_municipality')"
                                        :data-vv-as="trans('data.province_municipality')"
                                        :error-messages="errors.collect('province_municipality')"
                                        required
                                    ></v-autocomplete>
                                </v-flex>
                            <!-- communication details -->
                            <v-flex xs12 sm12 md12>
                                <v-icon small style="margin-top:-10px">contact_mail</v-icon>
                                <span class="subheading mx-1">
                                    {{ trans('messages.communication_details') }}
                                </span>
                                <v-divider class="mb-2 mt-1"></v-divider>
                            </v-flex>
                            <v-flex xs12 sm6 md4>
                                <v-text-field
                                    type="number"
                                    v-model="form_fields.mobile"
                                    :placeholder="trans('messages.mobile')"
                                    v-validate="'required'"
                                      :rules="[
                                        (v) =>
                                            !!v ||
                                            trans('messages.required', {
                                                name: trans('messages.mobile'),
                                            }),
                                    ]"
                                    :data-vv-as="trans('messages.mobile')"
                                    :error-messages="errors.collect('mobile')"
                                    required
                                ></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm6 md4>
                                <v-text-field
                                    type="number"
                                    v-model="form_fields.alternate_num"
                                    :placeholder="trans('messages.alternate_num')"
                                ></v-text-field>
                            </v-flex>
                      
                           
                            <v-flex xs12 sm12 md12>
                                <v-textarea
                                    v-model="form_fields.current_address"
                                    no-resize
                                    clearable
                                    @keypress="textAreaWrite"
                                    :placeholder="trans('messages.current_address')"
                                    rows="3"
                                ></v-textarea>
                            </v-flex>
                            <!-- personal information -->
                            <v-flex xs12 sm12 md12>
                                <v-icon small style="margin-top:-10px">contact_phone</v-icon>
                                <span class="subheading mx-1">
                                    {{ trans('messages.personal_details') }}
                                </span>
                                <v-divider class="mb-2 mt-1"></v-divider>
                            </v-flex>
                            <slot name="register">
                            <v-flex xs12 sm6 md6>
                                <div class="v-input v-text-field theme--light">
                                    <div class="v-input__control">
                                        <div class="v-input__slot">
                                            <div class="v-text-field__slot">
                                               <label
                                                    aria-hidden="true"
                                                    class="
                                                        v-label
                                                        theme--light
                                                        
                                                        text-start
                                                        flat_picker_label
                                                    "
                               
                                                    :class="label_active"
                                                    style="left:auto"
                                                >
                                                    {{ trans('messages.date_of_birth') }}
                                                </label>
                                                <flat-pickr
                                                    v-model="birth_date"
                                                    @input="label_active = 'v-label--active'"
                                                    name="date_of_birth"
                                                    :config="flatPickerDate()"
                                                ></flat-pickr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </v-flex>
                            </slot>
                            <v-flex xs12 sm6 md4>
                                <v-select
                                    :items="gender_types"
                                    v-model="form_fields.gender"
                                    :placeholder="trans('messages.gender')"
                                ></v-select>
                            </v-flex>
                            <!-- bank details -->
                            <v-flex xs12 sm12 md12>
                                <v-icon small style="margin-top:-10px"> account_balance_wallet </v-icon>
                                <span class="subheading mx-1">
                                    {{ trans('data.bank_details') }}
                                </span>
                                <v-divider class="mb-2 mt-1"></v-divider>
                            </v-flex>
                            <v-flex xs12 sm6 md4>
                                <v-text-field
                                    v-model="form_fields.bank_name"
                                    :placeholder="trans('data.bank_name')"
                                ></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm6 md4>
                                <v-text-field
                                    type="number"
                                    v-model="form_fields.account_no"
                                    :placeholder="trans('data.account_no')"
                                >
                                </v-text-field>
                            </v-flex>  
                            <v-flex xs12 sm6 md4>
                                <v-text-field
                                    v-model="form_fields.tax_payer_id"
                                    :placeholder="trans('data.tax_payer_id')"
                                >
                                    <Popover
                                        slot="append"
                                        :helptext="trans('messages.tooltip_tax_payer_id')"
                                    >
                                    </Popover>
                                </v-text-field>
                            </v-flex>
                            <v-flex xs12 sm12 md12>
                                <v-textarea
                                    rows="3"
                                    v-model="form_fields.note"
                                    :placeholder="trans('messages.note')"
                                       no-resize
                                    clearable
                                    @keypress="textAreaWrite"
                                >
                                </v-textarea>
                            </v-flex>
                            <slot name="role">
                            <v-flex xs12 sm3>
                                <v-autocomplete
                                    multiple
                                    item-text="name"
                                    item-value="id"
                                    :items="roles"
                                    v-model="form_fields.role_ids"
                                    :placeholder="trans('messages.role')"
                                    :rules="[
                                        (v) =>
                                            (v && v.length > 0) ||
                                            trans('messages.required', {
                                                name: trans('messages.role'),
                                            }),
                                    ]"
                                    required
                                ></v-autocomplete>
                            </v-flex>
 <v-flex xs12 sm3 v-if="form_fields.role_ids && form_fields.role_ids.find(val => val == 7)">
                                    <v-autocomplete
                                        item-text="name"
                                        item-value="id"
                                        :items="engennering_offices"
                                        v-model="office_id"
                                        :placeholder="trans('data.enginnering_office_name')"
                                        :rules="[
                                            (v) =>
                                                !!v ||
                                                trans('messages.required', {
                                                    name: trans('data.enginnering_office_name'),
                                                }),
                                        ]"
                                        required
                                    ></v-autocomplete>
                                </v-flex>
                              <v-flex xs12 sm3 v-if="form_fields.role_ids && form_fields.role_ids.find(val => val == 2)">
                                <v-text-field
                                    v-model="form_fields.title"
                                    :placeholder="trans('messages.title')"
                                    :rules="[
                                        (v) =>
                                            (v && v.length > 0) ||
                                            trans('messages.required', {
                                                name: trans('messages.role'),
                                            }),
                                    ]"
                                    required
                                ></v-text-field>
                            </v-flex>
<v-flex xs12 sm3 class="text-xs-center text-sm-center text-md-center text-lg-center" v-if="form_fields.role_ids && form_fields.role_ids.find(val => val == 2)">
            <!-- Here the image preview -->
            <div class="img-container" v-if="imageUrl && imageUrl!=='delete' || imageFiles.logo">
            <img :src="imageUrl?imageUrl:imageFiles.logo" height="150"  class="image"/>
                   <div class="overlay text-lg flex">
             <v-icon class=" ma-auto" color="info"  @click='pickFile("image")'>photo</v-icon>
             <v-icon class=" ma-auto delete-icon" @click="deleteLogoImage">delete</v-icon>
             </div>
             </div>
             <v-btn class="success" v-if="(!imageUrl || imageUrl==='delete') && !imageFiles.logo" @click='pickFile("image")'>{{trans('data.select_image')}}</v-btn>
       
</v-flex>
     <input
              type="file"
              style="display: none"
              ref="image"
              accept="image/jpeg, image/jpg, image/png"
              @change="onFilePicked"
            >
                            </slot>
                       
              <v-flex xs12 sm3 v-if="$hasRole('superadmin')">
                                <v-switch
                                    :label="trans('messages.pre_Active_acount')"
                                    v-model="active"
                                ></v-switch>
                            </v-flex>
                          
                            <v-flex xs12 sm3>
                                <v-checkbox
                                    :placeholder="trans('messages.send_email')"
                                    value="true"
                                    v-model="send_email"
                                >
                                </v-checkbox>
                            </v-flex>
                                         <v-flex xs12 sm12 class="text-xs-center text-sm-center text-md-center text-lg-center">
         
            <div class="img-container" v-if="signatureUrl && signatureUrl!=='delete' || imageFiles.signature">
             <img :src="signatureUrl?signatureUrl:imageFiles.signature" class="image" height="150" style="max-width:15rem" />
                 <div class="overlay text-lg">
             <v-icon class="delete-icon" @click="deleteSignatureImage">delete</v-icon>
             </div>
             </div>
             <div class="img-container" v-if="personalImageUrl && personalImageUrl!=='delete' || imageFiles.avatar">
            <img :src="personalImageUrl?personalImageUrl:imageFiles.avatar" height="150"  class="image" style="max-width:20rem" />
             <div class="overlay text-lg">
             <v-icon class="delete-icon" @click="deletePersonalImage">delete</v-icon>
             </div>
            </div>
          
</v-flex>
   <input
              type="file"
              style="display: none"
              ref="personalImage"
              accept="image/jpeg, image/jpg, image/png"
              @change="onPersonalFilePicked"
            >
              <input
              type="file"
              style="display: none"
              ref="signatureImage"
              accept="image/jpeg, image/jpg, image/png"
              @change="onSignatureFilePicked"
            >
                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-layout justify-center>
                    <v-card-actions class="flex-wrap">
                        <v-spacer></v-spacer>
                        <v-btn color="error" class="mr-4" @click="reset">
                            {{ trans('data.reset') }}
                        </v-btn>
                        <v-btn color="secondary" class="mr-4" @click="$refs.signature.dialog = true">
                            {{ trans('data.addSignature') }}
                        </v-btn>
                          <v-btn color="secondary" class="mr-4" @click="pickFile('signatureImage')">
                            {{ trans('data.uploadSignature') }}
                        </v-btn>
                        <v-btn @click="save()" :disabled="!valid" color="success" class="mr-4">
                            {{ trans('messages.save') }}
                        </v-btn>
                                     <v-btn class="primary"  @click='pickFile("personalImage")'>
                {{trans('data.personal_image')}}
             </v-btn>
             <slot name="login">
                        <v-btn style="color: #06706d" @click="$router.go(-1)">
                            {{ trans('messages.back') }}
                        </v-btn>
                        </slot>
                    </v-card-actions>
                </v-layout>
            </v-form>
            </div>
</template>

<script>
import Popover from '../../admin/popover/Popover';
import SignaturePad from '../../common/SignaturePad'
export default {
    components:{
Popover,
SignaturePad
    },
 props:{
propUserId: null,
reg_birth_date: null
 },
 data() {
        return {
            valid: true,
            name: '',
            form_fields: [],
            birth_date: null,
            gender_types: [],
            province_municipalities: [],
             engennering_offices: [],
             User:null,
             office_id:null,
            location_data:"",
            email: '',
            label_active:'',
            passwordConfirm: null,
            id_card_number: '',
            password: '',
            swordConfirm: '',
            active: true,
            roles: [],
            specialty_id: null,
            send_email: false,
            enginnering_types: [],
            title:null,
                imageUrl: null,
    personalImageUrl:null,
      signatureUrl: null,
      show1: false,
    user_id: null,
             imageFiles:{
            signature: null,
            avatar:null,
            logo:null
           }
        };
    },
         computed: {
    lineCount: function() {
      // Return number of lines using regex if not empty
      return this.form_fields?.current_address?.length ? this.form_fields?.current_address?.split(/\r\n|\r|\n/).length : 0;
    }
  },
       mounted() {
        const self = this;
        self.loadRolesAndGenders();
        if(self.getCurrentUser()){
        self.getEnginneringTypes();
        }
        
        if(self.getCurrentUser() && self.getCurrentUser().user_type_log === 'SITE_MANAGENMENT'){
        self.getOffices();
        }
        self.getLocationInfo();
        self.$store.commit('setBreadcrumbs', [
            { label: 'Users', name: 'users.list' },
            { label: 'Create', name: '' },
        ]);
    },
    methods:{

             deletePersonalImage(){
        this.personalImageUrl = 'delete'
        this.imageFiles.avatar = null
        },
           deleteLogoImage(){
        this.imageUrl = 'delete'
        this.imageFiles.logo = null
        },
               deleteSignatureImage(){
        this.signatureUrl = 'delete'
        this.imageFiles.signature = null
        },
            loadUser() {
            const self = this;
            axios
                .get('/edit-user/' + self.propUserId)
                .then(function (response) {
                     self.User = response.data.user;
                    self.form_fields = self.User;
                    self.gender_types = response.data.gender_types;
                    self.birth_date = self.User.birth_date;
                    self.location_data = self.User.location_data;
                    self.name = self.User.name;
                    self.email = self.User.email;
                    self.id_card_number = self.User.id_card_number;
                    self.active = self.User.active !== null;
                    self.roles = response.data.roles;
                    self.form_fields.role_ids = response.data.role_ids;
                    self.checkRolePrimary(self.propUserId);
                    self.specialty_id = self.User.specialty_id;
                    self.title = response.data.user.title;
                    self.office_id = self.User.parent_id;
                    self.getEnginneringTypes(self.form_fields.role_ids.find(x =>x===7));
                    self.imageFiles.signature = response.data.user.signature;
                    self.imageFiles.avatar = response.data.user.personal_image
                    self.imageFiles.logo = response.data.user.logo
                   
                });
               
        },
                loadRolesAndGenders() {
            const self = this;
            axios
                .get('/create-user')
                .then(function (response) {
                    self.gender_types = response.data.gender_types;
                    self.roles = response.data.roles;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
             onPersonalFilePicked(e){
 const files = e.target.files
      if(files[0] !== undefined) {
        if (files[0].name.lastIndexOf('.') <= 0) {
          return
        }
        const fr = new FileReader()
        fr.readAsDataURL(files[0])
        fr.addEventListener('load', () => {
          this.personalImageUrl = fr.result
        })
      } else {
        this.personalImageUrl = ''
      }
    },
                 onSignatureFilePicked(e){
 const files = e.target.files
      if(files[0] !== undefined) {
        if (files[0].name.lastIndexOf('.') <= 0) {
          return
        }
        const fr = new FileReader()
        fr.readAsDataURL(files[0])
        fr.addEventListener('load', () => {
          this.signatureUrl = fr.result
        })
      } else {
        this.signatureUrl = ''
      }
    },
       getOffices() {
            const self = this;
            axios
                .get('/get-offices')
                .then(function (response) {
                    self.engennering_offices = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    onFilePicked(e) {
      const files = e.target.files
      if(files[0] !== undefined) {
        if (files[0].name.lastIndexOf('.') <= 0) {
          return
        }
        const fr = new FileReader()
        fr.readAsDataURL(files[0])
        fr.addEventListener('load', () => {
          this.imageUrl = fr.result
        })
      } else {
        this.imageUrl = ''
      }
    },
            getEnginneringTypes(event) {
            const self = this;
            let url= '/get-enginnering-types-by-role/'+event
            if(event)
            axios
                .get(url)
                .then(function (response) {
                    self.enginnering_types = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
         checkRolePrimary(id) {
            const self = this;
            axios.get('/check-role-primary/' + id).then(function (response) {
                self.is_edit_role = response.data == 0 ? false : true;
            });
        },
        save(){
                        const self = this;
            if (this.$refs.form.validate()) {
                let payload = {
                    file: self.imageUrl,
                    signature: self.signatureUrl,
                    personal_image: self.personalImageUrl,
                    name: self.name,
                    email: self.email,
                    mobile: self.form_fields.mobile,
                    location_data: self.location_data,
                    alternate_num: self.form_fields.alternate_num,
                    home_address: self.form_fields.home_address,
                    current_address: self.form_fields.current_address,
                    skype: self.form_fields.skype,
                    linkedin: self.form_fields.linkedin,
                    facebook: self.form_fields.facebook,
                    twitter: self.form_fields.twitter,
                    birth_date: self.reg_birth_date?self.reg_birth_date:self.birth_date,
                  
                    gender: self.form_fields.gender,
                    note: self.form_fields.note,
                    password: self.password,
                    active: moment().format('YYYY-MM-DD'), //self.active ? moment().format('YYYY-MM-DD') : null,
                    role: self.form_fields.role_ids,
                    send_email: self.send_email,
                    account_holder_name: self.form_fields.account_holder_name,
                    account_no: self.form_fields.account_no,
                    bank_name: self.form_fields.bank_name,
                    bank_identifier_code: self.form_fields.bank_identifier_code,
                    branch_location: self.form_fields.branch_location,
                    tax_payer_id: self.form_fields.tax_payer_id,
                    id_card_number: self.id_card_number,
                    specialty_id: self.specialty_id,
                    title: self.form_fields.title,
                    office_id:self.office_id
                };

  self.$store.commit('showLoader');
self.$emit('save',payload)
                         /*   self.reset();
                            self.resetValidation();
                            self.$validator.reset();*/
                            
        }else {
                self.$store.commit('showSnackbar', {
                    message: 'املئ الحقول الضرورية',
                    color: 'error',
                    duration: 3000,
                });
            }
    },
            reset() {
            this.$refs.form.reset();
                   this.signatureUrl =null
            this.personalImageUrl = null
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
    }
}
</script>
<style scoped>
.subheading{
    margin-top:-10px;
}
.img-container {
  position: relative;
  max-width: 300px;
  cursor: pointer;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
    position: absolute;
    bottom: 0;
    background: rgb(0, 0, 0);
    background: rgb(237 245 239 / 50%);
    width: 100%;
    transition: .5s ease;
    opacity: 0;
    padding: 20px;
    text-align: center;
    height: 100%;
}
.img-container:hover .overlay {
  opacity: 1;
}
 .delete-icon {
    color:rgb(105, 0, 0)!important;
    font-size: 24px;
}
>>> .v-label{
    left: unset!important;
    right: unset!important;
}
>>> .v-list__tile__title{
    text-align: justify;
}
</style>