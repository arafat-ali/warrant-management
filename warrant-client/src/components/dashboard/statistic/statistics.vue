<template>
    <div id="home">

      <div class="flex flex-wrap -mx-3 mb-20">

        <div class="w-1/2 xl:w-1/4 px-3">
          <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
            <svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
              <path d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"></path>
            </svg>

            <div class="text-gray-700">
              <p class="font-semibold text-3xl cursor-pointer" @click="thana_not_receive_func">{{thana_not_receives.length}}</p>
              <p @click="thana_not_receive_func" class="cursor-pointer">থানায় রিসিভ হয়নি</p>
            </div>

          </div>
        </div>

        <div class="w-1/2 xl:w-1/4 px-3">
          <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
            <svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
              <path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
            </svg>

            <div class="text-gray-700">
              <p class="font-semibold text-3xl cursor-pointer" @click = "process_no_not_found_func">{{process_no_not_founds.length}}</p>
              <p @click="process_no_not_found_func" class="cursor-pointer">প্রসেস নাম্বার বিহীন</p>
            </div>
          </div>
        </div>

        <div class="w-1/2 xl:w-1/4 px-3">
          <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
            <svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
              <path d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"></path>
            </svg>

            <div class="text-gray-700">
              <p class="font-semibold text-3xl cursor-pointer" @click="recalled_mismatch_func">{{recalled_mismatch.length}}</p>
              <p @click="recalled_mismatch_func" class="cursor-pointer">রিকল্ড গড়মিল</p>
            </div>

          </div>
        </div>

        <div class="w-1/2 xl:w-1/4 px-3">
          <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
            <svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
              <path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
            </svg>

            <div class="text-gray-700">
              <p class="font-semibold text-3xl cursor-pointer" @click = "process_no_mismatch_func">{{process_no_mismatch.length}}</p>
              <p @click="process_no_mismatch_func" class="cursor-pointer">প্রসেস নাম্বারের অমিল</p>
            </div>
          </div>
        </div>

      </div>
      <div v-show="thana_not_received_show" class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            থানায় রিসিভ হয়নি ওয়ারেন্ট লিস্ট
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
                        <tr class="border text-center" v-for="thana_not_receive in thana_not_receives">
                            <td class="border">{{thana_not_receive.process_number}}</td>
                            <td class="border">{{thana_not_receive.gr_number}}</td>
                            <td class="border">{{thana_not_receive.other_number}}</td>
                            <td class="border">{{thana_not_receive.send_date}}</td>
                            <td class="border">{{thana_not_receive.thana_name}}</td>
                            <td class="border">{{thana_not_receive.warrant_type}}</td>
                            <td class="border">{{thana_not_receive.court_id}}</td>
                            <td class="border">{{thana_not_receive.case_hint}}</td>
                            <td class="border">{{thana_not_receive.arrest_warrant_to_thana}}</td>
                            <td class="border">{{thana_not_receive.arrest_criminal_to_court}}</td>
                            <td class="border">{{thana_not_receive.criminal_name}}</td>
                            <td class="border">{{thana_not_receive.criminal_father_name}}</td>
                            <td class="border">{{thana_not_receive.criminal_address}}</td>
                            <td class="border">{{thana_not_receive.criminal_mobile_no}}</td>
                            <td class="border">{{thana_not_receive.criminal_NID}}</td>
                            <td class="border">{{thana_not_receive.birth_cirtificate}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

      <div v-show="process_no_not_found_show" class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            প্রসেস নাম্বার বিহীন ওয়ারেন্ট লিস্ট
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
                        <tr class="border text-center" v-for="process_no_not_found in process_no_not_founds">
                            <td class="border">{{process_no_not_found.process_number}}</td>
                            <td class="border">{{process_no_not_found.gr_number}}</td>
                            <td class="border">{{process_no_not_found.other_number}}</td>
                            <td class="border">{{process_no_not_found.send_date}}</td>
                            <td class="border">{{process_no_not_found.thana_name}}</td>
                            <td class="border">{{process_no_not_found.warrant_type}}</td>
                            <td class="border">{{process_no_not_found.court_id}}</td>
                            <td class="border">{{process_no_not_found.case_hint}}</td>
                            <td class="border">{{process_no_not_found.arrest_warrant_to_thana}}</td>
                            <td class="border">{{process_no_not_found.arrest_criminal_to_court}}</td>
                            <td class="border">{{process_no_not_found.criminal_name}}</td>
                            <td class="border">{{process_no_not_found.criminal_father_name}}</td>
                            <td class="border">{{process_no_not_found.criminal_address}}</td>
                            <td class="border">{{process_no_not_found.criminal_mobile_no}}</td>
                            <td class="border">{{process_no_not_found.criminal_NID}}</td>
                            <td class="border">{{process_no_not_found.birth_cirtificate}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

      <div v-show="recalled_mismatch_show" class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            রিকল্ড গড়মিল ওয়ারেন্ট লিস্ট
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
                        <tr class="border text-center" v-for="recalled_item in recalled_mismatch">
                            <td class="border">{{recalled_item.process_number}}</td>
                            <td class="border">{{recalled_item.gr_number}}</td>
                            <td class="border">{{recalled_item.other_number}}</td>
                            <td class="border">{{recalled_item.send_date}}</td>
                            <td class="border">{{recalled_item.thana_name}}</td>
                            <td class="border">{{recalled_item.warrant_type}}</td>
                            <td class="border">{{recalled_item.court_id}}</td>
                            <td class="border">{{recalled_item.case_hint}}</td>
                            <td class="border">{{recalled_item.arrest_warrant_to_thana}}</td>
                            <td class="border">{{recalled_item.arrest_criminal_to_court}}</td>
                            <td class="border">{{recalled_item.criminal_name}}</td>
                            <td class="border">{{recalled_item.criminal_father_name}}</td>
                            <td class="border">{{recalled_item.criminal_address}}</td>
                            <td class="border">{{recalled_item.criminal_mobile_no}}</td>
                            <td class="border">{{recalled_item.criminal_NID}}</td>
                            <td class="border">{{recalled_item.birth_cirtificate}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

      <div v-show="process_no_mismatch_show" class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            প্রসেস নাম্বারের অমিল ওয়ারেন্ট লিস্ট
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
                        <tr class="border text-center" v-for="process_no_item in process_no_mismatch">
                            <td class="border">{{process_no_item.process_number}}</td>
                            <td class="border">{{process_no_item.gr_number}}</td>
                            <td class="border">{{process_no_item.other_number}}</td>
                            <td class="border">{{process_no_item.send_date}}</td>
                            <td class="border">{{process_no_item.thana_name}}</td>
                            <td class="border">{{process_no_item.warrant_type}}</td>
                            <td class="border">{{process_no_item.court_id}}</td>
                            <td class="border">{{process_no_item.case_hint}}</td>
                            <td class="border">{{process_no_item.arrest_warrant_to_thana}}</td>
                            <td class="border">{{process_no_item.arrest_criminal_to_court}}</td>
                            <td class="border">{{process_no_item.criminal_name}}</td>
                            <td class="border">{{process_no_item.criminal_father_name}}</td>
                            <td class="border">{{process_no_item.criminal_address}}</td>
                            <td class="border">{{process_no_item.criminal_mobile_no}}</td>
                            <td class="border">{{process_no_item.criminal_NID}}</td>
                            <td class="border">{{process_no_item.birth_cirtificate}}</td>
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
  export default{
    data(){
      return{
        thana_not_receives:[],
        process_no_not_founds: [],
        recalled_mismatch:[],
        process_no_mismatch:[],

        thana_not_received_show:false,
        process_no_not_found_show: false,
        recalled_mismatch_show :false,
        process_no_mismatch_show:false,
      }
    },
    methods:{
      thana_not_receive_func(){
        this.thana_not_received_show = !this.thana_not_received_show ;
        this.process_no_not_found_show = false;
        this.recalled_mismatch_show = false;
        this.process_no_mismatch_show = false;
      },
      process_no_not_found_func(){
        this.process_no_not_found_show = !this.process_no_not_found_show;
        this.thana_not_received_show = false;
        this.recalled_mismatch_show = false;
        this.process_no_mismatch_show = false;
      },
      recalled_mismatch_func(){
        this.recalled_mismatch_show = !this.recalled_mismatch_show;
        this.process_no_not_found_show = false;
        this.thana_not_received_show = false;
        this.process_no_mismatch_show = false;
      },
      process_no_mismatch_func(){
        this.process_no_mismatch_show = !this.process_no_mismatch_show;
        this.thana_not_received_show = false;
        this.process_no_not_found_show = false;
        this.recalled_mismatch_show = false;
      }
    },
    created(){
      axios
        .get('api/thana-not-recieve')
        .then(response => {
          this.thana_not_receives = response.data.Mismatch;
          console.log(this.thana_not_receives.length);
        })
        .catch(error => {
          console.log(error)
        });

      axios
        .get('api/process-no-not-found')
        .then(response => {
          this.process_no_not_founds = response.data.Mismatch;
        })
        .catch(error => {
          console.log(error)
        });

      axios
        .get('api/recalled-mismatch')
        .then(response => {
          this.recalled_mismatch = response.data.Mismatch;
        })
        .catch(error => {
          console.log(error)
        });

      axios
        .get('api/process-no-not-match')
        .then(response => {
          this.process_no_mismatch = response.data.Mismatch;
        })
        .catch(error => {
          console.log(error)
        });
    }

  }
</script>

<style>
  
</style>