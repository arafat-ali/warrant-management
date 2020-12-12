<template>
  <div id="home">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full px-3">
        <p class="text-xl font-semibold mb-4">
          ওয়ারেন্ট লিস্ট (মুলতবি)
        </p>
        <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0 ">
          <div class="flex flex-col space-y-6 ">
            <div class="h-20 flex flex-col lg:flex-row justify-start">
              <div class="px-6">
                <label for="">সার্চ</label>
                <select
                  v-model="selectedField"
                  class="select"
                  @change="searchText = '', searchedWarrant = warrants"
                >
                  <option value="" selected>--নির্বাচন করুন--</option>
                  <option
                    v-for="field in fields"
                    :key="field.id"
                    :value="field"
                    >{{ field.name }}</option
                  >
                </select>
              </div>
              <!-- After Selection Start -->
              <div class="px-6" v-if="selectedField">
                <!-- Date Range Start-->
                <div
                  v-if="selectedField.id == 4 || selectedField.id == 8"
                  class="flex gap-2"
                >
                  <div>
                    <label for="">থেকে</label>
                    <input
                      type="date"
                      class="input"
                      v-model="startDate"
                      :placeholder="selectedField.name"
                    />
                  </div>
                  <div>
                    <label for="">পর্যন্ত</label>
                    <input
                      type="date"
                      class="input"
                      v-model="endDate"
                      :placeholder="selectedField.name"
                    />
                  </div>
                  <div>
                    <button
                      class="bg-blue-500 p-3 mt-4 rounded-lg text-white"
                      @click="getData()"
                    >
                      Search
                    </button>
                  </div>
                </div>
                <!-- Date Range End -->

                <div class="" v-else-if="selectedField.id == 7">
                  <label for="">{{ selectedField.name }}</label>
                  <select
                    v-model="searchText"
                    class="select"
                    @change="search(selectedField.nameArr)"
                  >
                    <option value="" selected>--নির্বাচন করুন--</option>
                    <option
                      v-for="court in courts"
                      :key="court.id"
                      :value="court.name"
                      >{{ court.name }}</option
                    >
                  </select>
                </div>
                <div class="" v-else-if="selectedField.id == 5">
                  <label for="">{{ selectedField.name }}</label>
                  <select
                    v-model="searchText"
                    class="select"
                    @change="search(selectedField.nameArr)"
                  >
                    <option value="" selected>--নির্বাচন করুন--</option>
                    <!-- <option value="সাতকানিয়া থানা">সাতকানিয়া থানা</option> -->
                    <option
                      v-for="thana in thanas"
                      :key="thana.id"
                      :value="thana.name"
                      >{{ thana.name }}</option
                    >
                  </select>
                </div>
                <div class="" v-else-if="selectedField.id == 6">
                  <label for="">{{ selectedField.name }}</label>
                  <select
                    v-model="searchText"
                    class="select"
                    @change="search(selectedField.nameArr)"
                  >
                    <option value="" selected>--নির্বাচন করুন--</option>
                    <option value="সিআর পরোয়ানা">সিআর পরোয়ানা</option>
                    <option value="সিআর গ্রেফতার">সিআর গ্রেফতার</option>
                    <option value="জিআর পরোয়ানা">জিআর পরোয়ানা</option>
                    <option value="জিআর গ্রেফতার">জিআর গ্রেফতার</option>
                  </select>
                </div>

                <div v-else>
                  <label for="">{{ selectedField.name }}</label>
                  <input
                    type="text"
                    class="input"
                    v-model="searchText"
                    :placeholder="selectedField.name"
                    @keyup="search(selectedField.nameArr)"
                  />
                </div>
              </div>
              <!-- After Selection End -->
            </div>

            <div>
              <div class="flex flex-row justify-end mb-2 ">
                <p class="font-bold">Total: {{ searchedWarrant.length }}</p>
              </div>
              <table class="border overscroll-scroll">
                <thead class="border text-xs ">
                  <tr class="border">
                    <th class="border">#</th>
                    <th v-for="field in fields" :key="field.id" class="border">
                      {{ field.name }}
                    </th>
                    <th class="border">স্ট্যাটাস</th>
                  </tr>
                </thead>
                <tbody class="text-xs">
                  <tr
                    class="border text-center"
                    v-for="(warrant, index) in searchedWarrant"
                    :key="warrant.id"
                  >
                    <td class="border">{{ index }}</td>
                    <td class="border">{{ warrant.process_number }}</td>
                    <td class="border">{{ warrant.gr_number }}</td>
                    <td class="border">{{ warrant.other_number }}</td>
                    <td class="border"> {{ warrant.send_date }}</td>
                    <td class="border">{{ warrant.thana_name }}</td>
                    <td class="border">{{ warrant.warrant_type }}</td>
                    <td class="border">{{ warrant.court_name }}</td>
                    <td class="border">
                      {{ warrant.arrest_warrant_received_to_thana }}
                    </td>
                    <!-- <td class="border w-4">{{warrant.case_section_and_date}}</td> -->
                    <!-- <td class="border">{{warrant.arrest_criminal_to_court}}</td> -->
                    <td class="border">{{ warrant.criminal_name }}</td>
                    <td class="border">{{ warrant.criminal_father_name }}</td>
                    <td class="border">{{ warrant.criminal_address }}</td>
                    <td class="border">{{ warrant.criminal_mobile_no }}</td>
                    <td class="border">{{ warrant.criminal_NID }}</td>
                    <td class="border">{{ warrant.birth_cirtificate }}</td>
                    <td class="border">
                      <div
                        class="rounded-full py-1 px-3 bg-yellow-500 text-white"
                        v-if="warrant.is_executed == 0"
                      >
                        Pending
                      </div>
                      <div
                        class="rounded-full py-1 px-3 bg-green-500 text-white"
                        v-if="warrant.is_executed == 1"
                      >
                        Executed
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- <div class="border flex flex-col overflow-scroll overscroll-none h-96" style="width: 62rem">
                  <div class="flex flex-row justify-between">
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm font-bold">#</div>
                    <div class="border-r border-b w-full text-center py-2 px-3 text-sm font-bold" v-for="field in fields" :key="field.id" >
                      {{field.name}}
                      </div>
                    
                  </div> 
                    <div class="flex flex-row justify-between" v-for="(warrant, index) in searchedWarrant" :key="warrant.id">
                      <div class="border-r border-b w-42 text-center py-2 px-3 text-sm">{{ index }}</div>
                      <div class="border-r border-b  text-center py-2 px-3 text-sm">{{ warrant.process_number }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.gr_number }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.other_number }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm"> {{ warrant.send_date }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.thana_name }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.warrant_type }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.court_name }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">
                        {{ warrant.arrest_warrant_received_to_thana }}
                      </div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{warrant.case_section_and_date}}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.criminal_name }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.criminal_father_name }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.criminal_address }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.criminal_mobile_no }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.criminal_NID }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">{{ warrant.birth_cirtificate }}</div>
                      <div class="border-r border-b w-full text-center py-2 px-3 text-sm">
                      <div class="rounded-full py-1 px-3 bg-yellow-500 text-white" v-if="warrant.is_executed == 0" >
                        Pending
                      </div>
                     
                    </div>
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
  name: "warrant-list-sp",
  data() {
    return {
      warrants: [],
      searchedWarrant: [],
      fields: [
        { id: "1", name: "প্রসেস নং", nameArr: "process_number" },
        { id: "2", name: "জিআর নম্বর", nameArr: "gr_number" },
        { id: "3", name: "অন্যান্য আদালতের নাম্বার", nameArr: "other_number" },
        { id: "4", name: "কোর্ট হতে প্রেরণের তারিখ", nameArr: "send_date" },
        { id: "5", name: "থানা", nameArr: "thana_name" },
        { id: "6", name: "অপরাধের ধরন", nameArr: "warrant_type" },
        { id: "7", name: "ইস্যুকারি আদালত", nameArr: "court_name" },
        { id: "8",name: "থানায় রিসিভের তারিখ", nameArr: "arrest_warrant_received_to_thana",},
        // { id: "9",name: "মামলার ধারা ও তারিখ", nameArr: "case_section_and_date",},
        // { id: '9', name:'আদালতে হাজিরের তারিখ', nameArr: 'arrest_criminal_to_court'},
        { id: "10", name: "আসামির নাম", nameArr: "criminal_name" },
        { id: "11", name: "আসামির পিতার নাম", nameArr: "criminal_father_name" },
        { id: "12", name: "আসামির ঠিকানা", nameArr: "criminal_address" },
        { id: "13", name: "মোবাইল নং", nameArr: "criminal_mobile_no" },
        { id: "14", name: "আসামির এনআইডি", nameArr: "criminal_NID" },
        { id: "15", name: "আসামির জন্ম নিবন্ধন", nameArr: "birth_cirtificate" },
      ],
      courts: [],
      thanas: [],
      selectedField: "",
      searchText: "",
      courtID: "",
      startDate: "",
      endDate: "",
    };
  },
  methods: {
    search(fieldName) {
      this.searchedWarrant = this.warrants;
      let searchArr = [];
      for (let i = 0; i < this.warrants.length; i++) {
        if (
          this.warrants[i][fieldName] &&
          this.warrants[i][fieldName].search(this.searchText) >= 0
        ) {
          searchArr.push(this.warrants[i]);
        }
      }
      this.searchedWarrant = searchArr;
      console.log(searchArr);
      console.log(this.searchText);
      console.log(fieldName);
      console.log(this.warrants);
    },
    pendingWarrantCreate(data) {
      let pendingWarrants = [];
      for (let i = 0; i < data.length; i++) {
        if (data[i].is_executed === 0) {
          pendingWarrants.push(data[i]);
        }
      }
      return pendingWarrants;
    },
    getData() {
      console.log(this.startDate);
      console.log(this.endDate);
      axios
        .get(
          "api/get-thana-data-by-date/" +
            this.selectedField.nameArr +
            "/" +
            this.startDate +
            "/" +
            this.endDate
        )
        .then((response) => {
          console.log(response);
          this.searchedWarrant = response.data.warrants;
          //alert('');
        })
        .catch((response) => {
          alert(response);
        });
    },
    getCourt() {
      axios
        .get("api/courts")
        .then((response) => {
          this.courts = response.data.Court;
          //console.log(this.courts);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getThana() {
      axios
        .get("api/thanas")
        .then((response) => {
          this.thanas = response.data.Thana;
          // console.log(this.thanas);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    store.dispatch("fetchThanaWarrants");
    this.warrants = this.pendingWarrantCreate(store.getters.getThanaWarrants);
    this.searchedWarrant = this.warrants;
    this.getCourt();
    this.getThana();
  },
};
</script>
