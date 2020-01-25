<template>
    <div class="modal fade" v-if="isActive" id="exampleModal1" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clinical Pathology </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="closeModal">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="onSubmit">
                        <h5>Complete Blood Count</h5>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Total Leutocytes Count</label>
                                <input type="text" v-model="hematologycbc.totalbc" class="form-control"
                                       placeholder="Color">
                            </div>
                        </div>
                        <h5>Different Leulcoyte</h5>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Neutrophils</label>
                                <input type="text" v-model="hematologydlc.neurophils" class="form-control"
                                       placeholder="pH">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Lymphocytes</label>
                                <input type="text" v-model="hematologydlc.lymphocytes" class="form-control"
                                       placeholder="Transparancy">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Monocytes</label>
                                <input type="text" v-model="hematologydlc.monocytes" class="form-control"
                                       placeholder="Sugar">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Neutrophils</label>
                                <input type="text" v-model="hematologydlc.eosinophils" class="form-control"
                                       placeholder="pH">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Lymphocytes</label>
                                <input type="text" v-model="hematologydlc.basophis" class="form-control"
                                       placeholder="Transparancy">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Haemoglobin</label>
                                <input type="text" v-model="hematology.haemoglobin" class="form-control"
                                       placeholder="cast">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Platelets</label>
                                <input type="text" v-model="hematology.plateles" class="form-control"
                                       placeholder="cast">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Blood Group</label>
                                <input type="text" v-model="hematology.bloodgroup" class="form-control"
                                       placeholder="cast">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Malarial Parasites</label>
                                <input type="text" v-model="hematology.malarialparasites" class="form-control"
                                       placeholder="cast">
                            </div>
                            <div class="form-group col-md-4">
                                <label>HBAIC</label>
                                <input type="text" v-model="hematology.hba1c" class="form-control" placeholder="cast">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</template>

<script>
    import HematologyDlc from "../../model/HematologyDlc";
    import HematologyCbc from "../../model/HematoCbc";
    import Hematology from "../../model/Hematology";

    export default {
        name: "Hematology",
        data() {
            return {
                isActive: false,
                hematologydlc: new HematologyDlc(),
                hematologycbc: new HematologyCbc(),
                hematology: new Hematology(),
            }
        },
        created() {
            eventBus.$on('open-add-hematology-modal', (id) => {
                console.log('we get the patient_id:', id);
                this.hematologydlc = new HematologyDlc();
                this.hematologycbc = new HematologyCbc();
                this.hematology = new Hematology();
                this.hematologydlc.patient_id = id;
                this.hematologycbc.patient_id = id;
                this.hematology.patient_id = id;
                this.isActive = true;
            })
        },
        methods: {
            closeModal() {
                this.isActive = false;
            },
            onSubmit() {
                console.log('i have enter on submit');
                axios.post('/hematology', [
                    this.hematologydlc,
                    this.hematologycbc,
                    this.hematology
                ])
                    .then(res => {
                        this.hematologydlc = '';
                        this.hematologycbc = '';
                        this.hematology = '';
                        this.isActive = false;
                        this.closeModal();
                        this.$toasted.success('Test Data Added Successfully', {
                            icon: 'check',
                            type: 'success',
                        });
                        setTimeout(() => {
                            eventBus.$emit('open-refresh-modal');
                        }, 1500);
                    }).catch(err => {
                    this.$toasted.show('Error In Storing Test Data ', {
                        icon: 'cross',
                        type: 'error',
                    });
                });
            },
        }
    }
</script>

<style scoped>

</style>
