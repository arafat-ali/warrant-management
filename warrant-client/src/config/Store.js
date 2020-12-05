import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import axios from 'axios';
import API from './API'

Vue.use(Vuex);

const Store = new Vuex.Store({
	plugins: [createPersistedState()],

	state: {
		tokens: {
			access_token: '',
			expires_in: null,
			refresh_token: null,
			token_type: null,
		},
		currentUser:null,
		sideBarOpen: false,
		warrants: []
	},
	actions: {
		toggleSidebar(context) {
            context.commit('toggleSidebar')
        },
		login(context, user) {
			return new Promise((resolve, reject) => {
				let data = {
					client_id: 2,
					client_secret:'IWdtdmZTcX1JepqixsOR2TSJSzRMzRzgA8AhDRlz',


					grant_type:'password',
					username: user.email,
					password: user.password,
				};

				axios
					.post(API.login, data)
					.then(response => {
						let responseData = response.data;
						//let now = Date.now();
						//console.log(responseData);

						// responseData.expires_in = responseData.expires_in + now;
						// responseData.expires_in = responseData.expires_in + now;

						context.commit('updateTokens', responseData);
						//localStorage.setItem('token',responseData.access_token);

						axios.defaults.headers.common['Authorization'] = `Bearer ${responseData.access_token}`;

						resolve(response);
					})
					.catch(response => {
						reject(response);
					});
			});
		},
		getCurrentUser(context) {
			return new Promise((resolve, reject) => {
				axios
					.get(API.user)
					.then(response => {
						let responseData = response.data;

						context.commit('updateCurrentUser', responseData);
						resolve(response);
					})
					.catch(response => {
						reject(response);
					});
			});
		},
		logout(context) {
			return new Promise((resolve, reject) => {
				context.commit('logout');
				delete axios.defaults.headers.common['Authorization'];
				//localStorage.removeItem('token');
				resolve();
			}).catch(response => {
				reject(response);
			});
		},

		fetchAllWarrants(context){
			return new Promise((resolve, reject) => {
				axios
					.get(API.warrants)
					.then(response => {
						let responseData = response.data.Warrants;
						context.commit('updateWarrants', responseData);
						resolve(response);
					})
					.catch(response => {
						reject(response);
					});
			});
		},

	},

	mutations: {
		toggleSidebar (state) {
            state.sideBarOpen = !state.sideBarOpen
        },
		updateTokens(state, tokens) {
			state.tokens = tokens;
		},
		updateCurrentUser(state, currentUser) {
			state.currentUser = currentUser;
		},
		logout(state) {
			state.currentUser = null;
			state.tokens = null;
		},
		updateWarrants(state, warrants){
			state.warrants = warrants;
		},


	},

	getters: {
		sideBarOpen: state => {
            return state.sideBarOpen
        },
		getAccessToken(state) {
			return state.tokens;
		},
		getCurrentUser(state) {
			return state.currentUser;
		},
		getAllWarrants(state){
			return state.warrants;
		}
		
	},
});

export default Store;