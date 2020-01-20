<template>
    <div>
        <loader/>
        <router-view/>
    </div>

</template>

<script>
    import loader from '../components/includes/loader'
    export default {
        name: "App",
        components:{
            loader
        }
    }
</script>

<style scoped>

</style>
