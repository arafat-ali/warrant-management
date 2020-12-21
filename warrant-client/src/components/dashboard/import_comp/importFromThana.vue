<template>

	<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-1 sm:px-0">



          <!-- <div class="border-4 border-dashed border-gray-200 rounded-lg h-96"> -->

          <div class="mt-2 sm:mt-0 sm:col-span-2">
            <div class="max-w-4xl mx-auto flex justify-center mt-12 px-12 pt-24 pb-24 border-2 border-gray-300 border-dashed rounded-md" @dragover="dragover" @dragleave="dragleave" @drop="drop">
              <div class="text-center">
              	<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                  <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
				  
			    <input type="file" multiple name="fields[assetsFieldHandle][]" id="assetsFieldHandle" 
			      class="w-px h-px opacity-0 overflow-hidden absolute" @change="onChange" ref="file" accept=".csv" />
				  
			    <label for="assetsFieldHandle" class="block cursor-pointer">
			      <div>
			        Drag and drop 
			        or <span class="underline">Upload a file</span><br>
			      </div>
			    </label>
			    <ul class="mt-4" v-if="this.filelist.length" v-cloak>
			      <li class="text-sm p-1" v-for="file in filelist">
			        {{ file.name }}<button type="button" @click="remove(filelist.indexOf(file))" title="Remove file" class="ml-10">x</button>
			      </li>
			    </ul>
              </div>
            </div>
            <button @click="formSubmit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow mr-40 px-10 mb-6 float-right">
			  Add
			</button>
          </div>

    	</div>

    </div>
</template>



<script>
	export default{
		data(){
			return {
				csv:'',
				success:false,
				filelist: [],
			}
		},
		methods: {
			formSubmit(e) {
				this.showAlert('Saving...', 'info');
	            e.preventDefault();
	            const config = {
	                headers: { 'content-type': 'multipart/form-data' }
	            }
	    
	            let formData = new FormData();
	            formData.append('csv', this.csv);
	            
	            axios
					.post('api/import-from-thana', formData, config)
					.then(response => {
						this.success = true;
						this.showAlert('Successfully imported', 'success');
					})
					.catch(response => {
					});

	        },
	        closeAlertBar(){
	        	this.success = false
	        },

	        //Drag and drop
		    onChange() {
		      this.filelist = [...this.$refs.file.files];
		      this.csv = this.filelist[0];
		      console.log(this.csv);
		    },
		    remove(i) {
		      this.filelist.splice(i, 1);
		    },
		    dragover(event) {
		      event.preventDefault();
		      // Add some visual fluff to show the user can drop its files
		      if (!event.currentTarget.classList.contains('bg-green-300')) {
		        event.currentTarget.classList.remove('bg-gray-100');
		        event.currentTarget.classList.add('bg-green-300');
		      }
		    },
		    dragleave(event) {
		      // Clean up
		      event.currentTarget.classList.add('bg-gray-100');
		      event.currentTarget.classList.remove('bg-green-300');
		    },
		    drop(event) {
		      event.preventDefault();
		      this.$refs.file.files = event.dataTransfer.files;
		      this.onChange(); // Trigger the onChange event manually
		      // Clean up
		      event.currentTarget.classList.add('bg-gray-100');
		      event.currentTarget.classList.remove('bg-green-300');
			},
			showAlert(title, icon) {
				// Use sweetalert2
				this.$swal({
					title: title,
					icon: icon
				});
			},

		},
		

	}
</script>

<style>
	
</style>