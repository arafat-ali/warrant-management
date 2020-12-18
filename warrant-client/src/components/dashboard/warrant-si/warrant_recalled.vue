<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            ওয়ারেন্ট(রিকল্ড)
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
                        <button @click="receive_recall(warrant.id)" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                              রিসিভ করুন
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
        warrants:[]
      }
    },
    computed:{
      
    },
    created(){
      this.getRecalledWarrant();
    },
    methods:{
      getRecalledWarrant(){
        axios
          .get('api/recalled-warrant-si')
          .then(response => {
            this.warrants = response.data.data;
          })
          .catch(error => {
            console.log(error)
          });
      },
      receive_recall(id){
        axios
          .get('api/receive-recall-si/'+id)
          .then(response => {
            this.getRecalledWarrant();
          })
          .catch(error => {
            console.log(error)
          });
      }
    }
}
</script>