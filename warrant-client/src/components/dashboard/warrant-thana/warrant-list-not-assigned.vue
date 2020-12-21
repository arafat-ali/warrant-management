<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            ওয়ারেন্ট লিস্ট(আনঅ্যাসাইন্ড)
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="h-96 overflow-auto shadow">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                <table class="min-w-full">
                  <thead>
                    <tr class="text-xs">
                      <!-- <th class="px-6 py-3 border bg-gray-50 text-left text-xs leading-2 tracking-tighter font-semibold">#</th> -->
                      <th v-for="field in fields" :key="field.id" 
                      class="px-2 py-2 border text-center bg-gray-50 text-xs leading-2 tracking-tighter font-semibold" >
                        {{ field.name }}
                      </th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">বিলম্ব</th> 
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">একশন</th>  
                    </tr>
                  </thead>
                  <tbody class="text-xs">
                    <tr class="border-l border-r" v-for="(warrant) in warrants" :key="warrant.id">
                      <!-- <td class="p-2 text-center border-b border-r  border-gray-200">{{index + 1}}</td> -->
                      <td v-for="field in fields" :key="field.id" class="p-2  border-b border-r  border-gray-200"
                      :class="{'bg-gray-100': selectedField.name == field.name}"
                      >
                        <p v-if="field.type == 'date'">{{warrant[''+field.nameArr] | moment("ddd, MM Do YY")}}</p>
                        <p v-else>{{ warrant[''+field.nameArr] }}</p>
                      </td>
                      <td class="p-2  border  border-gray-200">
                      </td>
                      <td class="p-2 border border-gray-200">
                        <button @click="show_modal_func(warrant.id)" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                              অ্যাসাইন্ড করুন
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- This example requires Tailwind CSS v2.0+ -->
      <div v-show="show_modal" class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    এসআই নিযুক্ত করুন
                  </h3>
                  <div class="mt-2">
                    <div>
                      <div>
                        <select v-model="SI_id" class="select" >
                          <option value="" >--নির্বাচন করুন--</option>

                          <option v-for="SI in SIList" :value="SI.id" :key="SI.id">{{SI.name_bangla}} (মূলতবি {{SI.total_unExecuted_warrants ? SI.total_unExecuted_warrants:0}})</option>
                        </select>
                      </div>
                      <div class="mt-4">
                        <button @click="assignSI" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                          নিযুক্ত করুন
                        </button>
                        <button @click="show_modal=false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                          Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default {

    name: 'warrant-list-thana',
    data () {
      return {
        show_modal:false,
        SI_id:'',
        editable_warrant: 0,
        SIList: [],
        //warrants:[],
        searchedWarrant: [],
        fields: [
          { id: "1", name: "প্রসেস নং", type:null, nameArr: "process_number" },
          { id: "9",name: "মামলার ধারা ও তারিখ", type:null, nameArr: "case_section_and_date",},
          { id: "10", name: "আসামির নাম", type:null, nameArr: "criminal_name" },
          { id: "11", name: "আসামির পিতার নাম", type:null, nameArr: "criminal_father_name" },
          { id: "12", name: "আসামির ঠিকানা", type:null, nameArr: "criminal_address" },
          { id: "6", name: "ওয়ারেন্টের ধরন", type:'dropdown', nameArr: "warrant_type" },
          { id: "16", name: "অপরাধের ধরন", type:'dropdown', nameArr: "crime_category_name" },
          { id: "4", name: "কোর্ট হতে থানায় প্রেরণের তারিখ", type:'date', nameArr: "send_date" }, 
          // { id: "2", name: "জিআর নম্বর", type:null, nameArr: "gr_number" },
          // { id: "3", name: "অন্যান্য আদালতের নাম্বার", type:null, nameArr: "other_number" },
          // { id: "5", name: "থানা", type:'dropdown', nameArr: "thana_name" },
          // { id: "7", name: "ইস্যুকারি আদালত", type:'dropdown', nameArr: "court_name" },
          // { id: "8",name: "থানায় রিসিভের তারিখ", type:'date', nameArr: "arrest_warrant_received_to_thana",},
          // { id: '9', name:'আদালতে হাজিরের তারিখ', type:null, nameArr: 'arrest_criminal_to_court'},
          // { id: "13", name: "মোবাইল নং", type:null, nameArr: "criminal_mobile_no" },
          // { id: "14", name: "আসামির এনআইডি", type:null, nameArr: "criminal_NID" },
          // { id: "15", name: "আসামির জন্ম নিবন্ধন", type:null, nameArr: "birth_cirtificate" }, 
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
      }
    },
    computed:{
      warrants(){
        return store.getters.getNonAssignedThanaWarrants;
      }
    },
    created(){
      store.dispatch('fetchNonAssignedThanaWarrants');
      //this.warrants = store.getters.getNonAssignedThanaWarrants;
      axios
        .get('api/SI-list')
        .then(response => {
          this.SIList = response.data.SIList;
          //console.log(this.thanas);
        })
        .catch(error => {
          console.log(error)
        });
    },
    methods:{
      show_modal_func(id){
          this.show_modal = true;
          this.editable_warrant = id;
          console.log(this.show_modal);
      },
      assignSI(){
          this.$swal({ title: 'Assigning...', icon: 'info', showConfirmButton: false });
          axios
          .get('api/assignSI/'+this.editable_warrant+'/'+this.SI_id)
          .then(response => {
              store.dispatch('fetchNonAssignedThanaWarrants');
              axios
                  .get('api/SI-list')
                  .then(response => {
                    this.SIList = response.data.SIList;
                    this.$swal({ title: 'Successfully assigned', icon: 'success' });
                    //console.log(this.thanas);
                  })
                  .catch(error => {
                    console.log(error);
                    this.$swal({ title: error, icon: 'error' });
                  });
              this.SI_id=''
          })
          .catch(error => {
            console.log(error)
          });
          this.show_modal = false;
      },

    }
}
</script>