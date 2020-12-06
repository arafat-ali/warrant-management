<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            অপরাধের ধরন
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="flex flex-col space-y-6">
                <table class="border">
                    <thead class="border text-xs">
                        <tr class="border">
                        <th class="border">ক্রমিক নং</th>
                        <th class="border">অপরাধের নাম</th>
                        

                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr class="border text-center" v-for="(crimeCategory,index) in crimeCategories" :key="crimeCategory.id">
                            <td class="border">{{index}}</td>
                            <td class="border">{{crimeCategory.name}}</td>
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

    name: 'crime-list',
    data () {
      return {
        crimeCategories:[]
      }
    },
    created(){
      axios
        .get('api/crime-categories')
        .then(response => {
          this.crimeCategories = response.data.CrimeCategories;
          //console.log(this.crimeCategories);
        })
        .catch(error => {
          console.log(error)
        });
    }
}
</script>