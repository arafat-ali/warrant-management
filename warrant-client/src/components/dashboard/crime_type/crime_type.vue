<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            অপরাধের ধরন সমূহ
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="h-96 overflow-auto">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                <table class="min-w-full">
                  <thead>
                      <tr class="">
                        <th class="px-6 py-3 border bg-gray-50 text-center text-sm leading-5 font-semibold">#</th>
                        <th class="px-6 py-3 border bg-gray-50 text-center text-sm leading-5 font-semibold">অপরাধের ধরন</th> 
                    </tr>
                  </thead>
                  <tbody class="text-sm">
                    <tr class="border-l border-r" v-for="(crimeCategory,index) in crimeCategories" :key="crimeCategory.id">
                      <td class="p-2 text-center border-b border-r  border-gray-200">{{index + 1}}</td>
                      <td class="p-2  text-center border-b  border-gray-200">{{ crimeCategory.name }} </td>
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
          this.crimeCategories = response.data.data;
          //console.log(this.crimeCategories);
        })
        .catch(error => {
          console.log(error)
        });
    }
}
</script>