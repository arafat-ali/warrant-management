<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            এসআই পারফর্মেন্স
          </p>
          <!-- Filter Start -->
          <div class="w-full bg-white border rounded-lg p-8 mb-8 flex flex-col space-y-6">
            <div class=" flex flex-col justify-start lg:flex-row lg:justify-between gap-4">
              <div class="w-full">
                <label for="">থানা</label>
                <select class="w-full block border rounded py-2 px-4" v-model="thanaId"
                @change="getSiList()" >
                  <option value="" selected>--নির্বাচন করুন--</option>
                  <option v-for="thana in thanas" :key="thana.id" :value="thana.id">{{thana.name}}</option>
                </select>
              </div>
              <div class="w-full">
                <label for="">এসআই</label>
                <select class="w-full block border rounded py-2 px-4" v-model="siId">
                  <option value="" selected>--নির্বাচন করুন--</option>
                  <option v-for="si in users" :key="si.id" :value="si.id">{{si.name_bangla}}</option>
                </select>
              </div>
            </div>       
            <div class="flex flex-col justify-start lg:flex-row lg:justify-between gap-4">
              <div class="w-full">
                <label for="">তারিখ হতে</label>
                <input v-model="start_date" type="date" class="input">
              </div>
              <div class="w-full">
                <label for="">তারিখ পর্যন্ত</label>
                <input v-model="end_date" type="date" class="input">
              </div>
        
            </div>
            <div class="w-full flex justify-center">
              <button @click="formSubmit" class="bg-blue-500 py-3 px-8 text-white rounded-md">
                সাবমিট  
              </button>
            </div>
          </div>
          <!-- Filter End -->
          
          <!-- Dashboard Start -->
          <div class="w-full px-4 mb-8">
            <div class="flex justify-between -mx-3 mb-8">
              <div class="w-1/2 xl:w-1/4">
                <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                  <svg class="w-10 h-10 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
                    <path d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"></path>
                  </svg>
                  <div class="text-gray-700">
                    <p class="font-semibold text-3xl">{{ totalWarrant }}</p>
                    <p class="text-sm">মোট ওয়ারেন্ট</p>
                  </div>
                </div>
              </div>

              <div class="w-1/2 xl:w-1/4">
                <div class="w-full bg-white border text-yellow-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                  <svg class="w-10 h-10 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" >
                    <path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
                  </svg>
                  <div class="text-gray-700">
                    <p class="font-semibold text-3xl"> {{ totalPendingWarrant }} </p>
                    <p class="text-sm">মোট মুলতবি ওয়ারেন্ট</p>
                  </div>
                </div>
              </div>

              <div class="w-1/2 xl:w-1/4 ">
                <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6" >
                  <svg class="w-10 h-10 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" >
                    <path d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z"></path>
                  </svg>
                  <div class="text-gray-700">
                    <p class="font-semibold text-3xl"> {{ totalCompletedWarrant }} </p>
                    <p class="text-sm">মোট তামিল ওয়ারেন্ট</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Dashboard End -->

          <div class="w-full bg-white border rounded-lg px-8 py-6 mb-8 xl:mb-0 ">
            <div class="flex flex-col gap-1 lg:flex-row justify-between items-center lg:gap-0">
              <div class="text-sm text-gray-400 font-medium"> Showing: {{ searchedWarrant.length }} warrants</div>
              <div class="flex flex-col lg:flex-row-reverse mb-2 gap-1.5 items-center">
                <div v-if="selectedField">
                  <button @click="selectedField=''" class="h-6 w-6 focus:border-none">
                    <span>
                      <svg class="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                  </button>
                </div>
                <div class="">
                  <div class="relative text-gray-500">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-1">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                          <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                      </svg>
                    </span>
                    <select v-model="selectedField" 
                    class="py-2 text-sm rounded-md pl-6 pr-6 border appearance-none focus:outline-none focus:ring-1 focus:ring-gray-400 focus:text-gray-500" @change="searchText = '', searchedWarrant = warrants">
                      <option value="" selected>সার্চ করুন...</option>
                      <option v-for="field in fields" :key="field.id" :value="field" >{{ field.name }}</option>
                    </select>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-1">
                      <svg class="w-5 h-5"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                    </span>
                    
                  </div>
                </div>
                <!-- After Selection Start -->
                <div class="" v-if="selectedField">
                  <!-- Date Range Start-->
                  <div v-if="selectedField.type == 'date'" class="flex flex-col lg:flex-row gap-2 items-center" >
                    <p>From</p>
                    <input type="date" v-model="startDate" class="py-2 text-sm rounded-md pl-6 pr-6 border appearance-none focus:outline-none focus:ring-1 focus:ring-gray-400 focus:text-gray-500" /> 
                    <p>to</p>
                    <input type="date" v-model="endDate" class="py-2 text-sm rounded-md pl-6 pr-6 border appearance-none focus:outline-none focus:ring-1 focus:ring-gray-400 focus:text-gray-500" />
                    <div>
                      <button class="bg-blue-500 py-2 px-3 text-sm rounded-lg text-white" @click="getData()" >
                        Search
                      </button>
                    </div>
                  </div>
                  <!-- Date Range End -->
                  <div class="" v-else-if="selectedField.type == 'dropdown'">
                    <select v-model="searchText" class="py-2 text-sm rounded-md pl-6 pr-6 border focus:outline-none focus:ring-1 focus:ring-gray-400 focus:text-gray-500" @change="search(selectedField.nameArr)" >
                      <option value="" selected>--{{ selectedField.name }} নির্বাচন করুন--</option>
                      <option v-for="court in courts" :key="court.id" :value="court.name" v-if="selectedField.id == 7">{{ court.name }}</option>
                      <option v-for="thana in thanas" :key="thana.id" :value="thana.name" v-if="selectedField.id == 5">{{ thana.name }}</option>
                      <option v-for="warrantType in warrantTypes" :key="warrantType" :value="warrantType" v-if="selectedField.id == 6">{{ warrantType }}</option>
                      <option v-for="crimeType in crimeTypes" :key="crimeType" :value="crimeType.id" v-if="selectedField.id == 16">{{ crimeType.name }}</option>
                    </select>
                  </div>
                  <div v-else>
                    <input type="text" class="py-2 text-sm rounded-md pl-6 pr-6 border appearance-none focus:outline-none focus:ring-1 focus:ring-blue-400 focus:text-gray-500" 
                    v-model="searchText" :placeholder="selectedField.name + ' লিখুন...'" @keyup="search(selectedField.nameArr)" />
                  </div>
                </div>
                <!-- After Selection End -->
              </div>
            </div>
            <!-- Table Start -->
            <div class="h-96 overflow-auto">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                <table class="min-w-full">
                  <thead>
                      <tr class="text-xs">
                        <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">#</th>
                        <th v-for="field in fields" :key="field.id" 
                        class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold" >
                          {{ field.name }}
                        </th>
                        <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">স্ট্যাটাস</th> 
                    </tr>
                  </thead>
                  <tbody class="text-sm">
                    <tr class="border-l border-r" v-for="(warrant,index) in searchedWarrant" :key="warrant.id">
                      <td class="p-2 text-center border-b border-r  border-gray-200">{{index + 1}}</td>
                      <td v-for="field in fields" :key="field.id" class="p-2  border-b border-r  border-gray-200"

                      :class="{'bg-gray-100': selectedField.name == field.name}"
                      >
                        <p v-if="field.type == 'date'">{{warrant[''+field.nameArr] | moment("ddd, MM Do YY")}}</p>
                        <p v-else>{{ warrant[''+field.nameArr] }}</p>
                      </td>
                      <td class="p-2  border-b  border-gray-200">

                        <div class="rounded-full py-1 px-3 bg-yellow-500 text-white" v-if="warrant.is_executed == 0" >
                          Pending
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Table End -->
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default {

    name: 'si-performance-sp',
    data () {
      return {
        warrants: [],
        searchedWarrant: [],
        fields: [
          { id: "1", name: "প্রসেস নং", type:null, nameArr: "process_number" },
          { id: "2", name: "জিআর নম্বর", type:null, nameArr: "gr_number" },
          { id: "3", name: "অন্যান্য আদালতের নাম্বার", type:null, nameArr: "other_number" },
          { id: "4", name: "কোর্ট হতে প্রেরণের তারিখ", type:'date', nameArr: "send_date" },
          { id: "5", name: "থানা", type:'dropdown', nameArr: "thana_name" },
          { id: "6", name: "ওয়ারেন্টের ধরন", type:'dropdown', nameArr: "warrant_type" },
          { id: "16", name: "অপরাধের ধরন", type:'dropdown', nameArr: "crime_category_name" }, 
          { id: "7", name: "ইস্যুকারি আদালত", type:'dropdown', nameArr: "court_name" },
          { id: "8",name: "থানায় রিসিভের তারিখ", type:'date', nameArr: "arrest_warrant_received_to_thana",},
          // { id: "9",name: "মামলার ধারা ও তারিখ", type:null, nameArr: "case_section_and_date",},
          // { id: '9', name:'আদালতে হাজিরের তারিখ', type:null, nameArr: 'arrest_criminal_to_court'},
          { id: "10", name: "আসামির নাম", type:null, nameArr: "criminal_name" },
          { id: "11", name: "আসামির পিতার নাম", type:null, nameArr: "criminal_father_name" },
          { id: "12", name: "আসামির ঠিকানা", type:null, nameArr: "criminal_address" },
          { id: "13", name: "মোবাইল নং", type:null, nameArr: "criminal_mobile_no" },
          { id: "14", name: "আসামির এনআইডি", type:null, nameArr: "criminal_NID" },
          { id: "15", name: "আসামির জন্ম নিবন্ধন", type:null, nameArr: "birth_cirtificate" },
        ],
        courts: [],
        thanas: [],
        warrantTypes: ['সিআর সাজা', 'সিআর গ্রেফতার', 'জিআর সাজা', 'জিআর গ্রেফতার'],
        crimeTypes:[],
        selectedField: "",
        searchText: "",
        courtID: "",
        startDate: "",
        endDate: "",
        startDateType: 'text',
        endDateType: 'text',
        thanaId: '',
        // SI Array should be here....
        siId: '',
        totalWarrant: 0,
        totalPendingWarrant: 0,
        totalCompletedWarrant: 0,
        totalNewWarrant: 0,
        totalTodayCompletedWarrant: 0,
        pending: 0,
        executed: 0,
        newWarrant: 0,

        users:[],
        start_date: '',
        end_date:''

      }
    },
    methods:{
      search(fieldName) {
        this.searchedWarrant = this.warrants;
        let searchArr = [];
        for (let i = 0; i < this.warrants.length; i++) {
          if (
            this.warrants[i][fieldName] &&
            this.warrants[i][fieldName].search(this.searchText) >= 0
          ) {
            searchArr.push(this.warrants[i]);
          }
        }
        this.searchedWarrant = searchArr;
        console.log(searchArr);
        console.log(this.searchText);
        console.log(fieldName);
        console.log(this.warrants);
      },
      getCourt() {
        axios
          .get("api/courts")
          .then((response) => {
            this.courts = response.data.Court;
            //console.log(this.courts);
          })
          .catch((error) => {
            console.log(error);
          });
      },
      getCrimeType() {
        axios
          .get("api/crime-categories")
          .then((response) => {
            this.crimeTypes = response.data.data;
            // console.log(this.thanas);
          })
          .catch((error) => {
            console.log(error);
          });
      },
      getThana() {
      axios
        .get("api/thanas")
        .then((response) => {
          this.thanas = response.data.Thana;
          // console.log(this.thanas);
        })
        .catch((error) => {
          console.log(error);
        });
      },
      getThanaByDistrictId(){
        if(this.districtId){
          axios
          .get('api/thanas-by-district/' + 1)
          .then(response => {
            this.thanas = response.data.data;
          })
          .catch(error =>{
            alert(error);
          })
        }
        else {
          this.thanas = [];
        }
      },
      getDashboardData(){
        axios
        .get("api/get-si-dashboard-data/" + this.siId)
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
      getSiList(){
        if(this.thanaId){
          axios
            .get('api/SI-list/'+this.thanaId)
            .then(response => {
              this.users = response.data.data;
            })
            .catch(error =>{
              alert(error);
            })
        }
        else{
          this.users = []
        }
      },
      formSubmit(){

      }
      
    },
    created(){
      // this.warrants = //Api for warrants should be stored here...
      this.searchedWarrant = this.warrants;
      this.getCourt();
      this.getThana();
      this.getCrimeType();
    }
}
</script>