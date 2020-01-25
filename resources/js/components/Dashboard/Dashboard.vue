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
                <Urine/>
                <Hematology/>
                <Biochemistry/>

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
    import Urine from "../PatientTest/Urine";
    import Hematology from "../PatientTest/Hematology";
    import Biochemistry from "../PatientTest/BioChemistry";

    export default {
        name: "Dashboard",
        components: {
            navBar,
            sideBar,
            Footer,

            //modal
            LipidModal,
            SerologyModal,
            Urine,
            Hematology,
            Biochemistry,
        }
    }
</script>

<style scoped>

</style>
