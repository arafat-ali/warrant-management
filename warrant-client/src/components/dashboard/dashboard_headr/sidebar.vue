<template>
    <!-- give the sidebar z-50 class so its higher than the navbar if you want to see the logo -->
    <!-- you will need to add a little "X" button next to the logo in order to close it though -->
    <div class="w-1/2 md:w-1/3 lg:w-64 fixed md:top-0 md:left-0 h-screen lg:block bg-gray-100 border-r z-30" :class="sideBarOpen ? '' : 'hidden'" id="main-nav">

          <div class="w-full h-20 border-b flex px-4 items-center mb-8">
            <p class="font-semibold text-3xl text-blue-400 pl-4">LOGO</p>
          </div>

          
          <div class="mb-4 px-4">
            <p class="pl-4 text-sm font-semibold mb-1">MAIN</p>
            <router-link :to="{ name: 'dashboard' }">
              <div class="w-full flex items-center text-blue-400 h-10 pl-4 bg-gray-200 hover:bg-gray-200 rounded-lg cursor-pointer">
                <svg class="h-6 w-6 fill-current mr-2" viewBox="0 0 20 20">
                  <path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
                </svg>
                <span class="text-gray-700">Dashboard</span>
              </div>
            </router-link>
            <router-link v-show="user.role_id==1" :to="{ name: 'warrantAdd' }">
             <div class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer">

              <svg class="h-6 w-6 fill-current mr-2" viewBox="0 0 20 20">
              <path d="M14.613,10c0,0.23-0.188,0.419-0.419,0.419H10.42v3.774c0,0.23-0.189,0.42-0.42,0.42s-0.419-0.189-0.419-0.42v-3.774H5.806c-0.23,0-0.419-0.189-0.419-0.419s0.189-0.419,0.419-0.419h3.775V5.806c0-0.23,0.189-0.419,0.419-0.419s0.42,0.189,0.42,0.419v3.775h3.774C14.425,9.581,14.613,9.77,14.613,10 M17.969,10c0,4.401-3.567,7.969-7.969,7.969c-4.402,0-7.969-3.567-7.969-7.969c0-4.402,3.567-7.969,7.969-7.969C14.401,2.031,17.969,5.598,17.969,10 M17.13,10c0-3.932-3.198-7.13-7.13-7.13S2.87,6.068,2.87,10c0,3.933,3.198,7.13,7.13,7.13S17.13,13.933,17.13,10"></path>
              </svg>
              <span class="text-gray-700">নতুন ওয়ারেন্ট</span>
              
            </div>
            </router-link>
            <router-link v-show="user.role_id==4" :to="{ name: 'warrantAddThana' }">
             <div class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer">

              <svg class="h-6 w-6 fill-current mr-2" viewBox="0 0 20 20">
              <path d="M14.613,10c0,0.23-0.188,0.419-0.419,0.419H10.42v3.774c0,0.23-0.189,0.42-0.42,0.42s-0.419-0.189-0.419-0.42v-3.774H5.806c-0.23,0-0.419-0.189-0.419-0.419s0.189-0.419,0.419-0.419h3.775V5.806c0-0.23,0.189-0.419,0.419-0.419s0.42,0.189,0.42,0.419v3.775h3.774C14.425,9.581,14.613,9.77,14.613,10 M17.969,10c0,4.401-3.567,7.969-7.969,7.969c-4.402,0-7.969-3.567-7.969-7.969c0-4.402,3.567-7.969,7.969-7.969C14.401,2.031,17.969,5.598,17.969,10 M17.13,10c0-3.932-3.198-7.13-7.13-7.13S2.87,6.068,2.87,10c0,3.933,3.198,7.13,7.13,7.13S17.13,13.933,17.13,10"></path>
              </svg>
              <span class="text-gray-700">নতুন ওয়ারেন্ট</span>
              
            </div>
            </router-link>
            <router-link v-show="user.role_id==1" :to="{ name: 'warrantList' }">
            <div class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer">
              
              <svg class="h-6 w-6  mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
              </svg>
              <span class="text-gray-700">সকল ওয়ারেন্ট</span>  
            </div>
            </router-link>
            <router-link v-show="user.role_id==2" :to="{ name: 'warrantListSp' }">
            <div class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer">
              
              <svg class="h-6 w-6  mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
              </svg>
              <span class="text-gray-700">সকল ওয়ারেন্ট</span>
            </div>
            </router-link>
            <router-link v-show="user.role_id==3" :to="{ name: 'warrantListDig' }">
            <div class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer">
              <svg class="h-6 w-6  mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
              </svg>
              <span class="text-gray-700">সকল ওয়ারেন্ট</span>
            </div>
            </router-link>
            <router-link v-show="user.role_id==1" :to="{ name: 'ImportFromCI' }">
            <div class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer">
              <svg class="h-6 w-6 fill-current mr-2" viewBox="0 0 20 20">
                <path d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"></path>
              </svg>
              <span class="text-gray-700">ইম্পোর্ট করুন</span>
            </div>
            </router-link>
            <router-link v-show="user.role_id==4" :to="{ name: 'ImportFromThana' }">
            <div class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer">
              <svg class="h-6 w-6 fill-current mr-2" viewBox="0 0 20 20">
                <path d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"></path>
              </svg>
              <span class="text-gray-700">ইম্পোর্ট করুন</span>
            </div>
            </router-link>
            <router-link :to="{ name: 'crimeTypeList' }">
            <div class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer">
              <svg class="h-6 w-6  mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
              </svg>
              <span class="text-gray-700">অপরাধের ধরন সমূহ

              </span>
            </div>
            </router-link>
            <router-link :to="{ name: 'courtList' }">
            <div class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer">
              <svg class="h-6 w-6  mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
              </svg>
              <span class="text-gray-700">ইস্যুকারি আদালত সমূহ</span>
            </div>
            </router-link>
          </div>

          <div class="text-sm px-4 mt-6 ">
            Logged in as <b class="text-blue-500 ">{{name}}</b>
          </div>

        </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
    name: 'Sidebar',
    data(){
      return{
        user: false,
        name: null
      }
    },
    computed: {
        ...mapState(['sideBarOpen'])
    },
    created(){
      this.user = store.getters.getCurrentUser ? store.getters.getCurrentUser : false
      this.name = this.user.name;
      const r_n = this.$route.name;
      console.log(r_n);
      if(this.user.role_id == 2){
        if(r_n== 'warrantAdd' || r_n == "warrantList" || r_n=="ImportFromCI"){
          this.$router.push('/dashboard')
        }
      }
      else if(this.user.role_id == 1){
        if( r_n == "warrantAddThana" || r_n == "warrantListThana" || r_n=="ImportFromThana"){
          this.$router.push('/dashboard')
        }
      }
    }
}
</script>