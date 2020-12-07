import Vue from 'vue';
import Router from 'vue-router';

import login from '@/components/dashboard/login';
import registration from '@/components/dashboard/registration';
import dashboard from '@/components/dashboard/home';
import warrantAdd from '@/components/dashboard/warrant-add';
import warrantList from '@/components/dashboard/warrant-list';
import ImportFromCI from '@/components/dashboard/importFromCI';
import ImportFromThana from '@/components/dashboard/importFromThana';

import warrantAddThana from '@/components/dashboard/warrant-add-thana';
import warrantListThana from '@/components/dashboard/warrant-list-thana';

import crimeTypeList from '@/components/dashboard/crime_type';
import courtList from '@/components/dashboard/court_list';

import Statistics from '@/components/dashboard/statistics';



Vue.use(Router);

const router = new Router({
	mode: 'history',
	routes: [
		{
			path: '/login',
			name: 'login',
			component: login,
		},
		{
			path: '/registration',
			name: 'registration',
			component: registration,
		},
		{
			path: '/dashboard',
			name: 'dashboard',
			component: dashboard,
			meta: {requiresAuth: true}
		},
		{

			path: '/warrant-add',
			name: 'warrantAdd',
			component: warrantAdd,
		},
		{
			path: '/warrant-list',
			name: 'warrantList',
			component: warrantList,
			meta: {requiresAuth: true}
		},
		{
			path: '/import-from-CI',
			name: 'ImportFromCI',
			component: ImportFromCI,
			meta: {requiresAuth: true}
		},
		{
			path: '/import-from-thana',
			name: 'ImportFromThana',
			component: ImportFromThana,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-add-thana',
			name: 'warrantAddThana',
			component: warrantAddThana,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-list-thana',
			name: 'warrantListThana',
			component: warrantListThana,
			meta: {requiresAuth: true}
		},
		{
			path: '/crime-type',
			name: 'crimeTypeList',
			component: crimeTypeList,
			meta: {requiresAuth: true}
		},
		{
			path: '/court-list',
			name: 'courtList',
			component: courtList,
			meta: {requiresAuth: true}
		},
		{
			path: '/statistics',
			name: 'statistics',
			component: Statistics,
			meta: {requiresAuth: true}
		},
	]
});

router.beforeEach((to, from, next) => {

	if(from.name=='create' && to.name=='login' && store.getters.getCurrentUser){
		next({name: from.name })
	}

	if (to.meta.requiresAuth){
		//var isLoggedIn = Store.getters.getCurrentUser ? true : false
		//var hasToken = Store.getters.getAccessToken.access_token ? true : false
		store.dispatch('getCurrentUser')
			.then(resp => {
				next()
			})
			.catch(err => {
				next({name: 'login'})
			})
	}
	else next()
})

export default router;