<template>
    <div id="home">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <p class="text-xl font-semibold mb-4">
            রিপোর্ট
          </p>
          <div class="w-full bg-white border rounded-lg p-8 mb-8 xl:mb-0">
            <div class="w-full flex justify-end mb-2">
              <select v-model="warrant_type" class="py-2 text-sm rounded-md pl-6 pr-6 border focus:outline-none focus:ring-1 focus:ring-gray-400 focus:text-gray-500">
                <option value="জিআর সাজা">জিআর সাজা</option>
                <option value="জিআর গ্রেফতার">জিআর গ্রেফতার</option>
                <option value="সিআর সাজা">সিআর সাজা</option>
                <option value="সিআর গ্রেফতার">সিআর গ্রেফতার</option>
               </select>
            </div>
            <div class="h-96 overflow-auto">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg border-b">
                <table class="min-w-full">
                  <thead>
                    <tr class="text-xs">
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">#</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মোট ওয়ারেন্ট</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">মূলতবি ওয়ারেন্ট</th>
                      <th class="px-2 py-2 border bg-gray-50 text-center text-xs leading-2 tracking-tighter font-semibold">তামিল ওয়ারেন্ট</th>

                    </tr>
                  </thead>
                  <tbody class="text-sm text-center">
                    <tr class="border-l border-r">
                      <td class="p-2 border border-gray-200">1</td>
                      <td v-if="warrant_type=='জিআর সাজা'" class="p-2 border border-gray-200">{{data.GR_Saja_Total}}</td>
                      <td v-if="warrant_type=='জিআর সাজা'" class="p-2 border border-gray-200">{{data.GR_Saja_executed}}</td>
                      <td v-if="warrant_type=='জিআর সাজা'" class="p-2 border border-gray-200">{{data.GR_Saja_unexecuted}}</td>
                      <td v-if="warrant_type=='জিআর গ্রেফতার'" class="p-2 border border-gray-200">{{data.GR_Greftar_Total}}</td>
                      <td v-if="warrant_type=='জিআর গ্রেফতার'" class="p-2 border border-gray-200">{{data.GR_Greftar_executed}}</td>
                      <td v-if="warrant_type=='জিআর গ্রেফতার'" class="p-2 border border-gray-200">{{data.GR_Greftar_unexecuted}}</td>
                      <td v-if="warrant_type=='সিআর সাজা'" class="p-2 border border-gray-200">{{data.CR_Saja_Total}}</td>
                      <td v-if="warrant_type=='সিআর সাজা'" class="p-2 border border-gray-200">{{data.CR_Saja_executed}}</td>
                      <td v-if="warrant_type=='সিআর সাজা'" class="p-2 border border-gray-200">{{data.CR_Saja_unexecuted}}</td>
                      <td v-if="warrant_type=='সিআর গ্রেফতার'" class="p-2 border border-gray-200">{{data.CR_Greftar_Total}}</td>
                      <td v-if="warrant_type=='সিআর গ্রেফতার'" class="p-2 border border-gray-200">{{data.CR_Greftar_executed}}</td>
                      <td v-if="warrant_type=='সিআর গ্রেফতার'" class="p-2 border border-gray-200">{{data.CR_Greftar_unexecuted}}</td>
                      
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
        warrant_type: 'জিআর সাজা'
      }
    },
    methods:{
     
    },
    computed:{
      
    },
    created(){
      axios
      .get('api/show-report')
      .then(response => {
        this.data = response.data.data;
      })
      .catch(error => {
        console.log(error)
      });
      
    }
}
</script>