<template>
    <div class="wrapper ">
        <sideBar/>
        <div class="main-panel">
            <navBar/>
            <div class="content">
                <router-view/>
            </div>
            <Footer/>
        </div>
    </div>
</template>

<script>
    import navBar from '../includes/navbar';
    import sideBar from "../includes/sidebar";
    import Footer from "../includes/footer";
    export default {
        name: "Dashboard",
        components:{
            navBar,
            sideBar,
            Footer
        }
    }
</script>

<style scoped>

</style>
