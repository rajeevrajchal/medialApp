<template>
    <div class="wrapper ">
        <sideBar/>
        <div class="main-panel">
            <navBar/>
            <div class="content">
                <router-view/>
    <!--             modal   -->
                <LipidModal/>
                <SerologyModal/>
            </div>
            <Footer/>
        </div>
    </div>
</template>

<script>
    import navBar from '../includes/navbar';
    import sideBar from "../includes/sidebar";
    import Footer from "../includes/footer";
    import LipidModal from "../PatientTest/LipidModal";
    import SerologyModal from "../PatientTest/SerologyModal";
    export default {
        name: "Dashboard",
        components:{
            navBar,
            sideBar,
            Footer,
            //modal
            LipidModal,
            SerologyModal
        }
    }
</script>

<style scoped>

</style>
