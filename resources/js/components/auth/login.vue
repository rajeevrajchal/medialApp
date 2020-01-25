<template>

    <div class=" login">
        <div class="wrapper">
            <form class="form-signin" @submit.prevent="login">
                <h2 class="form-signin-heading"> Sangha Medical</h2>
                <p>Login To Continue</p>
                <input type="text" v-model="logindata.email" class="form-control" name="username"
                       placeholder="Email Address" required="" autofocus=""/>
                <br>
                <input type="password" v-model="logindata.password" class="form-control" name="password"
                       placeholder="Password" required=""/>
                <br>
                <!--                <label class="checkbox">-->
                <!--                    <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me-->
                <!--                </label>-->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>

    </div>


</template>

<script>
    import store from '../../store/store'

    export default {
        name: "Login",
        data() {
            return {
                logindata: {
                    email: '',
                    password: ''
                },
                email: '',
                password: '',
                loginError: false,
                errors: [],
                // isProgress: false,
            }
        },

        methods: {
            login() {
                axios.post('/login', this.logindata).then(res => {
                    console.log(res.data.success);
                    if (res.data.success == true) {
                        setTimeout(() => {
                            store.commit('LoginUser', res.data);
                            this.$router.push({name: 'DIndex'});
                            this.$toasted.success('Login succeed', {
                                icon: 'check',
                                type: 'success',
                            })
                        }, 1000);
                    }
                }).catch(err => {
                    console.log(err.data.data);
                        this.$toasted.show('Oops.. Something Went Wrong..', {
                            type: 'error',
                            icon: 'close',
                        });
                })
            },

        }
    }
</script>

<style scoped>
    .login {
        text-align: center;
        margin-top: 13%;
    }

    .wrapper {
        margin-top: 80px;
        margin-bottom: 80px;
    }

    .form-signin {
        max-width: 380px;
        padding: 15px 35px 45px;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .form-signin-heading,
    .checkbox {
        margin-bottom: 30px;
    }

    .checkbox {
        font-weight: normal;
    }

    .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
    }


</style>
