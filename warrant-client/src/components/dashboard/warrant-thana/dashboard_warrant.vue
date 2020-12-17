<template>
    <div id="home">
      <div v-if="$route.params.id == 'total_warrant'" class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            মোট ওয়ারেন্ট
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="h-96 overflow-auto">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                <table class="min-w-full">
                  <thead>
                    <tr class="text-xs">
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">প্রসেস নং</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মামলা নম্বর তারিখ ও ধারা</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">আসামির নাম</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">আসামির পিতার নাম</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">আসামির ঠিকানা</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">ওয়ারেন্ট এর ধরণ</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">থানায় রিসিভের তারিখ</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">বিলম্বের সময়</th>
                      
                    </tr>
                  </thead>
                  <tbody class="text-sm">
                    <tr class="border-l border-r" v-for="warrant in total" :key="warrant.id">
                      <td class="p-2 border border-gray-200">{{warrant.process_number}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.case_section_and_date}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.criminal_name}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.criminal_father_name}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.criminal_address}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.warrant_type}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.arrest_warrant_received_to_thana}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.arrest_warrant_received_to_thana | moment("from", "now", true)}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="$route.params.id == 'total_pending'" class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            মোট মুলতবি ওয়ারেন্ট
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="h-96 overflow-auto">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                <table class="min-w-full">
                  <thead>
                    <tr class="text-xs">
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">প্রসেস নং</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মামলা নম্বর তারিখ ও ধারা</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">আসামির নাম</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">আসামির পিতার নাম</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">আসামির ঠিকানা</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">ওয়ারেন্ট এর ধরণ</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">থানায় প্রেরনের তারিখ</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মূলতবির সময়</th>
                      
                    </tr>
                  </thead>
                  <tbody class="text-sm">
                    <tr class="border-l border-r" v-for="warrant in warrants" :key="warrant.id">
                      <td class="p-2 border border-gray-200">{{warrant.process_number}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.case_section_and_date}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.criminal_name}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.criminal_father_name}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.criminal_address}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.warrant_type}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.arrest_warrant_to_thana}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.created_at | moment("from", "now", true)}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="$route.params.id == 'total_executed'" class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            মোট তামিল ওয়ারেন্ট
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="h-96 overflow-auto">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                <table class="min-w-full">
                  <thead>
                    <tr class="text-xs">
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">প্রসেস নং</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মামলা নম্বর তারিখ ও ধারা</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">আসামির নাম</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">আসামির পিতার নাম</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">আসামির ঠিকানা</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">ওয়ারেন্ট এর ধরণ</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">তামিলের ধরন</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">তামিলের তারিখ</th>
                      
                    </tr>
                  </thead>
                  <tbody class="text-sm">
                    <tr class="border-l border-r" v-for="warrant in executed" :key="warrant.id">
                      <td class="p-2 border border-gray-200">{{warrant.process_number}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.case_section_and_date}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.criminal_name}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.criminal_father_name}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.criminal_address}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.warrant_type}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.execution_type}}</td>
                      <td class="p-2 border border-gray-200">{{warrant.executed_at | moment("dddd, MMMM Do YYYY")}}</td>
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

    name: 'warrant-list-executed',
    data () {
      return {
        show_modal:false,
        SI_id:'',
        editable_warrant: 0,
        SIList: [],
        warrants:[],
        executed:[],
        total:[]
      }
    },
    computed:{
    },
    created(){
      console.log(this.$route.params.id);
      if(this.$route.params.id == 'total_warrant'){
        axios
        .get('api/all-warrant-oc')
        .then(response => {
          this.total = response.data.data;
          //console.log(this.courts);
        })
        .catch(error => {
          console.log(error)
        });
      }

      if(this.$route.params.id == 'total_pending'){
        axios
        .get('api/all-non-executed-oc')
        .then(response => {
          this.warrants = response.data.data;
          //console.log(this.courts);
        })
        .catch(error => {
          console.log(error)
        });
      }

      if(this.$route.params.id == 'total_executed'){
        axios
        .get('api/all-executed-oc')
        .then(response => {
          this.executed = response.data.data;
          //console.log(this.courts);
        })
        .catch(error => {
          console.log(error)
        });
      }
      
    },
    methods:{
    }
}
</script>