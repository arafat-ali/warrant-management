<template>
  <div id="home">
    <!-- breadcrumb -->
    <nav class="text-sm font-semibold mb-6" aria-label="Breadcrumb">
      <ol class="list-none p-0 inline-flex">
        <li class="flex items-center text-blue-500">
          <a href="#" class="text-gray-700">Home</a>
          <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" >
            <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/>
          </svg>
        </li>
        <li class="flex items-center">
          <a href="#" class="text-gray-600">Dashboard</a>
        </li>
      </ol>
    </nav>
    <!-- breadcrumb end -->
    <div class="flex flex-col justify-start gap-2  lg:flex-row lg:justify-between items-center mb-6">
      <div class="text-2xl text-gray-700 font-semibold mb-2 lg:mb-0">  
        Welcome, {{ name }}! 
      </div>
      <!-- <div class="flex flex-col lg:flex-row lg:justify-end gap-4">
        
        <div class="flex flex-row gap-2 items-center text-gray-500 cursor-pointer hover:text-gray-700 relative" @click="districtFilterOption = !districtFilterOption, filterOption = false">
          <div>
            <svg class="h-6 w-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg> 
          </div>
          <div class="text-sm ">Filter by district</div> 
          <div class="bg-white  h-40 py-3 px-4 flex flex-col space-y-1 text-sm rounded-md overflow-y-scroll absolute lg:right-5 top-7 shadow-xl" v-if="districtFilterOption" @click="districtFilterOption = !file">
            <div class="w-full p-1 rounded-sm cursor-pointer hover:bg-gray-200 mr-12" 
            @click="(selectedDistrict = 1 )"  :class="{'bg-gray-200': selectedDistrict == 'সকল জেলা' }"  >
             Chittagong
            </div>
            <div class="w-full p-1 rounded-sm cursor-not-allowed text-gray-200  hover:bg-gray-50 mr-12"  v-for="(district, index) in districts" :key="district.id"
                v-show="index > 0" >
              {{ district.name }} 
            </div>

          </div>
        </div> 
        

        
        <div class="flex flex-row gap-2 items-center text-gray-500 cursor-pointer hover:text-gray-700 relative" @click="filterOption = !filterOption, districtFilterOption = false">
          <div>
            <svg class="h-6 w-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg> 
          </div>
          <div class="text-sm ">Filter by thana</div> 
          <div class="bg-white h-40 py-3 px-4 flex flex-col space-y-1 text-sm rounded-md overflow-y-scroll absolute lg:right-5 top-7 shadow-xl" v-if="filterOption" @click="filterOption = !file">
            <div class="w-full p-1 rounded-sm cursor-pointer hover:bg-gray-200 mr-12" 
            @click="(selectedOption = 'সকল থানা', filterByThana() )" 
            :class="{'bg-gray-200': selectedOption == 'সকল থানা' }"  >
              --সকল থানা--
            </div>
            <div class="w-full p-1 rounded-sm cursor-pointer hover:bg-gray-200 mr-12" 
                v-for="thana in thanas" 
                :key="thana.id" 
                @click="(selectedOption = thana.name + ' থানা',  filterByThana() )" 
                :class="{'bg-gray-200': selectedOption == thana.name + ' থানা' }" >
              {{ thana.name }} থানা 
            </div>

          </div>
        </div> 
       
      </div> -->
    </div>

    <!-- <h2 class="text-sm text-gray-500">থানা: {{selectedOption}}</h2> -->
    <!-- First Cards Start -->
    <div class="flex justify-between -mx-3 mb-8">
      <div class="w-1/2 xl:w-1/4 px-1">
        <router-link v-show="user.role_id==3" :to="{ name: 'warrantListDig' }">
          <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
            <svg class="w-10 h-10 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
              <path d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"></path>
            </svg>
            <div class="text-gray-700">
              <p class="font-semibold text-3xl">{{ totalWarrant }}</p>
              <p>মোট ওয়ারেন্ট</p>
            </div>
          </div>
        </router-link>
      </div>

      <div class="w-1/2 xl:w-1/4 px-1">
        <div class="w-full bg-white border text-yellow-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
          <svg class="w-10 h-10 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" >
            <path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
          </svg>
          <div class="text-gray-700">
            <p class="font-semibold text-3xl"> {{ totalPendingWarrant }} </p>
            <p>মোট মুলতবি ওয়ারেন্ট</p>
          </div>
        </div>
      </div>

      <div class="w-1/2 xl:w-1/4 px-1">
        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6" >
          <svg class="w-10 h-10 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" >
            <path d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z"></path>
          </svg>
          <div class="text-gray-700">
            <p class="font-semibold text-3xl"> {{ totalCompletedWarrant }} </p>
            <p>মোট তামিল ওয়ারেন্ট</p>
          </div>
        </div>
      </div>
    </div>
    <!-- First Cards End -->
    <!-- Second Cards Start -->
    <h2>আজকের ওয়ারেন্ট ( {{ dateCreate(new Date(Date.now())) }} )</h2>
    <div class="flex justify-between -mx-3 mb-6">
      <div class="w-1/2 xl:w-1/4 px-1">
        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0" >
          <svg class="w-10 h-10 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" >
            <path d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"></path>
          </svg>
          <div class="text-gray-700">
            <div class="flex flex-row gap-10">
              <p class="font-semibold text-3xl"> {{ totalNewWarrant }} </p>
              <p class="text-sm">{{ dateCreate(new Date(Date.now() - 864e5)) }}</p>
            </div>
            <p>মোট নতুন ওয়ারেন্ট</p>
          </div>
        </div>
      </div>
      <div class="w-1/2 xl:w-1/4 px-1">
        <div class="w-full bg-white border text-yellow-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0" >
          <svg class="w-10 h-10 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" >
            <path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
          </svg>
          <div class="text-gray-700">
            <div class="flex flex-row gap-10">
              <p class="font-semibold text-3xl"> {{ totalPendingWarrant }} </p>
              <p class="text-sm">{{ dateCreate(new Date(Date.now() - 864e5)) }}</p>
            </div>
            <p>মোট মুলতবি ওয়ারেন্ট</p>
          </div>
        </div>
      </div>
      <div class="w-1/2 xl:w-1/4 px-1">
        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6" >
          <svg class="w-10 h-10 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" >
            <path d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z"></path>
          </svg>
          <div class="text-gray-700">
            <div class="flex flex-row gap-10">
              <p class="font-semibold text-3xl"> {{ totalTodayCompletedWarrant }} </p>
              <p class="text-sm">{{ dateCreate(new Date(Date.now() - 864e5)) }}</p>
            </div>
            <p>মোট তামিল ওয়ারেন্ট</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Second Cards End -->
  </div>
</template>

<script>
import Chart from "chart.js";

export default {
  name: "DashboardHome",
  data() {
    return {
      user: false,
      name: 'SI',
      totalWarrant: 0,
      totalPendingWarrant: 0,
      totalCompletedWarrant: 0,
      totalNewWarrant: 0,
      totalTodayCompletedWarrant: 0,
      pending: 0,
      executed: 0,
      newWarrant: 0,
      thanas: [],
      districts: [],
      filterOption: false,
      districtFilterOption: false,
      selectedOption: 'সকল থানা',
      selectedDistrict: 1,
      selectedClass: 'bg-gray-200'
    };
  },
  methods: {
    
    dateCreateForSearch(date) {
      let yyyy = date.getFullYear();
      let mm = date.getMonth() + 1;
      let dd = date.getDate();
      return yyyy + "-" + mm + "-" + dd;
    },
    dateCreate(date){
      let yyyy = date.getFullYear();
      let mm = date.getMonth() + 1;
      let dd = date.getDate();
      return dd + "-" + mm + "-" + yyyy;
    },
    getDashboardData(){
      axios
      .get("api/get-dig-dashboard-data/" + this.user.id)
      .then(response => {
        let data = response.data.data;
        this.totalWarrant = data.totalWarrant ? data.totalWarrant : 0;
        this.totalPendingWarrant = data.totalPendingWarrant ? data.totalPendingWarrant : 0;
        this.totalCompletedWarrant = data.totalCompletedWarrant ? data.totalCompletedWarrant : 0;
        this.totalNewWarrant = data.totalNewWarrant ? data.totalNewWarrant : 0;
        this.totalTodayCompletedWarrant = data.totalTodayCompletedWarrant ? data.totalTodayCompletedWarrant : 0;
      })
      .catch(error => {
        alert(error);
      });
    },
    getDashboardDataByThana(){
      axios
      .get("api/get-sp-dashboard-data-by-thana/" + this.selectedOption)
      .then(response => {
        let data = response.data.data;
        this.totalWarrant = data.totalWarrant ? data.totalWarrant : 0;
        this.totalPendingWarrant = data.totalPendingWarrant ? data.totalPendingWarrant : 0;
        this.totalCompletedWarrant = data.totalCompletedWarrant ? data.totalCompletedWarrant : 0;
        this.totalNewWarrant = data.totalNewWarrant ? data.totalNewWarrant : 0;
        this.totalTodayCompletedWarrant = data.totalTodayCompletedWarrant ? data.totalTodayCompletedWarrant : 0;
      })
      .catch(error => {
        alert(error);
      });
    },
    getThana(district_id){
      axios
      .get("api/thanas-by-district/" + district_id)
      .then(response => {
       this.thanas = response.data.data;
      })
      .catch(error => {
        alert(error);
      });
    },
    getDistrict(){
      axios
      .get("api/districts/")
      .then(response => {
       this.districts = response.data.data;
      })
      .catch(error => {
        alert(error);
      });
    },
    filterByThana(){
      if(this.selectedOption == 'সকল থানা'){
        this.getDashboardData();
      } else{
        this.getDashboardDataByThana();
      }
    }
  },
  created() {
    this.user = store.getters.getCurrentUser ? store.getters.getCurrentUser : false;
    this.name = this.user.name;
    
    this.getDashboardData();
    this.getThana(1);
    this.getDistrict();






   
    const r_n = this.$route.name;

    if (this.user.role_id == 2) {
      if (
        r_n == "warrantAdd" ||
        r_n == "warrantList" ||
        r_n == "ImportFromCI"
      ) {
        this.$router.push("/dashboard");
      }
    } else if (this.user.role_id == 1) {
      if (
        r_n == "warrantAddThana" ||
        r_n == "warrantListThana" ||
        r_n == "ImportFromThana"
      ) {
        this.$router.push("/dashboard");
      }
    }
  },
};
</script>
