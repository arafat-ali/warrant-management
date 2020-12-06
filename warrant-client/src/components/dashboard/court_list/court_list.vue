<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            পরোয়ানা ইস্যুকারি আদালত
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="flex flex-col space-y-6">
                <table class="border">
                    <thead class="border text-xs">
                        <tr class="border">
                        <th class="border">ক্রমিক নং</th>
                        <th class="border">আদালতের নাম</th>
                        

                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr class="border text-center" v-for="(court,index) in courts" :key="court.id">
                            <td class="border">{{index}}</td>
                            <td class="border">{{court.name}}</td>
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

    name: 'court-list',
    data () {
      return {
        courts:[]
      }
    },
    created(){
      axios
        .get('api/courts')
        .then(response => {
          this.courts = response.data.Court;
          //console.log(this.courts);
        })
        .catch(error => {
          console.log(error)
        });
    }
}
</script>