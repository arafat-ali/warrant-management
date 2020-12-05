import Vue from 'vue';
import Router from 'vue-router';

import login from '@/components/dashboard/login';
import dashboard from '@/components/dashboard/home';
import warrantAdd from '@/components/dashboard/warrant-add';
import warrantList from '@/components/dashboard/warrant-list';
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

export default router;