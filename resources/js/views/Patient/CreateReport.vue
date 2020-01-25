<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-10">
                        <h5 class="card-title">{{patient.name}}</h5>
                    </div>
                    <div class="col-sm-2">
                        <router-link class="btn btn-primary btn-sm"
                                     :to="{name: 'Patient'}">
                            Back
                        </router-link>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="card-list">
                                <div>
                                    <h3>Test To Do</h3>
                                </div>
                                <div class="row">
                                    <button v-if="!patient.lipid_flag" type="button" class="btn btn-default btn-sm"
                                            @click="openLipidModal(ids)"
                                            data-toggle="modal" data-target="#exampleModal1">
                                        <strong>Lipid Test</strong>
                                    </button>
                                    <button v-if="!patient.serology_flag" type="button" class="btn btn-default btn-sm"
                                            @click="openSerologyModal(ids)"
                                            data-toggle="modal" data-target="#exampleModal1">
                                        <strong>Serology Test</strong>
                                    </button>
                                    <button v-if="!patient.urine_flag" type="button" class="btn btn-default btn-sm"
                                            @click="openCptModal(ids)"
                                            data-toggle="modal" data-target="#exampleModal1">
                                        <strong>Clinical Pathology Test</strong>
                                    </button>
                                    <button v-if="!patient.hematology_flag" type="button" class="btn btn-default btn-sm"
                                            @click="openHematologyModal(ids)"
                                            data-toggle="modal" data-target="#exampleModal1">
                                        <strong>Hematology Test</strong>
                                    </button>
                                    <button v-if="!patient.biochemistry_flag" type="button" class="btn btn-default btn-sm"
                                            @click="openBiochemistryModal(ids)"
                                            data-toggle="modal" data-target="#exampleModal1">
                                        <strong>BioChemistry Test</strong>
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="card-list">
                                <div>
                                    <h3>Test Performed</h3>
                                </div>
                                <div class="row">
                                    <button v-if="patient.lipid_flag" class="btn btn-default btn-sm" disabled>
                                        <strong>Lipid Test</strong>
                                    </button>
                                    <button v-if="patient.serology_flag" class="btn btn-default btn-sm" disabled>
                                        <strong>Serology Test</strong>
                                    </button>
                                    <button v-if="patient.urine_flag" class="btn btn-default btn-sm" disabled>
                                        <strong>Clinical Pathology Test</strong>
                                    </button>
                                    <button v-if="patient.hematology_flag" class="btn btn-default btn-sm" disabled>
                                        <strong>Hematology Test</strong>
                                    </button>
                                    <button v-if="patient.biochemistry_flag" class="btn btn-default btn-sm" disabled>
                                        <strong>BioChemistry Test</strong>
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card-body">
                <div class="card-list">
                        <router-link v-if="patient.isReport" class="btn btn-primary btn-sm"
                                     :to="{name: 'PatientReportView', params: {id:this.ids,
                                                                                 tn:this.tn,
                                                                                 }}"
                        >
                            Generate Report
                        </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Patient from "../../model/Patient";

    export default {
        name: "CreateReport",
        data() {
            return {
                patient:new Patient(),
                ids:'',
                url:'',

            }
        },
        props: {
            id:{
                type:Number,
            },
            tn: {
                required: true,
                type: String,
            },
        },
        created() {
            this.patient = new Patient();
            this.ids = this.$route.params.id;
            this.url = '/patient' + '/'+ this.ids;
            axios.get(this.url).then(res => {
                this.patient = res.data.data;
            }).catch(error => {
                console.log(error.data)
            });

            eventBus.$on('open-refresh-modal', () => {
                location.reload();
            });
        },
        methods: {
            openLipidModal(ids) {
                eventBus.$emit('open-add-lipid-modal', ids);
            },
            openSerologyModal(ids) {
                eventBus.$emit('open-add-serology-modal', ids);
            },
            openCptModal(ids) {
                eventBus.$emit('open-add-urine-modal', ids);
            },
            openHematologyModal(ids) {
                eventBus.$emit('open-add-hematology-modal', ids);
            },
            openBiochemistryModal(ids) {
                eventBus.$emit('open-add-biochemistry-modal', ids);
            }
        }
    }
</script>

<style scoped>

</style>
