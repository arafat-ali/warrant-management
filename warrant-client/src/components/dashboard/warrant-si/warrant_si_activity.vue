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
                <p class="font-bold">Total:</p>
              </div>
              <table class="border table-auto overscroll-hidden">
                <thead class="border text-xs ">
                  <tr class="border">
                    <th class="border">#</th>
                    <th class="border">Relative name</th>
                    <th class="border">Relative Address</th>
                    <th class="border">Relative Contact No</th>
                    <th class="border">Description</th>
                    <th class="border">Date</th>
                  </tr>
                </thead>
                <tbody class="text-xs">
                  <tr class="border text-center" v-for="(activity,index) in activities">
                    <td class="border">{{index+1}}</td>
                    <td class="border">{{activity.relative_name}}</td>
                    <td class="border">{{activity.relative_address}}</td>
                    <td class="border">{{activity.relative_contact_no}}</td>
                    <td class="border">{{activity.description}}</td>
                    <td class="border">{{activity.created_at | moment("dddd, MMMM Do YYYY")}}</td>
                    
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
  name: "warrant-activity",
  data() {
    return { 
      activities: []
    };
  },
  methods: {
  
 
  },
  created() {
    axios
      .get('api/view-activity/'+this.$route.params.id)
      .then(response => {
        this.activities = response.data.Activities;
      })
      .catch(error => {
        console.log(error)
      });
  },
};
</script>
