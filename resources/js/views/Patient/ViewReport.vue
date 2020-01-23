<template>
    <p>I am report</p>
</template>

<script>
    export default {
        name: "ViewReport",
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
            console.log("view createdma aayo ra id:",this.id)
        }
    }
</script>

<style scoped>

</style>
