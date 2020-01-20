import Vue from 'Vue'
import Vuex from 'Vuex'
Vue.use(Vuex);

export default new Vuex.Store ({
    state: {
        LOADER_loadingStatus: false,
        LOADER_loadingMesage: 'Loading...'
    },
    getters: {
        getLoadingStatus: state => {
            return state.LOADER_loadingStatus;
        },

        getLoadingMessage: state => {
            return state.LOADER_loadingMesage;
        }
    },
    mutations: {
        hideLoadingMessage(state){
            state.LOADER_loadingStatus = false;
            state.LOADER_loadingMesage = "";
        },

        showLoadingMessage(state, message){
            state.LOADER_loadingStatus = true;
            state.LOADER_loadingMesage = message;
        }
    },
    actions: {
        hideLoadingMessage: (context) => {
            context.commit("hideLoadingMessage");
        },

        showLoadingMessage: (context, payload) => {
            context.commit("showLoadingMessage", payload);
        }
    },
})

