/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
import moment from 'moment';

Vue.use(Vuex);

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
Vue.component('cliente-component', require('./components/ClienteComponent').default);
Vue.component('nombre-plan', require('./components/NombrePlanComponent').default);
Vue.component('fecha-inicio', require('./components/FechaInicioComponent').default);
Vue.component('fecha-termino', require('./components/FechaTerminoComponent').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
	state: {
		empresas: [],
        clientes: [],
        fechaInicio: new Date(),
        fechaTermino: new Date(),
        disabledFechaTermino: false
	},
    getters: {
        empresas: state => state.empresas,
        clientes: state => state.clientes,
        fechaInicio: state => state.fechaInicio,
        fechaTermino: state => state.fechaTermino,
        disabledFechaTermino: state => state.disabledFechaTermino,
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
        },
        GET_CLIENTES({commit}, id){
            let uri = location.protocol + '//' + location.hostname + ':' + location.port + '/api/clientes/' + id;
            axios.get(uri)
                .then(function(response){
                    commit('SET_CLIENTES', response.data)
                })
                .catch(function(error){
                    console.log( error )
                    commit('RESET_CLIENTES')
                })
        },
        GET_FECHA_INICIO({commit}, d){
            commit('SET_FECHA_INICIO', d)
        },
        GET_FECHA_TERMINO({commit}, d){
            commit('SET_FECHA_TERMINO', d)
        }
    },
    mutations: {
        RESET_EMPRESAS(state){
            state.empresas = []
        },
        SET_EMPRESAS(state, empresas){
            state.empresas = empresas
        },
        RESET_CLIENTES(state){
            state.clientes = []
        },
        SET_CLIENTES(state, clientes){
            state.clientes = clientes
        },
        SET_FECHA_INICIO(state, d){
            state.fechaInicio = d
        },
        SET_FECHA_TERMINO(state, d){
            state.fechaTermino = d
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
    	},
        bloquearFechaTermino(){
    	    this.$store.state.disabledFechaTermino = !this.$store.state.disabledFechaTermino;
        },
        validarPlan(){
    	    let empresaId = document.querySelector("#empresa_id");
    	    let clienteId = document.querySelector("#cliente_id");
    	    let nombrePlan = document.querySelector("#nombre_plan");
    	    let fi = this.$store.state.fechaInicio;
    	    let ft = this.$store.state.fechaTermino;
    	    let cb = document.querySelector("#sinFechaTermino");
    	    let btn = document.querySelector("#btn-submit");
    	    let msj = document.querySelector("#msj");
            let uri = location.protocol + '//' + location.hostname + ':' + location.port + '/rh/planes';
    	    if(empresaId.value == 0){
    	        btn.classList.add('is-invalid');
    	        msj.classList.add('invalid-feedback');
    	        msj.innerHTML = "Seleccione la empresa";
            }
    	    else
            {
                if(clienteId.value == 0 || clienteId.value == '')
                {
                    btn.classList.add('is-invalid');
                    msj.classList.add('invalid-feedback');
                    msj.innerHTML = "Seleccione el cliente";
                }
                else
                {
                    if(nombrePlan.value < 5)
                    {
                        btn.classList.add('is-invalid');
                        msj.classList.add('invalid-feedback');
                        msj.innerHTML = "El nombre del plan debe tener mínimo 5 caracteres.";
                    }
                    else
                    {
                        if(nombrePlan.classList.contains('is-invalid'))
                        {
                            btn.classList.add('is-invalid');
                            msj.classList.add('invalid-feedback');
                            msj.innerHTML = "Atienda al mensaje del nombre del plan.";
                        }
                        else
                        {
                            let f1 = moment(fi).format("YYYY-MM-DD");
                            let f2 = moment(ft).format("YYYY-MM-DD");
                            if(!cb.checked)
                            {
                                if(f2 < f1)
                                {
                                    btn.classList.add('is-invalid');
                                    msj.classList.add('invalid-feedback');
                                    msj.innerHTML = "La fecha de término del plan no puede ser anterior a la fecha de inicio.";
                                }
                                else
                                {
                                    btn.classList.add('is-valid');
                                    msj.classList.add('valid-feedback');
                                    msj.innerHTML = "Espere mientras se guardan los datos.";
                                    axios.post(uri, {
                                        empresa_id: empresaId.value,
                                        cliente_id: clienteId.value,
                                        nombre: nombrePlan.value,
                                        inicia: f1,
                                        termina: f2
                                    })
                                        .then(function (response) {
                                            btn.classList.add('is-valid');
                                            msj.classList.add('valid-feedback');
                                            msj.innerHTML = "El plan se guardó con éxito.";
                                        })
                                        .catch(function (error) {
                                            btn.classList.add('is-invalid');
                                            msj.classList.add('invalid-feedback');
                                            msj.innerHTML = "No se pudo guardar el plan.";
                                        });
                                }
                            }
                            else
                            {
                                btn.classList.add('is-valid');
                                msj.classList.add('valid-feedback');
                                msj.innerHTML = "Espere mientras se guardan los datos.";
                                axios.post(uri, {
                                    empresa_id: empresaId.value,
                                    cliente_id: clienteId.value,
                                    nombre: nombrePlan.value,
                                    inicia: f1,
                                    termina: null
                                })
                                    .then(function (response) {
                                        btn.classList.add('is-valid');
                                        msj.classList.add('valid-feedback');
                                        msj.innerHTML = "El plan se guardó con éxito.";
                                    })
                                    .catch(function (error) {
                                        btn.classList.add('is-invalid');
                                        msj.classList.add('invalid-feedback');
                                        msj.innerHTML = "No se pudo guardar el plan.";
                                    });
                            }
                        }
                    }
                }
            }
        }
    }
});
