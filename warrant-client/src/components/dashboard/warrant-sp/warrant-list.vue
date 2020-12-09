<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            ওয়ারেন্ট লিস্ট
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0 ">
            <div class="flex flex-col space-y-6 ">
              <div class="h-20 flex flex-col lg:flex-row justify-start">
                <div class="px-6">
                  <label for="">সার্চ</label>
                  <select v-model="selectedField" class="select" >
                    <option value="" selected>--নির্বাচন করুন--</option>
                    <option v-for="field in fields" :key="field.id" :value="field">{{field.name}}</option>
                  </select>
                </div>
                <div class="px-6" v-if="selectedField">
                  <label for="">{{selectedField.name}}</label>
                  <input type="text" class="input" v-model="searchText" :placeholder="selectedField.name" @keyup="search(selectedField.nameArr)" >
                </div>
              </div>
                
                <div>
                  <table class="border table-auto overscroll-hidden">
                    <thead class="border text-xs ">
                      <tr class="border">
                        <th class="border">#</th>
                        <th class="border">প্রসেস নং</th>
                        <th class="border">জিআর নম্বর</th>
                        <th class="border">অন্যান্য কোর্টের নাম্বার</th>
                        <th class="border">কোর্ট হতে প্রেরণের তারিখ</th>
                        <th class="border">থানা</th>
                        <th class="border">অপরাধের ধরন</th> 
                        <th class="border">ইস্যুকারি আদালত</th>
                        <th class="border">থানায় প্রেরনের তারিখ</th>
                        <th class="border">আদালতে হাজিরের তারিখ</th>
                        <th class="border">আসামির নাম</th>
                        <th class="border">আসামির পিতার নাম</th>
                        <th class="border">আসামির ঠিকানা</th>
                        <th class="border">মোবাইল নং</th>
                        <th class="border">আসামির এনআইডি</th>
                        <th class="border">আসামির জন্ম নিবন্ধন</th>
                        <th class="border">স্ট্যাটাস</th>
                      </tr> 
                    </thead>
                    <tbody class="text-xs">
                      <tr class="border text-center" v-for="(warrant, index) in searchedWarrant" :key="warrant.id">
                        <td class="border">{{index}}</td>
                          <td class="border">{{warrant.process_number}}</td>
                          <td class="border">{{warrant.gr_number}}</td>
                          <td class="border">{{warrant.other_number}}</td>
                          <td class="border">{{warrant.send_date}}</td>
                          <td class="border">{{warrant.thana_name}}</td>
                          <td class="border">{{warrant.warrant_type}}</td>
                          <td class="border">{{warrant.court_id}}</td>
                          <td class="border">{{warrant.arrest_warrant_to_thana}}</td>
                          <td class="border">{{warrant.arrest_criminal_to_court}}</td>
                          <td class="border">{{warrant.criminal_name}}</td>
                          <td class="border">{{warrant.criminal_father_name}}</td>
                          <td class="border">{{warrant.criminal_address}}</td>
                          <td class="border">{{warrant.criminal_mobile_no}}</td>
                          <td class="border">{{warrant.criminal_NID}}</td>
                          <td class="border">{{warrant.birth_cirtificate}}</td>
                          <td class="border">
                            <div class="rounded-full py-1 px-3 bg-yellow-500 text-white" v-if="warrant.is_executed == 0">Pending</div>
                            <div class="rounded-full py-1 px-3 bg-green-500 text-white" v-if="warrant.is_executed == 1">Executed</div>
                          </td> 
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- <div class="border flex flex-col overflow-scroll overscroll-none h-96" style="width: 62rem">
                  <div class="flex flex-row justify-between">
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm" >#</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 2</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 3</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 4</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 5</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 6</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 7</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 8</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 9</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 10</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 11</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 12</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 13</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 14</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 15</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 16</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 17</div>
                  </div> 
                    <div class="flex flex-row justify-between">
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm" >head 1</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 2</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 3</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 4</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 5</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 6</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 7</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 8</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 9</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 10</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 11</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 12</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 13</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 14</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 15</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 16</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">head 17</div>
                    </div>         
                </div>   -->
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default {

    name: 'warrant-list-sp',
    data () {
      return {
        warrants:[],
        searchedWarrant: [],
        fields: [
          { id: '1', name:'প্রসেস নং', nameArr: 'process_number'},
          { id: '2', name:'জিআর নম্বর', nameArr: 'gr_number'},
          { id: '3', name:'অন্যান্য কোর্টের নাম্বার', nameArr: 'other_number'},
          { id: '4', name:'কোর্ট হতে প্রেরণের তারিখ', nameArr: 'send_date'},
          { id: '5', name:'থানা', nameArr: 'thana_name'},
          { id: '6', name:'অপরাধের ধরন', nameArr: 'warrant_type'},
          { id: '7', name:'ইস্যুকারি আদালত', nameArr: 'court_id'},
          { id: '8', name:'থানায় প্রেরনের তারিখ', nameArr: 'arrest_warrant_to_thana'},
          { id: '9', name:'আদালতে হাজিরের তারিখ', nameArr: 'arrest_criminal_to_court'},
          { id: '10', name:'আসামির নাম', nameArr: 'criminal_name'},
          { id: '11', name:'আসামির পিতার নাম', nameArr: 'criminal_father_name'},
          { id: '12', name:'আসামির ঠিকানা', nameArr: 'criminal_address'},
          { id: '13', name:'মোবাইল নং', nameArr: 'criminal_address'},
          { id: '14', name:'আসামির এনআইডি', nameArr: 'criminal_NID'},
          { id: '15', name:'আসামির জন্ম নিবন্ধন', nameArr: 'birth_cirtificate'},
        ],
        selectedField: '',
        searchText: '',
      }
    },
    methods:{
      search(fieldName){
        this.searchedWarrant = this.warrants; 
        let searchArr = [];
        for(let i=0; i < this.warrants.length; i++){
          if(this.warrants[i][this.selectedField.nameArr].search(this.searchText) >= 0){
            searchArr.push(this.warrants[i]);
          }
         
        }
        this.searchedWarrant = searchArr;
        console.log(searchArr);
     
      }
    },
    created(){
      store.dispatch('fetchThanaWarrants');
      this.warrants = store.getters.getThanaWarrants;
      this.search();
    }
}
</script>