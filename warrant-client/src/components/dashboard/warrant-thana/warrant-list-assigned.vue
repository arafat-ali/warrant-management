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
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">অপরাধের ধরন</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">থানায় প্রেরনের তারিখ</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মূলতবির সময়</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">অ্যাসাইন্ড</th>
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
        SIList: []
      }
    },
    computed:{
      warrants(){
        return store.getters.getAssignedThanaWarrants;
      }
    },
    created(){
      store.dispatch('fetchAssignedThanaWarrants');
    },
    methods:{
    }
}
</script>