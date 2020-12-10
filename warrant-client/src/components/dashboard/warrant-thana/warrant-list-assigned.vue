<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            ওয়ারেন্ট লিস্ট(নিযুক্তকৃত)
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="flex flex-col space-y-6">
                <table class="border">
                    <thead class="border text-xs">
                        <tr class="border">
                        <th class="border">প্রসেস নং</th>
                        <th class="border">মামলা নম্বর তারিখ ও ধারা</th>
                        <th class="border">আসামির নাম</th>
                        <th class="border">আসামির পিতার নাম</th>
                        <th class="border">আসামির ঠিকানা</th>
                        <th class="border">অপরাধের ধরন</th>
                        <th class="border">থানায় প্রেরনের তারিখ</th>
                        

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
                        </tr>
                    </tbody>
                </table>
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