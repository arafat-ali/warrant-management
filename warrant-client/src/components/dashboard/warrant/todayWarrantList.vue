<template>
  <div id="home">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full px-3">
        <p class="text-xl font-semibold mb-2" v-if="$route.params.id == '1'" >
          সকল ওয়ারেন্ট লিস্ট 
        </p>
        <p class="text-xl font-semibold mb-2" v-if="$route.params.id == '2'" >
          সকল ওয়ারেন্ট (মুলতবি)  
        </p> 
        <p class="text-xl font-semibold mb-2" v-if="$route.params.id == '3'" >
          সকল ওয়ারেন্ট (তামিল)  
        </p>
        <div class="w-full bg-white border rounded-lg px-8 py-6 mb-8 xl:mb-0 ">
          <div class="flex flex-col gap-1 lg:flex-row justify-between items-center lg:gap-0">
            <!-- <div class="text-sm text-gray-400 font-medium"> Showing: {{ todayWarrants.length }} pending warrants</div> -->
            <!-- <div class="flex flex-col lg:flex-row-reverse mb-2 gap-1.5 items-center">
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

              <div class="" v-if="selectedField">

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
   
              
            </div> -->
          </div>
          <!-- Table Start -->
          <div class="h-96 overflow-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
              <table class="min-w-full">
                <thead>
                    <tr class="text-xs">
                      <th class="px-2 py-1 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">#</th>
                      <th v-for="field in fields" :key="field.id" 
                      class="px-2 py-1 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold" >
                        {{ field.name }}
                      </th>
                      <th class="px-2 py-1 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">স্ট্যাটাস</th> 
                    </tr>
                </thead>
                <tbody class="text-sm" v-if="$route.params.id == '1'">
                  <tr class="border-l border-r" v-for="(warrant,index) in todayWarrants" :key="warrant.id">
                  
                    <td class="p-2 text-center border-b border-r  border-gray-200">{{index + 1}}</td>
                    <td v-for="field in fields" :key="field.id" class="p-2  border-b border-r  border-gray-200"

                    :class="{'bg-gray-100': selectedField.name == field.name}"
                    >
                      <p v-if="field.type == 'date'">{{warrant[''+field.nameArr] | moment("ddd, MM Do YY")}}</p>
                      <p v-else>{{ warrant[''+field.nameArr] }}</p>
                    </td>
                    <td class="p-2  border border-gray-200">
                      <div class="rounded-full py-1 px-3 bg-green-500 text-white text-center" v-if="warrant.is_executed == 1" >
                        Executed
                      </div>
                    </td>
                    
                  </tr>
                </tbody>
                <tbody class="text-sm" v-if="$route.params.id == '2'">
                  <tr class="border-l border-r" v-for="(warrant,index) in todayPendingWarrants" :key="warrant.id">
                  
                    <td class="p-2 text-center border-b border-r  border-gray-200">{{index + 1}}</td>
                    <td v-for="field in fields" :key="field.id" class="p-2  border-b border-r  border-gray-200"

                    :class="{'bg-gray-100': selectedField.name == field.name}"
                    >
                      <p v-if="field.type == 'date'">{{warrant[''+field.nameArr] | moment("ddd, MM Do YY")}}</p>
                      <p v-else>{{ warrant[''+field.nameArr] }}</p>
                    </td>
                    <td class="p-2  border border-gray-200">
                      <div class="rounded-full py-1 px-3 bg-green-500 text-white text-center" v-if="warrant.is_executed == 1" >
                        Executed
                      </div>
                    </td>
                    
                  </tr>
                </tbody>
                <tbody class="text-sm" v-if="$route.params.id == '3'">
                  <tr class="border-l border-r" v-for="(warrant,index) in todayExecutedWarrants" :key="warrant.id">
                  
                    <td class="p-2 text-center border-b border-r  border-gray-200">{{index + 1}}</td>
                    <td v-for="field in fields" :key="field.id" class="p-2  border-b border-r  border-gray-200"

                    :class="{'bg-gray-100': selectedField.name == field.name}"
                    >
                      <p v-if="field.type == 'date'">{{warrant[''+field.nameArr] | moment("ddd, MM Do YY")}}</p>
                      <p v-else>{{ warrant[''+field.nameArr] }}</p>
                    </td>
                    <td class="p-2  border border-gray-200">
                      <div class="rounded-full py-1 px-3 bg-green-500 text-white text-center" v-if="warrant.is_executed == 1" >
                        Executed
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
import DataTable from "vue-materialize-datatable";
  export default {

    name: 'warrant_list_today',
    data () {
      return {
        warrants: [],
        searchedWarrant: [],
        todayWarrants: [],
        todayPendingWarrants: [],
        todayExecutedWarrants: [],
        fields: [
          { id: "1", name: "প্রসেস নং", type:null, nameArr: "process_number" },
          { id: "2", name: "জিআর নম্বর", type:null, nameArr: "gr_number" },
          { id: "3", name: "অন্যান্য আদালতের নাম্বার", type:null, nameArr: "other_number" },
          { id: "4", name: "কোর্ট হতে প্রেরণের তারিখ", type:'date', nameArr: "send_date" },
          { id: "5", name: "থানা", type:'dropdown', nameArr: "thana_name" },
          { id: "6", name: "ওয়ারেন্টের ধরন", type:'dropdown', nameArr: "warrant_type" },
          { id: "16", name: "অপরাধের ধরন", type:'dropdown', nameArr: "crime_category_name" }, 
          { id: "7", name: "ইস্যুকারি আদালত", type:'dropdown', nameArr: "court_name" },
          // { id: "8",name: "থানায় রিসিভের তারিখ", type:'date', nameArr: "arrest_warrant_received_to_thana",},
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
        getWarrant() {
        axios
          .get(
            "api/get-ci-dashboard-data-today/")
          .then((response) => {
            console.log(response);
            this.todayWarrants = response.data.data;
            //alert('');
          })
          .catch((response) => {
            alert(response);
          });
        },
        pendingWarrantCreate(){
        for (let i = 0; i < data.length; i++) {
          if (data[i].is_executed === 0) {
            this.pendingWarrants.push(data[i]);
          }
        }
        },
        executedgWarrantCreate(data) {
            for (let i = 0; i < data.length; i++) {
            if (data[i].is_executed === 1) {
                this.todayExecutedWarrants.push(data[i]);
            }
            }
            return pendingWarrants;
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
    },

    created(){
        this.getWarrant();
        this.pendingWarrantCreate();
        this.executedgWarrantCreate();
        this.getCourt();
        this.getThana();
        this.getCrimeType();
      //this.warrants = 
    }
}
</script>