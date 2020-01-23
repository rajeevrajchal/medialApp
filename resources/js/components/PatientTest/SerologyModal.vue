<template>
    <div class="modal fade" v-if="isActive" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Serology Test</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SerologyModal",
        data(){
            return{
                isActive: false,
            }
        },
        created() {
            eventBus.$on('open-add-serology-modal',() =>{
                this.isActive = true;
                console.log('I am add serology model opneddddd')
            })
        }
    }
</script>

<style scoped>

</style>
