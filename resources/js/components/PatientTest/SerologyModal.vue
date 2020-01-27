<template>
    <div class="modal fade" v-if="isActive" id="exampleModal1" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Serology Test</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="closeModal">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="onSubmit">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>HIV</label>
                                <input type="number" v-model="serology.hiv" class="form-control"
                                       placeholder="Total Cholesterol">
                            </div>
                            <div class="form-group col-md-4">
                                <label>HBSA</label>
                                <input type="number" v-model="serology.hbsa" class="form-control"
                                       placeholder="Triglyceride">
                            </div>
                            <div class="form-group col-md-4">
                                <label>HCV</label>
                                <input type="number" v-model="serology.hcv" class="form-control" placeholder="Uric">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">RA Factor</label>
                                <input type="number" v-model="serology.rh" class="form-control" placeholder="HDL">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">CRD</label>
                                <input type="number" v-model="serology.crd" class="form-control" placeholder="LDL">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">ASO</label>
                                <input type="number" v-model="serology.aso " class="form-control" placeholder="VLDL">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">widal test</label>
                                <input type="number" class="form-control" v-model="serology.widal"
                                       placeholder="Calcium">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">VDRL</label>
                                <input type="number" class="form-control" v-model="serology.vdrl"
                                       placeholder="VitaminD">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">TPHA</label>
                                <input type="number" class="form-control" v-model="serology.tpha"
                                       placeholder="VitaminB12">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">UPT</label>
                                <input type="number" class="form-control" v-model="serology.upt" placeholder="Calcium">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Helicobactor Pyloric</label>
                                <input type="number" class="form-control" v-model="serology.hpylori"
                                       placeholder="VitaminD">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Food For Occult Blood</label>
                                <input type="number" class="form-control" v-model="serology.fob"
                                       placeholder="VitaminB12">
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
    import Serology from "../../model/serology";

    export default {
        name: "SerologyModal",
        data() {
            return {
                serology: new Serology(),
                isActive: false,

            }
        },
        created() {
            eventBus.$on('open-add-serology-modal', (id) => {
                this.serology = new Serology();
                this.serology.patient_id = id;
                console.log('we get the patient_id:', this.serology.patient_id);
                this.isActive = true;
            })
        },
        methods: {
            onSubmit() {
                console.log('i have enter on submit');
                axios.post('/serology', this.serology)
                    .then(res => {
                        console.log(res.data.data);
                        this.serology = '';
                        this.isActive = false;
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
            closeModal() {
                this.isActive = false;

            }
        }
    }
</script>

<style scoped>

</style>
