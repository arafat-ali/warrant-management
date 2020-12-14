<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            ওয়ারেন্ট লিস্ট(আনঅ্যাসাইন্ড)
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="flex flex-col space-y-6">
                <table class="border table-auto">
                    <thead class="border text-xs">
                        <tr class="border">

                        <th class="border">প্রসেস নং</th>
                        <th class="border">মামলা নম্বর তারিখ ও ধারা</th>
                        <th class="border">আসামির নাম</th>
                        <th class="border">আসামির পিতার নাম</th>
                        <th class="border">আসামির ঠিকানা</th>
                        <th class="border">অপরাধের ধরন</th>
                        <th class="border">থানায় প্রেরনের তারিখ</th>
                        <th class="border">বিলম্ব</th>
                        <th class="border">নিযুক্ত করুন</th>

                      </tr>
                    </thead>
                    <tbody class="text-sm">
                      <tr class="border text-center" v-for="warrant in warrants" :key="warrant.id">
                        <td class="border">{{warrant.process_number}}</td>
                        <td class="border">{{warrant.case_section_and_date}}</td>
                        <td class="border">{{warrant.criminal_name}}</td>
                        <td class="border">{{warrant.criminal_father_name}}</td>
                        <td class="border">{{warrant.criminal_address}}</td>
                        <td class="border">{{warrant.warrant_type}}</td>
                        <td class="border">{{warrant.arrest_warrant_to_thana}}</td>
                        <td class="border">{{warrant.arrest_warrant_to_thana | moment("from", "now", true) }}</td>
                        <td class="border">
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
                <div class="px-12 mt-3 justify-center text-center sm:mt-0 sm:ml-4 sm:text-left">
                    
                      
                  <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            এসআই নিযুক্ত করুন
                  </h3>
                  <div class="mt-2">
                    <div>
                      <select v-model="SI_id" class="select" >
                      <option value="" >--নির্বাচন করুন--</option>
                      <option v-for="SI in SIList" :value="SI.id">{{SI.name_bangla}} (মূলতবি {{SI.total_unExecuted_warrants ? SI.total_unExecuted_warrants:0}})</option>
                      </select>

                    </div>

                  </div>
                  <div class="bg-gray-50 px-4 py-12 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="assignSI" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
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
</template>

<script>
  export default {

    name: 'warrant-list-thana',
    data () {
      return {
        show_modal:false,
        SI_id:'',
        editable_warrant: 0,
        SIList: []
      }
    },
    computed:{
      warrants(){
        return store.getters.getNonAssignedThanaWarrants;
      }
    },
    created(){
      store.dispatch('fetchNonAssignedThanaWarrants');
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
            axios
            .get('api/assignSI/'+this.editable_warrant+'/'+this.SI_id)
            .then(response => {
                store.dispatch('fetchNonAssignedThanaWarrants');
                axios
                    .get('api/SI-list')
                    .then(response => {
                      this.SIList = response.data.SIList;
                      //console.log(this.thanas);
                    })
                    .catch(error => {
                      console.log(error)
                    });
                this.SI_id=''
            })
            .catch(error => {
              console.log(error)
            });
            this.show_modal = false;
        }
    }
}
</script>