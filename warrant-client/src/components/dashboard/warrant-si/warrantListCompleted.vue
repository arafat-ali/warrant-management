<template>
  <div id="home">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full px-3">
        <p class="text-xl font-semibold mb-4">
           সকল ওয়ারেন্ট(তামিল)
        </p>
        <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0 ">
          <div class="flex flex-col space-y-6 ">
            <div>
              <div class="flex flex-row justify-start mb-2 ">
                <p class="font-bold">Total: {{ assignedWarrants.length }}</p>
              </div>
              <table class="border table-auto overscroll-hidden">
                <thead class="border text-xs ">
                  <tr class="border">
                    <th class="border">#</th>
                    <th v-for="field in fields" :key="field.id" class="border">{{ field.name }}</th>
                    
                    <!-- <th class="border">একশন</th> -->
                  </tr>
                </thead>
                <tbody class="text-xs">
                  <tr class="border text-center" v-for="(warrant, index) in assignedWarrants" :key="warrant.id">
                    <td class="border">{{ index+1 }}</td>
                    <td class="border">{{ warrant.process_number }}</td>
                    <td class="border">{{ warrant.gr_number }}</td>
                    <td class="border">{{ warrant.warrant_type }}</td>
                    <td class="border">{{ warrant.criminal_name }}</td>
                    <td class="border">{{ warrant.criminal_father_name }}</td>
                    <td class="border">{{ warrant.criminal_address }}</td>
                    <td class="border">{{ warrant.created_at | moment("dddd, MMMM Do YYYY") }}</td>
                    <td class="border">{{ warrant.execution_type }}</td>
                    <td class="border">{{ warrant.executed_at | moment("dddd, MMMM Do YYYY") }}</td>
                    <!-- <td class="border">{{ warrant.criminal_mobile_no }}</td> -->
                    <!-- <td class="border">{{ warrant.criminal_mobile_no }}</td> -->
                    <!-- <td class="border flex gap-2">
                      <button class="rounded-lg py-3 px-3 bg-blue-500 text-white">Details</button>
                    </td> -->
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
  name: "warrant-list-si",
  data() {
    return { 
      assignedWarrants: [],
      searchedWarrant: [],
      fields: [
        { id: "1", name: "প্রসেস নং", nameArr: "process_number" },
        { id: "2", name: "জিআর নম্বর", nameArr: "gr_number" },
        { id: "6", name: "ওয়ারেন্ট এর ধরণ", nameArr: "warrant_type" },
        { id: "10", name: "আসামির নাম", nameArr: "criminal_name" },
        { id: "11", name: "আসামির পিতার নাম", nameArr: "criminal_father_name" },
        { id: "12", name: "আসামির ঠিকানা", nameArr: "criminal_address" },
        { id: "12", name: "অ্যাসাইনের তারিখ", nameArr: "criminal_address" },
        { id: '17', name: "তামিলের ধরন"}, 
        { id: '17', name: "তামিলের তারিখ"},
        // { id: '17', name: "বিলম্ব"},
      ],
      selectedField: "",
      searchText: "",
      startDate: "",
      endDate: "",
    };
  },
  methods: {
    search(fieldName) {
      this.searchedWarrant = this.assignedWarrants;
      let searchArr = [];
      for (let i = 0; i < this.assignedWarrants.length; i++) {
        if (
          this.assignedWarrants[i][fieldName] &&
          this.assignedWarrants[i][fieldName].search(this.searchText) >= 0
        ) {
          searchArr.push(this.assignedWarrants[i]);
        }
      }
      this.searchedWarrant = searchArr;
      console.log(searchArr);
      console.log(this.searchText);
      console.log(fieldName);
      console.log(this.warrants);
    },
    getSiWarrants(){
      axios
      .get("api/get-completed-si-warrants")
      .then(response => {
        // console.log(response.data.data);
        this.assignedWarrants = response.data.data;
        
      })
      .catch(error => {
        alert(error);
      });
    },
    
 
  },
  created() {
    // store.dispatch("fetchThanaWarrants");
    // this.warrants = store.getters.getThanaWarrants;
    this.getSiWarrants();
    // this.makeSiWarrants();
    
  },
};
</script>
