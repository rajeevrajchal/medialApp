<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card-body">
                    <div class="card-list">
                        <div>
                            <h3>Test To Do</h3>
                        </div>
                        <div class="row">
                            <button v-if="!patient.lipid_flag" type="button" class="btn btn-default btn-sm"  @click="openLipidModal(id)"
                                    data-toggle="modal" data-target="#exampleModal1">
                                <strong>Lipid Test</strong>
                            </button>
                            <button v-if="!patient.serology_flag" type="button" class="btn btn-default btn-sm"  @click="openSerologyModal(id)"
                                    data-toggle="modal" data-target="#exampleModal1">
                                <strong>Serology Test</strong>
                            </button>
                            <button v-if="!patient.lipid_flag" type="button" class="btn btn-default btn-sm"  @click="openSerologyModal(id)"
                                    data-toggle="modal" data-target="#exampleModal1">
                                <strong>Lipid Test</strong>
                            </button>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="card-list">
                        <div>
                            <h3>Test Performed</h3>
                        </div>
                        <div class="row">
                            <button v-if="patient.lipid_flag" class="btn btn-default btn-sm"disabled>
                                <strong>Lipid Test</strong>
                            </button>
                            <button v-if="patient.serology_flag" class="btn btn-default btn-sm" disabled>
                                <strong>Serology Test</strong>
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-body">
                <div class="card-list">
                    <button>
                        <router-link  class="btn btn-default btn-sm"
                                      :to="{name: 'PatientReportView', params: {id:this.id,
                                                                                 tn:this.tn,
                                                                                 }}"
                        >
                            Preview
                        </router-link>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "CreateReport",
        data(){
          return{
              patient:[],
            }
        },
        props:{
            id:{
                required: true,
                type: Number
            },
            tn:{
                required:true,
                type:String,
            },
        },
        created() {
            axios.get('/patient',this.id).then(res =>{
                this.patient = res.data.data[0];

                console.log(this.patient)
            });

            eventBus.$on('open-refresh-modal',() =>{
                location.reload();
                this.isActive= false;
            });
        },
        methods:{
            openLipidModal(id){
                eventBus.$emit('open-add-lipid-modal',id);

            },
            openSerologyModal(id){
                console.log('i click in openSerologyModal');
                eventBus.$emit('open-add-serology-modal');
            }
        }
    }
</script>

<style scoped>

</style>
