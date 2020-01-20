import Vue from 'Vue'
import Vuex from 'Vuex'

Vue.use(Vuex);

import loader from './loader'

export default new Vuex.Store({
    state:{
        isLoggedIn: !!localStorage.getItem('token'),
        token: localStorage.getItem('token')
    },
    mutations:{
        LoginUser(state, data){
            state.isLoggedIn = true;
            let token = data.access_token;
            state.token = token;
            localStorage.setItem('token', token)
        },
        // logout
        LogoutUser(state) {
            state.isLoggedIn = false;
            state.token = localStorage.removeItem('token')
        },

        // store the token
        tokenStored(state) {
            state.token = localStorage.getItem('token')
        }
    },
    module:{
        loader
    }
})
