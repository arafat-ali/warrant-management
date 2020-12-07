<template>
    <div id="home">
      <datatable 
        title="ওয়ারেন্ট লিস্ট"
        :columns="tableColumns"
        :rows="warrants"
        :printable= false
        :exportable = false
      ></datatable>
      <!-- <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            ওয়ারেন্ট লিস্ট
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="flex flex-col space-y-6">
                <table class="border">
                    <thead class="border text-xs">
                        <tr class="border">
                        <th class="border">প্রসেস নং</th>
                        <th class="border">জি আর নাম্বার</th>
                        <th class="border">অন্যান্য কোর্টের নাম্বার</th>
                        <th class="border">কোর্ট হতে প্রেরণের তারিখ</th>
                        <th class="border">থানা</th>
                        <th class="border">অপরাধের ধরন</th>
                        <th class="border">ইস্যুকারি আদালত</th>
                        <th class="border">মামলার সূত্র</th>
                        <th class="border">থানায় প্রেরনের তারিখ</th>
                        <th class="border">আদালতে হাজিরের তারিখ</th>
                        <th class="border">আসামির নাম</th>
                        <th class="border">আসামির পিতার নাম</th>
                        <th class="border">আসামির ঠিকানা</th>
                        <th class="border">মোবাইল নং</th>
                        <th class="border">আসামির এনআইডি</th>
                        <th class="border">আসামির জন্ম নিবন্ধন</th>
                        

                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr class="border text-center" v-for="warrant in warrants">
                            <td class="border">{{warrant.process_number}}</td>
                            <td class="border">{{warrant.gr_number}}</td>
                            <td class="border">{{warrant.other_number}}</td>
                            <td class="border">{{warrant.send_date}}</td>
                            <td class="border">{{warrant.thana_name}}</td>
                            <td class="border">{{warrant.warrant_type}}</td>
                            <td class="border">{{warrant.court_id}}</td>
                            <td class="border">{{warrant.case_hint}}</td>
                            <td class="border">{{warrant.arrest_warrant_to_thana}}</td>
                            <td class="border">{{warrant.arrest_criminal_to_court}}</td>
                            <td class="border">{{warrant.criminal_name}}</td>
                            <td class="border">{{warrant.criminal_father_name}}</td>
                            <td class="border">{{warrant.criminal_address}}</td>
                            <td class="border">{{warrant.criminal_mobile_no}}</td>
                            <td class="border">{{warrant.criminal_NID}}</td>
                            <td class="border">{{warrant.birth_cirtificate}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div> -->
    </div>
</template>

<script>
import DataTable from "vue-materialize-datatable";
  export default {

    name: 'warrant_list',
    data () {
      return {
        tableColumns: [
        {
          label: "প্রসেস নং",
          field: "process_number",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "জি আর নাম্বার",
          field: "gr_number",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "অন্যান্য কোর্টের নাম্বার",
          field: "other_number",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "আসামির নাম",
          field: "criminal_name",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "আসামির পিতার নাম",
          field: "criminal_father_name",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "আসামির ঠিকানা",
          field: "criminal_address",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "কোর্ট হতে প্রেরণের তারিখ",
          field: "send_date",
          numeric: false,
          html: false,
          searchable: true
        },
        // {
        //   label: "থানা",
        //   field: "thana_name",
        //   numeric: false,
        //   html: false,
        //   searchable: true
        // },
        {
          label: "ইস্যুকারি আদালত",
          field: "court_id",
          numeric: false,
          html: false,
          searchable: true
        },
        // {
        //   label: "মামলার সূত্র",
        //   field: "case_hint",
        //   numeric: false,
        //   html: false,
        //   searchable: true
        // },
        {
          label: "থানায় প্রেরনের তারিখ",
          field: "arrest_warrant_to_thana",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "আদালতে হাজিরের তারিখ",
          field: "arrest_criminal_to_court",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "মোবাইল নং",
          field: "criminal_mobile_no",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "আসামির এনআইডি",
          field: "criminal_NID",
          numeric: false,
          html: false,
          searchable: true
        },
        {
          label: "আসামির জন্ম নিবন্ধন",
          field: "birth_cirtificate",
          numeric: false,
          html: false,
          searchable: true
        }
      ],
      tableRows: [],
      }
    },
    components:{
      "datatable": DataTable
    },
    computed: {
      warrants(){
        return store.getters.getCourtWarrants;
      }
    },
    created(){
      store.dispatch('fetchCourtWarrants');
      //this.warrants = 
    }
}
</script>