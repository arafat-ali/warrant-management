import Vue from 'vue';
import Router from 'vue-router';

import dashboard from '@/components/dashboard/home';
import warrant from '@/components/dashboard/warrant';
import login from '@/components/dashboard/login';
import warrantList from '@/components/dashboard/warrant-list';
import ImportFromCI from '@/components/dashboard/importFromCI';

Vue.use(Router);

const router = new Router({
	mode: 'history',
	routes: [
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
			path: '/login',
			name: 'login',
			component: login,
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