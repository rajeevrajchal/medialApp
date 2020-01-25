<template>
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Sangha Medical
        </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li :class="[currentPage.includes() ? activeClass : '','nav-item']">
                    <router-link :to="{name: 'DIndex'}" class='nav-link'>
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </router-link>
                </li>
                <li :class="[currentPage.includes('patient') ? activeClass : '','nav-item']">
                    <router-link :to="{name: 'Patient'}" class='nav-link'>
                        <i class="material-icons">content_paste</i>
                        <p>Patient Report</p>
                    </router-link>
                </li>
<!--                <li :class="[currentPage.includes('user') ? activeClass : '','nav-item']">-->
<!--                    <router-link :to="{name: 'User'}" class='nav-link'>-->
<!--                        <i class="material-icons">person</i>-->
<!--                        <p>Users</p>-->
<!--                    </router-link>-->
<!--                </li>-->
<!--                <li class="nav-item ">-->
<!--                    <a class="nav-link" href="./typography.html">-->
<!--                        <i class="material-icons">library_books</i>-->
<!--                        <p>About</p>-->
<!--                    </a>-->
<!--                </li>-->
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "sidebar",
        data() {
            return {
                activeClass: 'active'
            }
        },
        computed: {
            currentPage() {
                return this.$route.path;
            }
        },
    }
</script>

<style scoped>

</style>
