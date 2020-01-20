<template>
    <div class='loader-container' :class='{"show": getLoadingStatus, "hidden": !getLoadingStatus}'>
        <div class="loader-content">
            <i class="fas fa-sync fa-spin"></i>
            <div class="loading">
                {{ getLoadingMessage }}
            </div>
        </div>
    </div>
</template>

<script>
    import Vuex from 'Vuex'
    export default {
        name: "loader",
        computed: {
            ...Vuex.mapGetters([
                'getLoadingStatus',
                'getLoadingMessage'
            ])

        },
    }
</script>

<style scoped>
    .loader-container {
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        left: 0;
        top: 0;
    }

    .loader-content {
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translateX(-50%);
        border-radius: .3rem;
        padding: 20px;
        box-sizing: border-box;
        background: white;
        box-shadow: 0 0 .1rem #fefefe;
        text-align: center;
    }

    .loading {
        text-align: center;
    }

    .show {
        visibility: visible;
        opacity: 1;
        z-index: 1;
        transition: opacity 0.5s ease-out, visibility 0.5s ease-out, z-index 0.5s ease-out;
    }

    .hidden {
        visibility: hidden;
        opacity: 0;
        z-index: 0;
        transition: opacity 0.5s ease-out, visibility 0.5s ease-out, z-index 0.5s ease-out;
    }
</style>
