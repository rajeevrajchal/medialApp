<template>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <li class='navbar-brand'>
                    <strong>{{currentPage[0].toUpperCase()}}</strong>
                </li>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link :to="{name: 'DIndex'}" class='nav-link'  >
                            <i class="material-icons">dashboard</i>
                            <p class="d-lg-none d-md-block">
                                Stats
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item ">
                        <form  @submit.prevent="logout">
                            <button  class="btn btn-danger  btn-sm waves-effect waves-light submit" type="submit"><i class="material-icons">person</i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
</template>

<script>
    import store from "../../store/store";
    export default {
        name: "navbar",
        computed:{
            currentPage(){
                return this.$route.path.split('/').slice(-1);
            }
        },
        methods: {
            logout(){
                console.log('i am logout');
                axios.get('/logout').then(res => {
                    store.commit('LogoutUser');
                    this.$router.push({name: 'Login'})
                }).catch(err => {
                    console.log(err.data)
                })
            },
        },
    }
</script>

<style scoped>

</style>
