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
		warrants: [],
		nonAssignedWarrants:[],
		assignedWarrants: []
	},
	actions: {
		toggleSidebar(context) {
            context.commit('toggleSidebar')
        },
		login(context, user) {
			return new Promise((resolve, reject) => {
				let data = {
					client_id: 2,
					client_secret:'ms7tOMGnTNvZePaoNLjxzjv8RKyictYTMaDEL5xp',


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

		fetchCourtWarrants(context){
			return new Promise((resolve, reject) => {
				axios
					.get(API.warrantsCourt)
					.then(response => {
						let responseData = response.data.Warrants;
						context.commit('updateCourtWarrants', responseData);
						resolve(response);
					})
					.catch(response => {
						reject(response);
					});
			});
		},

		fetchThanaWarrants(context){
			return new Promise((resolve, reject) => {
				axios
					.get(API.warrantsThana)
					.then(response => {
						let responseData = response.data.Warrants;
						context.commit('updateThanaWarrants', responseData);
						resolve(response);
					})
					.catch(response => {
						reject(response);
					});
			});
		},
		fetchAssignedThanaWarrants(context){
			return new Promise((resolve, reject) => {
				axios
					.get('api/warrants-thana-assigned')
					.then(response => {
						let responseData = response.data.Warrants;
						context.commit('updateAssignedThanaWarrants', responseData);
						resolve(response);
					})
					.catch(response => {
						reject(response);
					});
			});
		},
		fetchNonAssignedThanaWarrants(context){
			return new Promise((resolve, reject) => {
				axios
					.get('api/warrants-thana-non-assigned')
					.then(response => {
						let responseData = response.data.Warrants;
						context.commit('updateNonAssignedThanaWarrants', responseData);
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
		updateCourtWarrants(state, warrants){
			state.warrants = warrants;
		},
		updateThanaWarrants(state, warrants){
			state.warrants = warrants;
		},
		updateAssignedThanaWarrants(state, warrants){
			state.assignedWarrants = warrants;
		},
		updateNonAssignedThanaWarrants(state, warrants){
			state.nonAssignedWarrants = warrants;
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
		getCourtWarrants(state){
			return state.warrants;
		},
		getThanaWarrants(state){
			return state.warrants;
		},
		getNonAssignedThanaWarrants(state){
			return state.nonAssignedWarrants;
		},
		getAssignedThanaWarrants(state){
			return state.assignedWarrants;
		}

		
	},
});

export default Store;