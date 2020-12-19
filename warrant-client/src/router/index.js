import Vue from 'vue';
import Router from 'vue-router';

import login from '@/components/dashboard/login';
import registration from '@/components/dashboard/registration';
import dashboard from '@/components/dashboard/home';
import dashboardCI from '@/components/dashboard/homeCI';
import dashboardSP from '@/components/dashboard/homeSP';
import dashboardDIG from '@/components/dashboard/homeDIG';
import dashboardOC from '@/components/dashboard/homeOC';
import dashboardSI from '@/components/dashboard/homeSI';
import warrantAdd from '@/components/dashboard/warrant-add';
import warrantList from '@/components/dashboard/warrant-list';
import ImportFromCI from '@/components/dashboard/importFromCI';
import ImportFromThana from '@/components/dashboard/importFromThana';

import warrantAddThana from '@/components/dashboard/warrant-add-thana';
import warrantListThanaNotAssigned from '@/components/dashboard/warrant-list-thana-not-assigned';
import warrantListThanaAssigned from '@/components/dashboard/warrant-list-thana-assigned';

import crimeTypeList from '@/components/dashboard/crime_type';
import courtList from '@/components/dashboard/court_list';

import Statistics from '@/components/dashboard/statistics';

import warrantAddSp from '@/components/dashboard/warrant-add-sp';
import warrantListSp from '@/components/dashboard/warrant-list-sp';
import warrantListPending from '@/components/dashboard/warrant-list-pending';
import warrantListExecuted from '@/components/dashboard/warrant-list-executed';

import warrantListDig from '@/components/dashboard/warrant-list-dig';


import warrantListSI from '@/components/dashboard/warrantListSI';
import warrantListCompletedSI from '@/components/dashboard/warrantListCompletedSI';
import SIActivity from '@/components/dashboard/warrant_si_activity';

import siPerformanceDIG from '@/components/dashboard/siPerformanceDIG';
import siPerformanceSP from '@/components/dashboard/siPerformanceSP';
import siPerformanceOC from '@/components/dashboard/siPerformanceOC';

import warrantListPendingCI from '@/components/dashboard/warrantListPendingCI';
import warrantListExecutedCI from '@/components/dashboard/warrantListExecutedCI';
import warrantListPendingDIG from '@/components/dashboard/warrantListPendingDIG';
import warrantListExecutedDIG from '@/components/dashboard/warrantListExecutedDIG';


import dashboradWarrantOC from '@/components/dashboard/dashboard_warrant_OC';
import warrantListSP from '@/components/dashboard/warrantListSP';
import todayWarrantListCI from '@/components/dashboard/todayWarrantListCI';
import todayWarrantListSP from '@/components/dashboard/todayWarrantListSP';
import todayWarrantListDIG from '@/components/dashboard/todayWarrantListDIG';
import todayWarrantListOC from '@/components/dashboard/todayWarrantListOC';
import todayWarrantListSI from '@/components/dashboard/todayWarrantListSI';

import warrantRecalledOC from '@/components/dashboard/warrant_recalled_oc';
import warrantRecalledSI from '@/components/dashboard/warrant_recalled_si';


import report from '@/components/dashboard/report';



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
			meta: {requiresAuth: true}
		},
		{
			path: '/dashboard',
			name: 'dashboard',
			component: dashboard,
			meta: {requiresAuth: true}
		},
		{
			path: '/dashboard-ci',
			name: 'dashboardCI',
			component: dashboardCI,
			meta: {requiresAuth: true}
		},
		{
			path: '/dashboard-sp',
			name: 'dashboardSP',
			component: dashboardSP,
			meta: {requiresAuth: true}
		},
		{
			path: '/dashboard-dig',
			name: 'dashboardDIG',
			component: dashboardDIG,
			meta: {requiresAuth: true}
		},
		{
			path: '/dashboard-oc',
			name: 'dashboardOC',
			component: dashboardOC,
			meta: {requiresAuth: true}
		},
		{
			path: '/dashboard-si',
			name: 'dashboardSI',
			component: dashboardSI,
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
			path: '/warrant-list-thana-not-assigned',
			name: 'warrantListThanaNotAssigned',
			component: warrantListThanaNotAssigned,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-list-thana-assigned',
			name: 'warrantListThanaAssigned',
			component: warrantListThanaAssigned,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-add-sp',
			name: 'warrantAddSp',
			component: warrantAddSp,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-list-sp',
			name: 'warrantListSp',
			component: warrantListSp,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-list-pending',
			name: 'warrantListPending',
			component: warrantListPending,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-list-executed',
			name: 'warrantListExecuted',
			component: warrantListExecuted,
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
		{
			path: '/warrant-list-dig',
			name: 'warrantListDig',
			component: warrantListSp,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-list-si',
			name: 'warrantListSI',
			component: warrantListSI,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-list-si-completed',
			name: 'warrantListCompletedSI',
			component: warrantListCompletedSI,
			meta: {requiresAuth: true}
		},
		{
			path: '/si-activity/:id',
			name: 'SIActivity',
			component: SIActivity,
			meta: {requiresAuth: true}
		},
		{
			path: '/dig-si-performance',
			name: 'siPerformanceDIG',
			component: siPerformanceDIG,
			meta: {requiresAuth: true}
		},
		{
			path: '/sp-si-performance',
			name: 'siPerformanceSP',
			component: siPerformanceSP,
			meta: {requiresAuth: true}
		},
		{
			path: '/oc-si-performance',
			name: 'siPerformanceOC',
			component: siPerformanceOC,
			meta: {requiresAuth: true}
		},
		{
			path: '/ci-warrant-list-pending',
			name: 'warrantListPendingCI',
			component: warrantListPendingCI,
			meta: {requiresAuth: true}
		},
		{
			path: '/ci-warrant-list-executed',
			name: 'warrantListExecutedCI',
			component: warrantListExecutedCI,
			meta: {requiresAuth: true}
		},
		{
			path: '/dig-warrant-list-pending',
			name: 'warrantListPendingDIG',
			component: warrantListPendingDIG,
			meta: {requiresAuth: true}
		},
		{
			path: '/dig-warrant-list-executed',
			name: 'warrantListExecutedDIG',
			component: warrantListExecutedDIG,
			meta: {requiresAuth: true}
		},
		{
			path: '/dashboard-warrant-oc/:id',
			name: 'dashboradWarrantOC',
			component: dashboradWarrantOC,
			meta: {requiresAuth: true}
		},
		{
			path: '/sp-warrant-list',
			name: 'warrantListSP',
			component: warrantListSP,
			meta: {requiresAuth: true}
		},		
		{
			path: '/ci-today-warrant-list/:id',
			name: 'todayWarrantListCI',
			component: todayWarrantListCI,
			meta: {requiresAuth: true}
		},
		{
			path: '/sp-today-warrant-list/:id',
			name: 'todayWarrantListSP',
			component: todayWarrantListSP,
			meta: {requiresAuth: true}
		},
		{
			path: '/dig-today-warrant-list/:id',
			name: 'todayWarrantListDIG',
			component: todayWarrantListDIG,
			meta: {requiresAuth: true}
		},
		{
			path: '/oc-today-warrant-list/:id',
			name: 'todayWarrantListOC',
			component: todayWarrantListOC,
			meta: {requiresAuth: true}
		},
		{
			path: '/si-today-warrant-list/:id',
			name: 'todayWarrantListSI',
			component: todayWarrantListSI,
			meta: {requiresAuth: true}
		},
    	{
			path: '/warrant-recalled-oc',
			name: 'warrantRecalledOC',
			component: warrantRecalledOC,
			meta: {requiresAuth: true}
		},
		{
			path: '/warrant-recalled-si',
			name: 'warrantRecalledSI',
			component: warrantRecalledSI,
			meta: {requiresAuth: true}
		},
		{
			path: '/report',
			name: 'report',
			component: report,
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