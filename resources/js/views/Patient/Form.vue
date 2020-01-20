<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Entry Patient</h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="onSubmit">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" v-model="patient.name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" v-model="patient.address" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Age</label>
                                        <input type="number" v-model="patient.age" class="form-control" min="0">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Sex</label>
                                        <select class="form-control" v-model="patient.gender">
                                            <option  value="" disabled selected>Choose your option</option>
                                            <option  value="Male">Male</option>
                                            <option  value="Female">Female</option>
                                            <option  value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">TicketID</label>
                                        <input type="text"  v-model="patient.tn" class="form-control"  disabled>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Patient from "../../model/Patient";
    export default {
        name: "PatientForm",
        data() {
            return {
                patient: new Patient(),
            }
        },
        created() {
            this.patient.tn = Math.random().toString(36).substring(8);
            console.log("random", this.patient.tn);
        },
        methods:{
            onSubmit(){
                console.log("hello i am submit");
                axios.post('/patient', this.patient).then(res => {
                    console.log(res.data)
                    if(res.data.status === 1){
                        this.patient = '';
                        this.$toasted.success('Patient Added Successfully',{
                            icon : 'check',
                            type : 'success',
                        });
                        this.$router.push({name:'Patient'});
                    }
                }).catch(error => {
                    console.log(error.data.errors)
                })
            }
        }
    }
</script>

<style scoped>

</style>
