import Vue from 'vue';
import Router from 'vue-router';

import login from '@/components/dashboard/login';
import dashboard from '@/components/dashboard/home';
import warrantAdd from '@/components/dashboard/warrant-add';
import warrantList from '@/components/dashboard/warrant-list';
import ImportFromCI from '@/components/dashboard/importFromCI';

import warrantAddThana from '@/components/dashboard/warrant-add-thana';
import warrantListThana from '@/components/dashboard/warrant-list-thana';


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
			path: '/dashboard',
			name: 'dashboard',
			component: dashboard,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant',
			name: 'warrant',
			component: warrant,
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
			path: '/warrant-add-thana',
			name: 'warrantAddThana',
			component: warrantAddThana,
		},
		{
			path: '/warrant-list-thana',
			name: 'warrantListThana',
			component: warrantListThana,
		},
	]
});

router.beforeEach((to, from, next) => {
	// console.log('-----to-----')
	// console.log(to)
	// console.log('-----to name-----')
	// console.log(to.name)
	// console.log('-----from-----')
	// console.log(from)
	// console.log('-----from name-----')
	// console.log(from.name)

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