<template>
    <div id="home">
      <!-- breadcrumb -->
      <nav class="text-sm font-semibold mb-6" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex">
          <li class="flex items-center text-blue-500">
            <a href="#" class="text-gray-700">Home</a>
            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
          </li>
          <li class="flex items-center">
            <a href="#" class="text-gray-600">Add warrant</a>
          </li>
        </ol>
      </nav>
      <!-- breadcrumb end -->

      
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            নতুন ওয়ারেন্ট(থানা)
          </p>
          <div class="content">
            <div class="form-wizard">
                <div class="form-wizard-item">
                  <button class="form-wizard-btn " :class="wizardActive1">01</button>
                </div>
                <div class="form-wizard-item">
                  <button class="form-wizard-btn" :class="wizardActive2">02</button>
                </div>
            </div>
            <!-- First Form Start -->
            <div :class="form1">
              <div class="form">
                <div class="form-item justify-between gap-2">
                  <div>
                      <label for="">ওয়ারেন্ট এর ধরণ</label>
                      <select v-model="warrant_type" class="select" >
                      <option value="" >--নির্বাচন করুন--</option>
                      <option value="জিআর সাজা">জিআর সাজা</option>
                      <option value="জিআর গ্রেফতার">জিআর গ্রেফতার</option>
                      <option value="সিআর সাজা">সিআর সাজা</option>
                      <option value="সিআর গ্রেফতার">সিআর গ্রেফতার</option>
                      </select>
                  </div>
                  <div>
                      <label for="">থানা</label>
                      <select v-model="thana_id" class="select" >
                      <option value="" >--নির্বাচন করুন--</option>
                      <option v-for="thana in thanas" :key="thana.id" :value="thana.id">{{thana.name}}</option>
                      </select>
                  </div>
                  <div>
                    <fieldset class="border border-gray-700 rounded-lg px-2 pb-3 flex flex-col space-y-2 lg:flex-row lg:justify-between gap-2">
                      <legend>অন্য জেলা হতে আসা পরোয়ানা</legend>
                      <div>
                        <label for="">জেলা</label> 
                        <select v-model="thana_id" class="select" >
                        <option value="" >--নির্বাচন করুন--</option>
                        <option v-for="thana in thanas" :key="thana.id" :value="thana.id">{{thana.name}}</option>
                        </select>
                      </div>
                      <div>
                        <label for="">থানা</label>
                        <input type="text" class="input" placeholder="থানা">
                      </div>
                    </fieldset>
                  </div>
                </div>
                <div class="text-center" @click="form()">
                  <button class="btn">পরবর্তি</button>
                </div>
              </div>
            </div>
             <!-- First Form End -->

             <!-- Second Form Start -->
            <div :class="form2">
              <div class="form">
                <div class="form-item justify-between gap-2">
                  <div>
                    <label for="">প্রসেস নং</label>
                    <input v-model="process_number" class="input" type="text" placeholder="প্রসেস নং">
                  </div>
                  <div>
                    <label for="">জি আর নাম্বার</label>
                    <input v-model="gr_number" class="input" type="text" placeholder="জি আর নাম্বার">
                  </div>
                            
                </div>
                <div class="">
                    <fieldset class="border border-gray-700 rounded-lg px-2 pb-3 flex flex-col space-y-2 lg:flex-row lg:justify-between">
                      <legend>মামলা</legend>
                      <div>
                        <label for="">নম্বর</label>
                        <input class="input" placeholder="নম্বর">
                      </div>
                      <div>
                        <label for="">তারিখ</label>
                        <input class="input" type="date">
                      </div>
                      <div>
                        <label for="">ধারা</label>
                        <input class="input" placeholder="ধারা">
                      </div>
                    </fieldset>
                  </div>                 
                <div class="form-item justify-between">
                  <div>
                    <label for="">অন্যান্য কোর্টের নাম্বার</label>
                    <input v-model="other_number" class="input" type="text" placeholder="অন্যান্য কোর্টের নাম্বার">
                  </div>
                  <div>
                    <label for="">সেশন আদালত</label>
                    <input v-model="other_number" class="input" type="text" placeholder="সেশন আদালত">
                  </div>
                  <div>
                    <label for="">কোর্ট হতে প্রেরণের তারিখ</label>
                    <input v-model="send_date" class="input" type="date" placeholder="Date">
                  </div>
                  
                </div>
                <!-- item end -->

                <div class="form-item justify-between">    
                  <div>
                    <div class="form-item justify-between gap-2">
                      <div>
                        <label for="">অপরাধের ধরন</label>
                        <select v-model="crime_category_id" class="select" >
                          <option value="" >--নির্বাচন করুন--</option>
                          <option v-for="crimeCategory in crimeCategories" :key="crimeCategory.id" :value="crimeCategory.id">{{crimeCategory.name}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div>
                    <label for="">পরোয়ানা ইস্যুকারি আদালত</label>
                    <select v-model="court_id" class="select" >
                      <option value="" >--নির্বাচন করুন--</option>
                      <option v-for="court in courts" :key="court.id" :value="court.id">{{court.name}}</option>
                    </select>
                  </div>
                  <div>
                    <label for="">মামলার সূত্র</label>
                    <input v-model="case_hint" class="input" placeholder="মামলার সূত্র">
                  </div>
                  
                </div>
                <!-- item end -->

                <div class="form-item justify-between gap-2">
                  <div>
                    <label for="">পরোয়ানা থানায় প্রেরনের তারিখ</label>
                    <input v-model="arrest_warrant_to_thana" class="input" type="date" placeholder="Something...">
                  </div>
                  <div>
                    <label for="">পরোয়ানা থানায় রিসিভের তারিখ</label>
                    <input v-model="arrest_criminal_to_court" class="input" type="date" placeholder="Something...">
                  </div>
                  <div>
                    <label for="">আসামী আদালতে হাজির করার তারিখ </label>
                    <input v-model="arrest_criminal_to_court" class="input" type="date" placeholder="Something...">
                  </div>
                  
                </div>
                <!-- item end -->

                <div class="form-item justify-between gap-2">
                  <div class="w-full">
                    <fieldset class="border border-gray-500 rounded-lg px-2 pb-2 py-4">
                      <legend class="text-gray-800">গ্রেফতারি পরোয়ানার ছবি</legend>
                      <div class="flex flex-col space-y-2 lg:flex-row lg:space-y-0 lg:justify-between lg:-space-x-20 text-sm">
                        <div>
                          <label>প্রথম পৃষ্ঠা</label>
                          <input @change="arrest_warrant_picture_one($event)" class="pl-2 md:pl-0" type="file" placeholder="Something...">
                        </div>
                        <div>
                          <label for="">দ্বিতীয় পৃষ্ঠা</label>
                          <input @change="arrest_warrant_picture_two($event)" class="" type="file" placeholder="Something...">
                        </div>
                      </div>
                    </fieldset>
                  </div>
                </div>

                <div>
                  <fieldset class="border border-gray-700 rounded-lg px-4">
                    <legend class="text-blue-500">আসামির বিস্তারিত</legend>
                    <div class="form-item justify-between">
                      <div>
                        <label for="">নাম</label>
                        <input v-model="criminal_name" class="input" placeholder="নাম"> 
                      </div>
                      <div>
                        <label for="">পিতার নাম</label>
                        <input v-model="criminal_father_name" class="input" placeholder="পিতার নাম"> 
                      </div>
                      <div>
                        <label for="">ঠিকানা</label>
                        <input v-model="criminal_address" class="input"  placeholder="ঠিকানা">
                      </div>
                      
                      <div>
                        <label for="">মোবাইল নং</label>
                        <input v-model="criminal_mobile_no" class="input" type="number" placeholder="মোবাইল নং">
                      </div>
                    </div>
                    
                    <div class="mb-3 mt-4">
                      <fieldset class="border border-gray-700 rounded-lg px-4 w-full lg:w-1/2">
                        <legend>অন্যান্য ডকুমেন্ট</legend>
                        <div class="flex flex-row lg:flex-row justify-between mb-2">
                          <div>
                            <input type="checkbox" id="1" v-model="nid_is_checked" />
                            <label for="" class="px-2 text-sm">এনআইডি</label>
                          </div>
                          <div>
                            <input type="checkbox" id="2" v-model="birth_is_checked" />
                            <label for="" class="px-2 text-sm">জন্ম নিবন্ধন</label>
                          </div>
                          <div>
                            <input type="checkbox" id="3" v-model="passport_is_checked"/>
                            <label for="" class="px-2 text-sm">পাসপোর্ট</label>
                          </div>
                        </div>
                      </fieldset>
                    </div>

                    <div class=" justify-start gap-4">
                        <div class="my-4" v-if="nid_is_checked">
                          <label for="">এনআইডি</label>
                          <input v-model="criminal_NID" class="input" placeholder="No." >  
                        </div>
                        <div class="my-4" v-if="birth_is_checked">
                          <label for="">জন্ম নিবন্ধন</label>
                          <input v-model="birth_cirtificate" class="input" placeholder="No." >  
                        </div>
                        <div class="my-4" v-if="passport_is_checked">
                          <label for="">পাসপোর্ট</label>
                          <input v-model="criminal_passport" class="input" placeholder="No." >  
                        </div>

                    </div>
                  </fieldset>
                </div>
                
                <div class="text-center">
                  <button @click="saveWarrantInfo" class="btn">সেভ করুন</button>
                </div>
                <!-- button end -->
              </div>
            </div>
            <!-- Second Form End -->
          </div>
        </div>
      </div>
      
    </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
import Multiselect from 'vue-multiselect'

  export default {
    // OR register locally
    components: { Multiselect },
     name: 'warrantAddThana',
    data () {
      return {
        form1: "",
        form2: "hidden",
        wizardActiveClass: "bg-blue text-white",
        wizardSuccesseClass: "bg-green text-white",
        wizardActive1: 'text-white',
        wizardActive2: 'bg-white text-black',
        value: [],
        options: [
          { name: 'এনআইডি', id: '1', value:'' },
          { name: 'জন্ম নিবন্ধন', id: '2', value:'' },
          { name: 'পাসপোর্ট', id: '3', value:'' },
        ],
        thanas: [],
        courts:[],
        crimeCategories:[],
        crimeSubCategories: [],

        process_number: '',
        gr_number: '',
        other_number:'',
        send_date: '',
        warrant_type: '',
        thana_id: '',
        crime_category_id: '',
        // crime_subcategory_id:'',
        court_id: '',
        case_hint: '',
        arrest_criminal_to_court: '',
        arrest_warrant_to_thana: '',
        picture_one: '',
        picture_two: '',
        criminal_name: '',
        criminal_father_name: '',
        criminal_address:'',
        criminal_mobile_no: '',
        criminal_NID: '',
        criminal_passport: '',
        birth_cirtificate:'',

        nid_is_checked: false,
        birth_is_checked: false,
        passport_is_checked: false,



      }
    },
    computed:{
      // async crimeSubCategoriesById(){
      //   var crimeSubCategories = [];
      //   if(this.crime_category_id!=""){
      //     await axios
      //     .get('api/crime-subcategories/'+this.crime_category_id)
      //     .then(response => {
      //       crimeSubCategories = response.data.CrimeSubCategories;
      //     })
      //   }
      //   console.log(crimeSubCategories);
      //   return crimeSubCategories;
      // }
      //Crime Sub Category 
      // crimeSubCategoriesById(){
      //   var crimeSubCategoriesById = [];
      //   if(this.crime_category_id!=""){
      //     crimeSubCategoriesById = this.crimeSubCategories.filter(crimeSubCategory => crimeSubCategory.category_id===this.crime_category_id);
      //   }
      //   return crimeSubCategoriesById;
      // }
    },
    methods:{
      saveWarrantInfo(e){
        e.preventDefault();
        const config = {
            headers: { 'content-type': 'multipart/form-data' }
        }

        let data = new FormData();
        data.append('process_number', this.process_number);
        data.append('gr_number', this.gr_number);
        data.append('other_number', this.other_number);
        data.append('send_date', this.send_date);
        data.append('warrant_type', this.warrant_type);
        data.append('thana_id', this.thana_id);
        data.append('crime_category_id', this.crime_category_id);
        data.append('court_id', this.court_id);
        data.append('case_hint', this.case_hint);
        data.append('arrest_criminal_to_court', this.arrest_criminal_to_court);
        data.append('arrest_warrant_to_thana', this.arrest_warrant_to_thana);
        data.append('arrest_warrant_picture_one', this.picture_one);
        data.append('arrest_warrant_picture_two', this.picture_two);
        data.append('criminal_name', this.criminal_name);
        data.append('criminal_father_name', this.criminal_father_name);
        data.append('criminal_address', this.criminal_address);
        data.append('criminal_mobile_no', this.criminal_mobile_no);
        data.append('criminal_NID', this.criminal_NID);
        data.append('criminal_passport', this.criminal_passport);
        data.append('birth_cirtificate', this.birth_cirtificate);

        axios
          .post('api/add-warrant', data, config)
          .then(response => {
            console.log(response.data.Message);
          })
          .catch(response => {
          });

        
      },
      arrest_warrant_picture_one(e){
        this.picture_one = e.target.files[0];
        console.log(this.picture_one)
        //data.append('arrest_warrant_picture_one', event.target.files[0]);
      },
      arrest_warrant_picture_two(e){
        this.picture_two = e.target.files[0];
        console.log(this.picture_two)
      },
      form(){
        this.form1 = "hidden";
        this.form2 = "";
        this.wizardActive1 = "bg-green-500 text-white"
        this.wizardActive2 = "bg-blue text-white"

      }

    },
    created(){
      axios
        .get('api/thanas')
        .then(response => {
          this.thanas = response.data.Thana;
          //console.log(this.thanas);
        })
        .catch(error => {
          console.log(error)
        });

      axios
        .get('api/courts')
        .then(response => {
          this.courts = response.data.Court;
          //console.log(this.courts);
        })
        .catch(error => {
          console.log(error)
        });

      axios
        .get('api/crime-categories')
        .then(response => {
          this.crimeCategories = response.data.CrimeCategories;
          //console.log(this.crimeCategories);
        })
        .catch(error => {
          console.log(error)
        });

      // axios
      //   .get('api/crime-subcategories')
      //   .then(response => {
      //     this.crimeSubCategories = response.data.CrimeSubCategories;
      //     //console.log(this.crimeCategories);
      //   })
      //   .catch(error => {
      //     console.log(error)
      //   });
    }
}
</script>