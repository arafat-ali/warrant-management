<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            এসআই পারফর্মেন্স
          </p>
          <!-- Filter Start -->
          <div class="w-full bg-white border rounded-lg p-8 mb-8 flex flex-col space-y-6">
            <div class="h-20 flex flex-col justify-start lg:flex-row lg:justify-between gap-4">
                <div class="w-full">
                  <label for="">জেলা</label>
                  <select class="w-full block border rounded py-2 px-4" v-model="districtId" @change="getThanaByDistrictId(districtId)">
                    <option value="" selected>--নির্বাচন করুন--</option>
                    <option v-for="district in districts" :key="district.id" :value="district.id">{{district.name}}</option>
                  </select>
                </div>
                <div class="w-full">
                  <label for="">থানা</label>
                  <select class="w-full block border rounded py-2 px-4" v-model="thanaId" >
                    <option value="" selected>--নির্বাচন করুন--</option>
                    <option v-for="thana in thanas" :key="thana.id" :value="thana.id">{{thana.name}}</option>
                  </select>
                </div>
                <div class="w-full">
                  <label for="">এসআই</label>
                  <select class="w-full block border rounded py-2 px-4" >
                    <option value="" selected>--নির্বাচন করুন--</option>
                    <!-- <option v-for="district in districts" :key="district.id" :value="district.id">{{district.name}}</option> -->
                  </select>
                </div>
            </div>       
            <div class="h-20 flex flex-col justify-start lg:flex-row lg:justify-between gap-4">
              <div class="w-full">
                <label for="">তারিখ হতে</label>
                <input type="date" class="input">
              </div>
              <div class="w-full">
                <label for="">তারিখ পর্যন্ত</label>
                <input type="date" class="input">
              </div>
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

          <!-- Table Start -->
          <div class="w-full bg-white border rounded-lg p-4">
            <div class="flex flex-col">
                <div class=" h-96  overflow-x-auto">
                  <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                    <table class="min-w-full">
                      <thead class="">
                          <tr class="text-xs ">
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">প্রসেস নং</th>
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">মামলা নম্বর তারিখ ও ধারা</th>
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">আসামির নাম</th>
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">আসামির পিতার নাম</th>
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">আসামির ঠিকানা</th>
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">অপরাধের ধরন</th>
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">থানায় প্রেরনের তারিখ</th>
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">অ্যাসাইনের তারিখ</th>
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">তামিলের তারিখ</th>
                            <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-4 tracking-wider font-semibold">বিলম্ব</th> 
                        </tr>
                      </thead>
                      <tbody class="text-xs">
                        <tr class="border-l border-r" v-for="warrant in warrants" :key="warrant.id">
                          <td class="p-2  border-b whitespace-nowrap border-gray-200">{{warrant.process_number}}</td>
                          <td class="p-2  border-b whitespace-nowrap border-gray-200">{{warrant.case_section_and_date}}</td>
                          <td class="p-2  border-b whitespace-nowrap border-gray-200">{{warrant.criminal_name}}</td>
                          <td class="p-2  border-b whitespace-nowrap border-gray-200">{{warrant.criminal_father_name}}</td>
                          <td class="p-2  border-b whitespace-nowrap border-gray-200">{{warrant.criminal_address}}</td>
                          <td class="p-2  border-b whitespace-nowrap border-gray-200">{{warrant.warrant_type}}</td>
                          <td class="p-2  border-b whitespace-nowrap border-gray-200">{{warrant.send_date | moment("ddd, MM Do YY")}}</td>
                          <td class="p-2  border-b whitespace-nowrap border-gray-200">{{warrant.arrest_warrant_received_to_thana | moment("from", "now", true) }}</td>
                          <td class="p-2  border-b whitespace-nowrap border-gray-200">
                            <button @click="show_modal_func(warrant.id)" type="button"
                                class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                নিযুক্ত করুন
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
          <!-- Table End -->
        </div>
      </div>
    </div>
</template>

<script>
  export default {

    name: 'warrant-list-dig',
    data () {
      return {
        warrants:[],
        searchedWarrant: [],
        fields: [
          { id: '1', name:'প্রসেস নং', nameArr: 'process_number'},
          { id: '2', name:'জিআর নম্বর', nameArr: 'gr_number'},
          { id: '3', name:'অন্যান্য কোর্টের নাম্বার', nameArr: 'other_number'},
          { id: '4', name:'কোর্ট হতে প্রেরণের তারিখ', nameArr: 'send_date'},
          { id: '5', name:'থানা', nameArr: 'thana_name'},
          { id: '6', name:'অপরাধের ধরন', nameArr: 'warrant_type'},
          { id: '7', name:'ইস্যুকারি আদালত', nameArr: 'court_id'},
          { id: '8', name:'থানায় প্রেরনের তারিখ', nameArr: 'arrest_warrant_to_thana'},
          { id: '9', name:'আদালতে হাজিরের তারিখ', nameArr: 'arrest_criminal_to_court'},
          { id: '10', name:'আসামির নাম', nameArr: 'criminal_name'},
          { id: '11', name:'আসামির পিতার নাম', nameArr: 'criminal_father_name'},
          { id: '12', name:'আসামির ঠিকানা', nameArr: 'criminal_address'},
          { id: '13', name:'মোবাইল নং', nameArr: 'criminal_address'},
          { id: '14', name:'আসামির এনআইডি', nameArr: 'criminal_NID'},
          { id: '15', name:'আসামির জন্ম নিবন্ধন', nameArr: 'birth_cirtificate'},
        ],
        selectedField: '',
        searchText: '',
        districts: [],
        districtId: '',
        thanas: [],
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

      }
    },
    methods:{
      search(fieldName){
        this.searchedWarrant = this.warrants; 
        let searchArr = [];
        for(let i=0; i < this.warrants.length; i++){
          if(this.warrants[i][this.selectedField.nameArr].search(this.searchText) >= 0){
            searchArr.push(this.warrants[i]);
          }
         
        }
        this.searchedWarrant = searchArr;
        console.log(searchArr);
     
      },
      getDistrict(){
        axios
        .get('api/districts')
        .then(response => {
          this.districts = response.data.data;
        })
        .catch(error =>{
          alert(error);
        })
      },
      getThanaByDistrictId(){
        if(this.districtId){
          axios
          .get('api/thanas-by-district/' + this.districtId)
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
        .get("api/get-si-dashboard-data/" + this.si_id)
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
      }
      
    },
    created(){
      this.getDistrict();
    }
}
</script>