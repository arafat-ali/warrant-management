<template>
  <div id="home">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full px-3">
        <p class="text-xl font-semibold mb-4">
           সকল ওয়ারেন্ট
        </p>
        <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0 ">
          <div class="flex flex-col space-y-6 ">
            <!-- <div class="h-20 flex flex-col lg:flex-row justify-start">
              <div class="px-6">
                <label for="">সার্চ</label>
                <select
                  v-model="selectedField"
                  class="select"
                  @change="searchText = '', searchedWarrant = warrants"
                >
                  <option value="" selected>--নির্বাচন করুন--</option>
                  <option
                    v-for="field in fields"
                    :key="field.id"
                    :value="field"
                    >{{ field.name }}</option
                  >
                </select>
              </div>
              
              <div class="px-6" v-if="selectedField">
                
                <div
                  v-if="selectedField.id == 4 || selectedField.id == 8"
                  class="flex gap-2"
                >
                  <div>
                    <label for="">থেকে</label>
                    <input
                      type="date"
                      class="input"
                      v-model="startDate"
                      :placeholder="selectedField.name"
                    />
                  </div>
                  <div>
                    <label for="">পর্যন্ত</label>
                    <input
                      type="date"
                      class="input"
                      v-model="endDate"
                      :placeholder="selectedField.name"
                    />
                  </div>
                  <div>
                    <button
                      class="bg-blue-500 p-3 mt-4 rounded-lg text-white"
                      @click="getData()"
                    >
                      Search
                    </button>
                  </div>
                </div>
                

                <div class="" v-else-if="selectedField.id == 7">
                  <label for="">{{ selectedField.name }}</label>
                  <select
                    v-model="searchText"
                    class="select"
                    @change="search(selectedField.nameArr)"
                  >
                    <option value="" selected>--নির্বাচন করুন--</option>
                    <option
                      v-for="court in courts"
                      :key="court.id"
                      :value="court.name"
                      >{{ court.name }}</option
                    >
                  </select>
                </div>
                <div class="" v-else-if="selectedField.id == 5">
                  <label for="">{{ selectedField.name }}</label>
                  <select
                    v-model="searchText"
                    class="select"
                    @change="search(selectedField.nameArr)"
                  >
                    <option value="" selected>--নির্বাচন করুন--</option>
                  
                    <option
                      v-for="thana in thanas"
                      :key="thana.id"
                      :value="thana.name"
                      >{{ thana.name }}</option
                    >
                  </select>
                </div>
                <div class="" v-else-if="selectedField.id == 6">
                  <label for="">{{ selectedField.name }}</label>
                  <select
                    v-model="searchText"
                    class="select"
                    @change="search(selectedField.nameArr)"
                  >
                    <option value="" selected>--নির্বাচন করুন--</option>
                    <option value="সিআর পরোয়ানা">সিআর পরোয়ানা</option>
                    <option value="সিআর গ্রেফতার">সিআর গ্রেফতার</option>
                    <option value="জিআর পরোয়ানা">জিআর পরোয়ানা</option>
                    <option value="জিআর গ্রেফতার">জিআর গ্রেফতার</option>
                  </select>
                </div>

                <div v-else>
                  <label for="">{{ selectedField.name }}</label>
                  <input
                    type="text"
                    class="input"
                    v-model="searchText"
                    :placeholder="selectedField.name"
                    @keyup="search(selectedField.nameArr)"
                  />
                </div>
              </div>
             
            </div> -->

            <div>
              <div class="flex flex-row justify-start mb-2 ">
                <p class="font-bold">Total: {{ assignedWarrants.length }}</p>
              </div>
              <div class="h-96 overflow-auto">
                <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                  <table class="min-w-full">
                    <thead>
                      <tr class="">
                        <th class="px-2 py-1 border bg-gray-50 text-left text-xs leading-4 tracking-tight font-semibold">#</th>
                        <th v-for="field in fields" :key="field.id" class="px-2 py-1 border bg-gray-50 text-left text-xs leading-4 tracking-tight font-semibold">{{ field.name }}</th>
                        
                        <th class="px-2 py-1 border bg-gray-50 text-left text-xs leading-4 tracking-tight font-semibold">অ্যাটেম্প</th>
                        <th class="px-2 py-1 border bg-gray-50 text-left text-xs leading-4 tracking-tight font-semibold">একশন</th>
                      </tr>
                    </thead>
                    <tbody class="text-xs">
                      <tr class="border-l border-r" v-for="(warrant, index) in assignedWarrants" :key="warrant.id">
                        <td class="p-2 text-center border-b border-r border-gray-200">{{ index }}</td>
                        <td class="p-2 text-center border-b border-r border-gray-200">{{ warrant.process_number }}</td>
                        <td class="p-2 text-center border-b border-r border-gray-200">{{ warrant.gr_number }}</td>
                        <td class="p-2 text-center border-b border-r border-gray-200">{{ warrant.warrant_type }}</td>
                        <td class="p-2 text-center border-b border-r border-gray-200">{{ warrant.criminal_name }}</td>
                        <td class="p-2 text-center border-b border-r border-gray-200">{{ warrant.criminal_father_name }}</td>
                        <td class="p-2 text-center border-b border-r border-gray-200">{{ warrant.criminal_address }}</td>
                        <td class="p-2 text-center border-b border-r border-gray-200">{{ warrant.created_at }}</td>
                        <td class="p-2 text-center border-b border-r border-gray-200"><router-link :to="{name: 'SIActivity', params:{id:warrant.warrant_id} }">{{warrant.totalActivity}} </router-link></td>
                        <!-- <td class="border">{{ warrant.criminal_mobile_no }}</td> -->
                        <!-- <td class="border">{{ warrant.criminal_mobile_no }}</td> -->
                        <td class="p-2 text-center border-b border-r border-gray-200">
                          <!-- <button class="rounded-lg py-3 px-3 bg-blue-500 text-white">Details</button> -->
                          <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-blue-500 text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500 text-white" id="options-menu" aria-haspopup="true" aria-expanded="true" @click="buttonOption = !buttonOption, optionId = warrant.id">
                            Options
                            <!-- Heroicon name: chevron-down -->
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                          </button>
                          <div class="origin-top-right absolute right-2 mt-4  w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" v-show="buttonOption && optionId == warrant.id">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                              <a href="#" @click="(buttonOption = false,executionModal = true)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Execution</a>
                              <a href="#" @click="(nonExecutedModal = true, buttonOption = false)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Non Execution</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="fixed z-10 inset-0 overflow-y-auto mt-4" v-show="executionModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
              <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
              </div>

              <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                      
                      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                          Execution
                        </h3>
                        <div class="mt-2">
                          <div class="flex flex-col space-y-4">
                            <div>
                              <label for="">ধরন</label>
                              <select name="" v-model="selectedExecutionType" class="select" >
                                <option value="">--নির্বাচন করুন</option>
                                <option value="Arrest">Arrest</option>
                                <option value="Otherway">Otherway</option>
                                <option value="Recall">Recall</option>
                              </select>
                            </div>
                            <div v-if="selectedExecutionType == 'Otherway'">
                             <label for="">অন্যান্য ধরন</label>
                              <select v-model="otherwaysExecution" name="" class="select">
                                <option value="">--নির্বাচন করুন</option>
                                <option value="Death">Death</option>
                                <option value="NER">NER</option>
                                <option value="OD">Otherways Disposal</option>
                              </select>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="saveExecutionInfo" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                      Save
                    </button>
                    <button @click="executionModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                      Cancel
                    </button>
                  </div>
                </div>
            </div>
          </div>
          <div class="fixed z-10 inset-0 overflow-y-auto mt-4" v-show="nonExecutedModal">
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
                          Non Execution
                        </h3>
                        <div class="mt-2">
                          <div class="flex flex-col space-y-2">
                            <div>
                              <label for="">Relative Name</label>
                              <input v-model="name" type="text" class="input" placeholder="Relative Name">
                            </div>
                            <div>
                              <label for="">Relative address</label>
                              <input v-model="address" type="text" class="input" placeholder="Relative address">
                            </div>
                            <div>
                              <label for="">Relative contact no</label>
                              <input v-model="contact_no" type="text" class="input" placeholder="Relative contact no">
                            </div>
                            <div>
                              <label for="">Description</label>
                              <input v-model="description" type="text" class="input" placeholder="Description">
                            </div>
                            <div>
                              <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded inline-flex items-center">
                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                <span>Locate</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="saveNonExecutionInfo" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                      Save
                    </button>
                    <button @click="nonExecutedModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
</template>

<script>
export default {
  name: "warrant-list-si",
  data() {
    return { 
      assignedWarrants: [],
      searchedWarrant: [],
      fields: [
        { id: "1", name: "প্রসেস নং", nameArr: "process_number" },
        { id: "2", name: "জিআর নম্বর", nameArr: "gr_number" },
        { id: "6", name: "অপরাধের ধরন", nameArr: "warrant_type" },
        { id: "10", name: "আসামির নাম", nameArr: "criminal_name" },
        { id: "11", name: "আসামির পিতার নাম", nameArr: "criminal_father_name" },
        { id: "12", name: "আসামির ঠিকানা", nameArr: "criminal_address" },
        { id: '16', name: "অ্যাসাইনের তারিখ"},
        // { id: '17', name: "বিলম্ব"},
      ],
      selectedField: "",
      searchText: "",
      startDate: "",
      endDate: "",
      optionId: null,
      buttonOption: false,
      executionModal: false,
      nonExecutedModal: false,
      selectedExecutionType: '',
      otherwaysExecution:'',

      name:'',
      address:'',
      contact_no: '',
      description: ''
    };
  },
  methods: {
    search(fieldName) {
      this.searchedWarrant = this.assignedWarrants;
      let searchArr = [];
      for (let i = 0; i < this.assignedWarrants.length; i++) {
        if (
          this.assignedWarrants[i][fieldName] &&
          this.assignedWarrants[i][fieldName].search(this.searchText) >= 0
        ) {
          searchArr.push(this.assignedWarrants[i]);
        }
      }
      this.searchedWarrant = searchArr;
    },
    getSiWarrants(){
      axios
      .get("api/get-assigned-si-warrants")
      .then(response => {
        // console.log(response.data.data);
        this.assignedWarrants = response.data.data;
        
      })
      .catch(error => {
        alert(error);
      });
    },
    saveExecutionInfo(){
      this.executionModal = false;
      let msg = this.otherwaysExecution;
      if(msg==''){
        msg = this.selectedExecutionType;
      }
      //console.log(this.optionId, msg);
      this.otherwaysExecution = '';
      this.selectedExecutionType='';
      this.$swal({ title: 'Saving...', icon: 'info', showConfirmButton: false });
      axios
        .get('api/save-execution/'+this.optionId+'/'+msg)
        .then(response => {
          this.getSiWarrants();
          console.log('successful');
          this.$swal({ title: 'Successfully saved', icon: 'success' });
        })
        .catch(error => {
          console.log(error);
          this.$swal({ title: error, icon: 'error'});
        });
    },

    saveNonExecutionInfo(e){
      this.nonExecutedModal = false;
      this.$swal({ title: 'Saving...', icon: 'info', showConfirmButton: false });
      e.preventDefault();
      const config = {
          headers: { 'content-type': 'multipart/form-data' }
      }
      let data = new FormData();
      data.append('assigned_warrants_id', this.optionId);
      data.append('name', this.name);
      data.append('address', this.address);
      data.append('contact_no', this.contact_no);
      data.append('description', this.description);

      axios
          .post('api/add-non-execution', data, config)
          .then(response => {
            this.getSiWarrants();
            this.name='';
            this.address='';
            this.contact_no='';
            this.description='';
            console.log(response.data.Message);
            this.$swal({ title: 'Successfully saved', icon: 'success' });
          })
          .catch(response => {
            this.$swal({ title: response, icon: 'error'});
          });
    }
    
 
  },
  created() {
    // store.dispatch("fetchThanaWarrants");
    // this.warrants = store.getters.getThanaWarrants;
    this.getSiWarrants();
    // this.makeSiWarrants();
    
  },
};
</script>
