<template>
    <div class="modal fade" v-if="isActive" id="exampleModal1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lipid Test</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="closeModal">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="onSubmit">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Total Cholesterol</label>
                                <input type="number" v-model="lipid.totalcholesterol" class="form-control"  placeholder="Total Cholesterol">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Triglyceride</label>
                                <input type="number" v-model="lipid.triglyceride" class="form-control"  placeholder="Triglyceride">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Uric</label>
                                <input type="number" v-model="lipid.uric" class="form-control"  placeholder="Uric">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">HDL</label>
                                <input type="number" v-model="lipid.hdl" class="form-control" placeholder="HDL">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">LDL</label>
                                <input type="number" v-model="lipid.ldl" class="form-control"  placeholder="LDL">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">VLDL</label>
                                <input type="number" v-model="lipid.vldl " class="form-control"  placeholder="VLDL">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Calcium</label>
                                <input type="number" class="form-control" v-model="lipid.calcium" placeholder="Calcium">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">VitaminD</label>
                                <input type="number" class="form-control" v-model="lipid.vitaminD" placeholder="VitaminD">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">VitaminB12</label>
                                <input type="number" class="form-control" v-model="lipid.vitaminB12"  placeholder="VitaminB12">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" :data-dismiss="modal" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>


    import Lipid from "../../model/Lipid";

    export default {
        name: "Lipid",
        data(){
            return{
                lipid: new Lipid(),
                isActive: false,
                modal:''
            }
        },
        created() {
            eventBus.$on('open-add-lipid-modal',(id) =>{
                this.lipid = new Lipid();
                this.lipid.patient_id = id;
                console.log('we get the patient_id:', this.lipid.patient_id );
                this.isActive = true;
            })
        },
        methods:{
            onSubmit(){
                console.log('i have enter on submit')
                axios.post('/lipid',this.lipid)
                    .then(res=>{
                        this.lipid = '';
                        this.isActive = false;
                        eventBus.$emit('open-refresh-modal')
                        this.$toasted.success('Test Data Added Successfully',{
                            icon : 'check',
                            type : 'success',
                        });
                    }).catch( err =>{
                    this.$toasted.show('Error In Storing Test Data ',{
                        icon : 'cross',
                        type : 'error',
                    });
                });
            },
            closeModal(){
                this.isActive = false;
            }
        }
    }
</script>

<style scoped>

</style>
