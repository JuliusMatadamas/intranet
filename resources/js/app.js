/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex'

Vue.use(Vuex)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('login-view', require('./views/Login.vue').default);
Vue.component('email-component', require('./components/EmailComponent').default);
Vue.component('password-component', require('./components/PasswordComponent').default);
Vue.component('empresa-component', require('./components/EmpresaComponent').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
	state: {
		empresas: []
	},
    getters: {
        empresas: state => state.empresas
    },
	mutations: {
	},
    actions: {
        GET_EMPRESAS({commit}){
            let uri = location.protocol + '//' + location.hostname + ':' + location.port + '/api/empresas';
            axios.get(uri)
                .then(function(response){
                    commit('SET_EMPRESAS', response.data)
                })
                .catch(function(error){
                    console.log( error )
                    commit('RESET_EMPRESAS')
                })
        }
    },
    mutations: {
        RESET_EMPRESAS(state){
            state.empresas = []
        },
        SET_EMPRESAS(state, empresas){
            state.empresas = empresas
        }
    }
})

const app = new Vue({
    el: '#app',
    store,
    methods: {
    	showHideNav(){
    		let s = document.querySelector("#sidebar");
    		let c = document.querySelector("#content");
    		s.classList.toggle('active');
    		c.classList.toggle('active');
    	}
    }
});
