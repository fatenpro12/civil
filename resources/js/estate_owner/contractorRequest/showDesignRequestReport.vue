
<template id="panel-template">
    <v-container justify-center>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-card-actions justify-left class="flex-wrap">
                <v-btn style="color: #06706d" @click="$router.go(-1)">
                    {{ trans('messages.back') }}
                </v-btn>

                <v-btn
                    style="background-color: #06706d; color: white"
                    color="darken-1"
                    @click="generatePDF"
                >
                    {{ trans('data.generate_pdf') }}
                </v-btn>

                <v-btn
                    v-if="design_enginner.is_rejected != 1"
                    style="background-color: #06706d; color: white"
                    color="darken-1"
                    @click="accept(1)"
                    :loading="loading"
                    :disabled="!valid || !checkActive() || design_enginner.is_agreed==1"
                >
                    {{
                        design_enginner.is_agreed ? trans('data.accepted_done') : trans('data.accept')
                    }}
                </v-btn>

                <v-btn
                    v-if="design_enginner.is_agreed != 1"
                    style="background-color: #06706d; color: white"
                    color="darken-1"
                    @click="accept(0)"
                    :loading="loading"
                    :disabled="!valid || !checkActive() || design_enginner.is_rejected==1"
                >
                    {{
                        design_enginner.is_rejected
                            ? trans('data.reject_done')
                            : trans('data.reject')
                    }}
                </v-btn>
            </v-card-actions>
            <v-spacer></v-spacer>
            <v-card id="printMe" onafterprint="myFunction()">
                <v-divider></v-divider>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout row wrap>
                            <v-flex xs12 sm4 md4>
                                <b-card-group deck>
                                    <b-card
                                        :header="trans('data.enginner_name')"
                                        header-tag="header1"
                                        title=""
                                    >
                                        <b-card-text>{{ enginner_name }}</b-card-text>
                                    </b-card>
                                </b-card-group>
                            </v-flex>
                            <v-flex xs12 sm4 md4>
                                <b-card-group deck>
                                    <b-card
                                        :header="trans('data.create_time')"
                                        header-tag="header1"
                                        title=""
                                    >
                                        <b-card-text>{{ create_time }}</b-card-text>
                                    </b-card>
                                </b-card-group>
                            </v-flex>
                            <v-flex xs12 sm4 md4>
                                <b-card-group deck>
                                    <b-card
                                        :header="trans('data.stage')"
                                        header-tag="header1"
                                        title=""
                                    >
                                        <b-card-text>{{ stage_name }}</b-card-text>
                                    </b-card>
                                </b-card-group>
                            </v-flex>
                        </v-layout>
                        <v-layout row wrap>
                            <v-flex xs12 sm12 md12>
                                <b-card-group deck>
                                    <b-card
                                        :header="trans('data.price')"
                                        header-tag="header1"
                                        title=""
                                    >
                                        <vuetify-money
                                            v-model="price"
                                            v-bind:label="label"
                                            v-bind:placeholder="placeholder"
                                            v-bind:readonly="readonly"
                                            v-bind:disabled="disabled"
                                            v-bind:outlined="outlined"
                                            v-bind:clearable="clearable"
                                            v-bind:valueWhenIsEmpty="valueWhenIsEmpty"
                                            v-bind:options="options"
                                            v-bind:properties="properties"
                                            required
                                            :rules="[
                                                (v) =>
                                                    !!v ||
                                                    trans('messages.required', {
                                                        name: trans('data.price'),
                                                    }),
                                            ]"
                                        />
                                    </b-card>
                                </b-card-group>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>
        </v-form>
    </v-container>
</template>

<script>
import jsPDF from 'jspdf';

export default {
    components: {
        jsPDF,
    },
    props: {
        design_id: {
            required: true,
        },
    },
    data() {
        return {
            valid: true,
            type: 'testt',
            design_enginner: {},
            project_id: '',
            enginner_id: '',
            //  design_enginner_id:null,

            price: null,
            enginner_name: '',
            stage_name: '',

            /////curreny ///
            value: '',
            label: '',
            placeholder: ' ',
            readonly: true,
            disabled: true,
            outlined: true,
            clearable: true,
            valueWhenIsEmpty: '',
            options: {
                locale: 'pt-BR',
                prefix: '$',
                suffix: '',
                length: 11,
                precision: 2,
            },
            properties: {
                hint: '',
                // You can add other v-text-field properties, here.
            },

            heading: 'Design Request',
            moreText: [''],
            loading: false,
        };
    },
    created() {
        const self = this;
        self.reset();

        self.getRequestDesignStageDetail();
    },
    beforeDestroy() {
        const self = this;
    },

    mounted: function () {},
    methods: {
        reset() {
            // alert(4)
            //     this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },

        getRequestDesignStageDetail() {
            const self = this;

            let data = {
                id: self.design_id,
            };
            axios
                .post('show-design-request-details', data)
                .then(function (response) {
                    var result = response.data.msg;
                    self.loading = false;
                    if (result.created_at != null) {
                        self.create_time = self.currentDateTime(result.created_at);
                    } else {
                        self.create_time = self.currentDateTime();
                    }
                    self.design_enginner = result;
                    self.stage_name = result.stage.value;
                    self.enginner_name = result.enginner.name;
                    self.price = result.price;
                    // self.design_enginner_id=result.id
                    /* self.$store.commit('showSnackbar', {
                        message: response.data.msg,
                        color: response.data.success,
                    });*/
                    if (response.data.success === true) {
                        // self.goBack();
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        currentDateTime(date1 = null) {
            const current = date1 != null ? new Date(date1) : new Date();
            const date =
                current.getFullYear() + '-' + (current.getMonth() + 1) + '-' + current.getDate();
            const time =
                current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
            const dateTime = date + ' ' + time;
            return dateTime;
        },
        accept(status) {
            const self = this;

            let data = {
                design_enginner_id: self.design_enginner.id,
                status: status,
            };
            if (this.$refs.form.validate()) {
                self.loading = true;
                axios
                    .post('/estate_owner/accept-design-request-offer', data)
                    .then(function (response) {
                        self.loading = false;
                        self.$store.commit('showSnackbar', {
                            message: response.data.msg,
                            color: response.data.success,
                        });
                        if (response.data.success === true) {
                            // self.goBack();
                            window.location.reload();
                            /* self.$router.push({
                                name: 'show_design_request_price_estate_list',
                                params: { id:  self.design_enginner_id },
                            })*/
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
            //self.reset();
        },
        generatePDF() {
            const self = this;
            if (true) {
                const columns = [
                    { title: 'Title', dataKey: 'title' },
                    { title: 'Body', dataKey: 'body' },
                ];
                const doc = new jsPDF({
                    orientation: 'portrait',
                    unit: 'in',
                    format: 'letter',
                });
                // text is placed using x, y coordinates
                doc.setFontSize(16).text(this.heading, 0.5, 1.0);
                // create a line under heading
                doc.setLineWidth(0.01).line(0.5, 1.1, 8.0, 1.1);
                // Using autoTable plugin
                var items = [
                    { title: 'Enginnner Name', body: self.enginner_name },
                    { title: 'Price', body: self.price },
                    //   { title: 'Item 3', body: 'I am item 3 body text' },
                    // { title: 'Item 4', body: 'I am item 4 body text' },
                ];
                doc.autoTable({
                    columns,
                    body: items,
                    margin: { left: 0.5, top: 1.25 },
                });

                // Using array of sentences
                doc.addFont('helvetica');
                doc.setFont('Amiri');
                doc.setFontSize(12);
                doc.text(this.moreText, 0.5, 3.5, { align: 'left', maxWidth: '7.5' });
                //Creating footer and saving file
                doc.addFont('times');
                doc.setFontSize(11);
                //doc.addFontStyle('italic')
                doc.setTextColor(0, 0, 255);
                doc.text(
                    'This is a simple footer located .5 inches from page bottom',
                    0.5,
                    doc.internal.pageSize.height - 0.5
                );

                doc.save(`${this.heading}.pdf`);
            } else {
            }
        },
    },
};
</script>

<style scoped>
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.5rem;
}
.card > hr {
    margin-right: 0;
    margin-left: 0;
}
.card > .list-group {
    border-top: inherit;
    border-bottom: inherit;
}
.card > .list-group:first-child {
    border-top-width: 0;
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}
.card > .list-group:last-child {
    border-bottom-width: 0;
    border-bottom-right-radius: calc(0.25rem - 1px);
    border-bottom-left-radius: calc(0.25rem - 1px);
}
.card > .card-header + .list-group,
.card > .list-group + .card-footer {
    border-top: 0;
}

.card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem;
    background-color: rgba(217, 217, 217, 255);
}

.card-title {
    margin-bottom: 0.5rem;
}

.card-subtitle {
    margin-top: -0.25rem;
    margin-bottom: 0;
}

.card-text:last-child {
    margin-bottom: 0;
}

.card-link + .card-link {
    margin-left: 1rem;
}

.card-header {
    padding: 0.5rem 1rem;
    margin-bottom: 0;
    background-color: rgba(12, 111, 109, 255);
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    color: white;
}
.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-footer {
    padding: 0.5rem 1rem;
    background-color: rgba(0, 0, 0, 0.03);
    border-top: 1px solid rgba(0, 0, 0, 0.125);
}
.card-footer:last-child {
    border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
    margin-right: -0.5rem;
    margin-bottom: -0.5rem;
    margin-left: -0.5rem;
    border-bottom: 0;
}
.card-text {
    text-align: -webkit-center;
}

.card-header-pills {
    margin-right: -0.5rem;
    margin-left: -0.5rem;
}

.card-img-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1rem;
    border-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-top,
.card-img-bottom {
    width: 100%;
}

.card-img,
.card-img-top {
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-bottom {
    border-bottom-right-radius: calc(0.25rem - 1px);
    border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-group > .card {
    margin-bottom: 0.75rem;
}
@media (min-width: 576px) {
    .card-group {
        display: flex;
        flex-flow: row wrap;
    }
    .card-group > .card {
        flex: 1 0 0%;
        margin-bottom: 0;
    }
    .card-group > .card + .card {
        margin-left: 0;
        border-left: 0;
    }
    .card-group > .card:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .card-group > .card:not(:last-child) .card-img-top,
    .card-group > .card:not(:last-child) .card-header {
        border-top-right-radius: 0;
    }
    .card-group > .card:not(:last-child) .card-img-bottom,
    .card-group > .card:not(:last-child) .card-footer {
        border-bottom-right-radius: 0;
    }
    .card-group > .card:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .card-group > .card:not(:first-child) .card-img-top,
    .card-group > .card:not(:first-child) .card-header {
        border-top-left-radius: 0;
    }
    .card-group > .card:not(:first-child) .card-img-bottom,
    .card-group > .card:not(:first-child) .card-footer {
        border-bottom-left-radius: 0;
    }
}
</style>