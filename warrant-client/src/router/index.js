import Vue from 'vue';
import Router from 'vue-router';

import dashboard from '@/components/dashboard/home';
import warrant from '@/components/dashboard/warrant';
import login from '@/components/dashboard/login';
import warrantList from '@/components/dashboard/warrant-list';

Vue.use(Router);

const router = new Router({
	mode: 'history',
	routes: [
		{
			path: '/dashboard',
			name: 'dashboard',
			component: dashboard,
		},
		{
			path: '/warrant',
			name: 'warrant',
			component: warrant,
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
		},
	]
});

export default router;