<template>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <router-link :to="{name: 'Patient'}" class='nav-link'>
                            <p>Patient Report</p>
                        </router-link>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right" id="date">
                copyright <i class="material-icons">copyright</i> by
                <a href="https://www.creative-tim.com" target="_blank">Sangha Medical</a>
            </div>
        </div>
    </footer>

</template>

<script>
    export default {
        name: "footer"
    }
</script>

<style scoped>

</style>
