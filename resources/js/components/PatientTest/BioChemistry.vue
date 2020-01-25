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
                        <h5>Renal Function Test</h5>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Urea</label>
                                <input type="text" v-model="biochemistryrtf.urea" class="form-control"
                                       placeholder="Color">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Creatinine</label>
                                <input type="text" v-model="biochemistryrtf.creatinine" class="form-control"
                                       placeholder="Color">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Sodium</label>
                                <input type="text" v-model="biochemistryrtf.sodium" class="form-control"
                                       placeholder="Color">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Potassium</label>
                                <input type="text" v-model="biochemistryrtf.potassium" class="form-control"
                                       placeholder="Color">
                            </div>
                        </div>
                        <h5>Liver Function Test</h5>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Billirubin (Total)</label>
                                <input type="text" v-model="biochemistrylft.bilirubin_total" class="form-control"
                                       placeholder="pH">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Billirubin (Direct)</label>
                                <input type="text" v-model="biochemistrylft.bilirubin_direct" class="form-control"
                                       placeholder="Transparancy">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>SGPT (ALT)</label>
                                <input type="text" v-model="biochemistrylft.sgpt_alt" class="form-control"
                                       placeholder="Sugar">
                            </div>
                            <div class="form-group col-md-4">
                                <label>SGPT (AST)</label>
                                <input type="text" v-model="biochemistrylft.sgpt_ast" class="form-control"
                                       placeholder="Sugar">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Alkaline Phosphatase</label>
                                <input type="text" v-model="biochemistrylft.alkaline_phosphatase" class="form-control"
                                       placeholder="Sugar">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Total Protein</label>
                                <input type="text" v-model="biochemistry.total_protein" class="form-control"
                                       placeholder="pH">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Albumin</label>
                                <input type="text" v-model="biochemistry.albumin" class="form-control"
                                       placeholder="Transparancy">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Sugar (F)</label>
                                <input type="text" v-model="biochemistry.sugar_f" class="form-control"
                                       placeholder="cast">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sugar (PP)</label>
                                <input type="text" v-model="biochemistry.sugar_pp" class="form-control"
                                       placeholder="cast">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sugar (R)</label>
                                <input type="text" v-model="biochemistry.sugar_r" class="form-control"
                                       placeholder="cast">
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
    import BiochemistryLft from "../../model/BiochemistryLft";
    import BiochemistryRtf from "../../model/BiochemistryRtf";
    import Biochemistry from "../../model/Biochemistry";

    export default {
        name: "BioChemistry",
        data() {
            return {
                isActive: false,
                biochemistrylft: new BiochemistryLft(),
                biochemistryrtf: new BiochemistryRtf(),
                biochemistry: new Biochemistry(),
            }
        },
        created() {
            eventBus.$on('open-add-biochemistry-modal', (id) => {
                console.log('we get the patient_id:', id);
                this.biochemistrylft = new BiochemistryLft();
                this.biochemistryrtf = new BiochemistryRtf();
                this.biochemistry = new Biochemistry();
                this.biochemistrylft.patient_id = id;
                this.biochemistryrtf.patient_id = id;
                this.biochemistry.patient_id = id;
                this.isActive = true;
            })
        },
        methods: {
            closeModal() {
                this.isActive = false;
            },
            onSubmit() {
                console.log('i have enter on submit');
                axios.post('/biochemistry', [
                    this.biochemistrylft,
                    this.biochemistryrtf,
                    this.biochemistry
                ])
                    .then(res => {
                        this.biochemistrylft = '';
                        this.biochemistryrtf = '';
                        this.biochemistry = '';
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
        },

    }
</script>

<style scoped>

</style>
