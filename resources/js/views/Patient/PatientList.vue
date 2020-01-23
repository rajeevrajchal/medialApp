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
                                <div class="search-wrapper input-group no-border">
                                    <input type="text" v-model="search" class="form-control" placeholder="For Better Search... Prefer Ticket No">
                                </div>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">

                                <thead>
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
                                <tr v-for="(p, key) in paginatedData" style="width:15px">
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
                                        {{p.address}}{{p.id}}
                                    </td>
                                    <td>
                                        <router-link  v-if="p.isReport" class="btn btn-info btn-sm" :to="{name: 'PatientReportView', params: {id: p.id}}" >Preview</router-link>
                                        <router-link v-else class="btn btn-default btn-sm"
                                                     :to="{name: 'PatientReportCreate', params: {id:p.id,
                                                                                        tn:p.tn,
                                                                                        pA:p.lipid_flag
                                                                                        }}" >
                                                    Create
                                        </router-link>
                                        <i class="material-icons btn btn-danger btn-sm">delete</i>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot >
                                <tr>
                                    <div class="custom-pagination pagination pagination-sm">
                                        <button
                                            :disabled="pageNumber === 0"
                                            @click="prevPage"
                                            class="btn-sm"
                                            >
                                            <<
                                        </button>
                                        <button
                                            :disabled="pageNumber >= pageCount -1"
                                            @click="nextPage"
                                            class="btn-sm">
                                            >>
                                        </button>
                                    </div>
                                </tr>
                                </tfoot>
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
    import Pagination from '../../components/includes/Pagination';
    export default {
        name: "patientIndex",
        data(){
            return{
                patient: new Patient,
                pageNumber: 0,
                size:10,
                search: '',
            }
        },
        computed:{
            pageCount(){
                let l = this.patient.length,
                    s = this.size;
                return Math.ceil(l/s);
            },
            paginatedData(){
                //search and pagination
                const start = this.pageNumber * this.size,
                    end = start + this.size;
                if(this.search){
                    return Object.values(this.patient).filter((item)=>{
                        return this.search.toLowerCase().split(' ').every(
                            v => item.name.toLowerCase().includes(v)||
                                item.tn.toLowerCase().includes(v)||
                                item.address.toLowerCase().includes(v)
                        )
                    })
                }else{
                    return Object.values(this.patient).slice(start, end);
                }

            },

        },
        created(){
            axios.get('/patient').then(res => {
                this.patient = res.data.data;
            }).catch(error => {

            });
        },
        methods:{
            nextPage(){
                this.pageNumber++;
            },
            prevPage(){
                this.pageNumber--;
            },
        }

    }
</script>

<style scoped>
    button{
        width:70px;
        height:35px;
        background-color:#eef;
        margin-left: 2px;
    }

    button:hover{
        cursor:pointer;
    }
    button:hover:disabled{
        cursor:not-allowed;
    }
    .custom-pagination{
        margin-top: 10px;
    }
</style>
