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
                        <h5>Physical</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Color</label>
                                <input type="text" v-model="urinePhysical.color" class="form-control"
                                       placeholder="Color">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Transparancy</label>
                                <input type="text" v-model="urinePhysical.transparency" class="form-control"
                                       placeholder="Transparancy">
                            </div>
                        </div>
                        <h5>Chemical</h5>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>pH</label>
                                <input type="text" v-model="urineChemical.ph" class="form-control" placeholder="pH">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Albumin</label>
                                <input type="text" v-model="urineChemical.albumin" class="form-control"
                                       placeholder="Transparancy">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sugar</label>
                                <input type="text" v-model="urineChemical.sugar" class="form-control"
                                       placeholder="Sugar">
                            </div>
                        </div>
                        <h5>Microscopic</h5>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Cast</label>
                                <input type="text" v-model="urineMircoscopic.cast" class="form-control"
                                       placeholder="cast">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Crystal</label>
                                <input type="text" v-model="urineMircoscopic.crystal" class="form-control"
                                       placeholder="Transparancy">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Pus Cells</label>
                                <input type="text" v-model="urineMircoscopic.puscells" class="form-control"
                                       placeholder="Sugar">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Squamous Epithelial Cells</label>
                                <input type="text" v-model="urineMircoscopic.sec" class="form-control"
                                       placeholder="sec">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Erythrocytes</label>
                                <input type="text" v-model="urineMircoscopic.erythrocytes" class="form-control"
                                       placeholder="erythrocytes">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Yeast</label>
                                <input type="text" v-model="urineMircoscopic.yeast" class="form-control"
                                       placeholder="Yest">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>calcium oxalate</label>
                                <input type="text" v-model="urineMircoscopic.calciumxalate" class="form-control"
                                       placeholder="calcium oxalate">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Others</label>
                                <input type="text" v-model="urineMircoscopic.others" class="form-control"
                                       placeholder="Others">
                            </div>
                        </div>
                        <!--                        <div class="form-row">-->
                        <!--                            <div class="form-group col-md-4">-->
                        <!--                                <label>Others</label>-->
                        <!--                                <textarea name="" id="" cols="50" rows="5" v-model="urineMircoscopic.others">-->

                        <!--                                </textarea>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
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
    import UrinePhysical from "../../model/UrinePhysical";
    import UrineChemical from "../../model/UrineChemical";
    import UrineMicroscopic from "../../model/UrineMicroscopic";

    export default {
        name: "Urine",
        data() {
            return {
                isActive: false,
                urinePhysical: new UrinePhysical(),
                urineChemical: new UrineChemical(),
                urineMircoscopic: new UrineMicroscopic(),
            }
        },
        created() {
            eventBus.$on('open-add-urine-modal', (id) => {
                console.log('we get the patient_id:', id);
                this.urinePhysical = new UrinePhysical();
                this.urineChemical = new UrineChemical();
                this.urineMircoscopic = new UrineMicroscopic();
                this.urinePhysical.patient_id = id;
                this.urineChemical.patient_id = id;
                this.urineMircoscopic.patient_id = id;
                this.isActive = true;
            })
        },
        methods: {
            closeModal() {
                this.isActive = false;
            },
            onSubmit() {
                console.log('i have enter on submit');
                axios.post('/urine', [
                    this.urinePhysical,
                    this.urineChemical,
                    this.urineMircoscopic,
                ])
                    .then(res => {
                        this.urinePhysical = '';
                        this.urineChemical = '';
                        this.urineMircoscopic = '';
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
        }
    }
</script>

<style scoped>

</style>
