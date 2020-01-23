<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-6"><h4 class="card-title">Patient Report</h4></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><h4 class="card-title">Perform Test</h4></div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="card-list">
                            <div></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-sm"  @click="openLipidModal(id)" data-toggle="modal" data-target="#exampleModal1">
                                        <strong>View Lipid Data {{pA}}</strong>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button  type="button" class="btn btn-default btn-sm"  @click="openLipidModal(id)" data-toggle="modal" data-target="#exampleModal1">
                                        <strong>Lipid Test</strong>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-list">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-sm" @click="openSerologyModal()" data-toggle="modal" data-target="#exampleModal2">
                                        <strong>Serology Test</strong>
                                    </button>
                                </div>
<!--                                <div class="col-md-6">-->
<!--                                    <button type="button" class="btn btn-default btn-sm"  @click="openSerologyModal()" data-toggle="modal" data-target="#exampleModal1">-->
<!--                                        <strong>View Serology Data</strong>-->
<!--                                    </button>-->
<!--                                </div>-->
                            </div>

                        </div>
                    </div>
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
                patient: {},
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
            pA:{
                required:true,
                type:Boolean,
            }
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
