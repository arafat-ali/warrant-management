<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            ওয়ারেন্ট লিস্ট(অ্যাসাইন্ড)
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
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">ওয়ারেন্টের ধরন</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">থানায় প্রেরনের তারিখ</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মূলতবির সময়</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">অ্যাসাইন্ড</th>
                       <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">একশন</th>

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
                      <td class="p-2 border border-gray-200">{{warrant.name_bangla}}</td>
                      <td class="p-2 border border-gray-200">
                        <button @click="unAssignedWarrant(warrant.id, warrant.warrant_id)" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                              আনঅ্যাসাইন্ড করুন
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
        x: 1,
      }
    },
    methods:{
      unAssignedWarrant(assigned_id, warrant_id){
        //console.log(assigned_id, warrant_id)
        this.$swal({ title: 'Unassigning...', icon: 'info', showConfirmButton: false });
        axios
        .get('api/unassigned-warrant/'+assigned_id+'/'+warrant_id)
        .then(response => {
          store.dispatch('fetchAssignedThanaWarrants');
          this.$swal({ title: 'Successfully unassigned...', icon: 'success' });
        })
        .catch(error => {
          console.log(error);
          this.$swal({ title: error, icon: 'error' });
        });
      }
    },
    computed:{
      warrants(){
        return store.getters.getAssignedThanaWarrants;
      }
    },
    created(){
      store.dispatch('fetchAssignedThanaWarrants');
    }
}
</script>