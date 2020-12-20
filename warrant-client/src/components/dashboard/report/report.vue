<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            রিপোর্ট
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">

            <div class="w-full bg-white border rounded-lg p-8 mb-8 flex flex-col space-y-6">
              <div class="h-20 flex flex-col justify-start lg:flex-row lg:justify-between gap-4">
                  <div class="w-full">
                    <label for="">জেলা</label>
                    <select class="w-full block border rounded py-2 px-4" v-model="districtId" @change="getThanaByDistrictId()">
                      <option value="" selected>--নির্বাচন করুন--</option>
                      <option v-for="district in districts" :key="district.id" :value="district.id">{{district.name}}</option>
                    </select>
                  </div>
                  <div class="w-full">
                    <label for="">থানা</label>
                    <select class="w-full block border rounded py-2 px-4" v-model="thanaId">
                      <option value="" selected>--নির্বাচন করুন--</option>
                      <option v-for="thana in thanas" :key="thana.id" :value="thana.name">{{thana.name}}</option>
                    </select>
                  </div>
                  <div class="w-full">
                    <label for="">অপরাধের ধরন</label>
                    <select class="w-full block border rounded py-2 px-4" v-model="crimeId">
                      <option value="" selected>--নির্বাচন করুন--</option>
                      <option v-for="crime in crimeCategories" :key="crime.id" :value="crime.name">{{crime.name}}</option>
                    </select>
                  </div> 
                  <div class="w-full">
                    <label for="">ওয়ারেন্ট এর ধরণ</label>
                    <select v-model="warrant_type" class="w-full block border rounded py-2 px-4">
                      <option value="" selected>--নির্বাচন করুন--</option>
                      <option value="জিআর সাজা">জিআর সাজা</option>
                      <option value="জিআর গ্রেফতার">জিআর গ্রেফতার</option>
                      <option value="সিআর সাজা">সিআর সাজা</option>
                      <option value="সিআর গ্রেফতার">সিআর গ্রেফতার</option>
                    </select>
                  </div>
              </div> 
              <div class="h-20 flex flex-col justify-start lg:flex-row lg:justify-between gap-4">
                <div class="w-full">
                  <label for="">তারিখ হতে</label>
                  <input v-model="start_date" type="date" class="input">
                </div>
                <div class="w-full">
                  <label for="">তারিখ পর্যন্ত</label>
                  <input v-model="end_date" type="date" class="input">
                </div>
              </div>
              <div class="w-full flex justify-center">
                <button @click="formSubmit" class="bg-blue-500 py-3 px-8 text-white rounded-md">
                  সাবমিট  
                </button>
              </div>
            </div>
            <div v-show="showTable" class="h-96 overflow-auto">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                <table class="min-w-full">
                  <thead>
                    <tr class="text-xs">
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">#</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মোট ওয়ারেন্ট</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মূলতবি ওয়ারেন্ট</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">তামিল ওয়ারেন্ট</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মোট গড়মিল</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">নন রিসিভ</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">রিকল নন রিসিভড</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">প্রসেস নম্বর বিহীন</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">প্রসেস নম্বর গড়মিল</th>
                    </tr>
                  </thead>
                  <tbody class="text-sm text-center">
                    <tr class="border-l border-r">
                      <td class="p-2 border border-gray-200">1</td>
                      <td class="p-2 border border-gray-200">{{data.Total_warrant}}</td>
                      <td class="p-2 border border-gray-200">{{data.Total_unexecuted_warrant}}</td>
                      <td class="p-2 border border-gray-200">{{data.Total_executed_warrant}}</td>
                      <td class="p-2 border border-gray-200">{{data.Total_mismatch}}</td>
                      <td class="p-2 border border-gray-200">{{data.ThanaNotRecieveMismatch}}</td>
                      <td class="p-2 border border-gray-200">{{data.FindRecalledMismatch}}</td>
                      <td class="p-2 border border-gray-200">{{data.ProcessNumberNotFoundMismatch}}</td>
                      <td class="p-2 border border-gray-200">{{data.FindProcessNoMismatch}}</td>
                      
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

    name: 'report',
    data () {
      return {
        data:[],
        warrant_type: '',
        districts: [],
        thanas: [],
        crimeCategories:[],
        districtId: '',
        thanaId: '',
        crimeId:'',
        start_date:'',
        end_date:'',
        showTable:false

      }
    },
    methods:{
      getDistrict(){
        axios
        .get('api/districts')
        .then(response => {
          this.districts = response.data.data;
        })
        .catch(error =>{
          alert(error);
        })
      },
      getThanaByDistrictId(){
        if(this.districtId){
          axios
          .get('api/thanas-by-district/' + this.districtId)
          .then(response => {
            this.thanas = response.data.data;
          })
          .catch(error =>{
            alert(error);
          })
        }
        else {
          this.thanas = [];
        }
      },
      formSubmit(e){
        e.preventDefault();
        this.showTable = true;
        

        let data = new FormData();
        data.append('districtId', this.districtId);
        data.append('thanaId', this.thanaId);
        data.append('crimeId', this.crimeId);
        data.append('warrant_type', this.warrant_type);
        data.append('start_date', this.start_date);
        data.append('end_date', this.end_date);


        axios
          .post('api/show-report',data)
          .then(response => {
            this.data = response.data.data;
          })
          .catch(error => {
            console.log(error)
          });
      }
     
    },
    computed:{
      
    },
    created(){
      this.getDistrict();

      axios
        .get('api/crime-categories')
        .then(response => {
          this.crimeCategories = response.data.data;
          //console.log(this.crimeCategories);
        })
        .catch(error => {
          console.log(error)
        });
      
    }
}
</script>