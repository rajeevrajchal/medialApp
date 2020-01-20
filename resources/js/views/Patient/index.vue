<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-10">
                               <h4 class="card-title">List of Patient Report</h4>
                            </div>
                            <div class="col-md-2">
                                <router-link class=" btn btn-default btn-sm" :to="{name:'PatientForm'}">Add Patient</router-link>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class=" text-primary">
                                <th>
                                    Ticket No
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Gender
                                </th>
                                <th>
                                    Age
                                </th>
                                <th>
                                    Address
                                </th>

                                <th>
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                <tr v-for="(p, key) in patient">
                                    <td>
                                        {{p.tn}}
                                    </td>
                                    <td>
                                        {{p.name}}
                                    </td>
                                    <td>
                                        {{p.gender}}
                                    </td>
                                    <td>
                                        {{p.age}}
                                    </td>
                                    <td>
                                        {{p.address}}
                                    </td>
                                    <td>
                                        <router-link  v-if="p.isReport" class="btn btn-info btn-sm" :to="{name: 'PatientReportView', params: {id: key}}" >Preview</router-link>
                                        <router-link v-else class="btn btn-default btn-sm" :to="{name: 'PatientReportCreate', params: {id:key}}" >Create</router-link>
                                        <i class="material-icons btn btn-danger btn-sm">delete</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Patient from "../../model/Patient";
    export default {
        name: "patientIndex",
        data(){
            return{
                patient: new Patient,
            }
        },
        created(){
            axios.get('/patient').then(res => {
                this.patient = res.data.data;
            }).catch(error => {

            })
        }
    }
</script>

<style scoped>

</style>
