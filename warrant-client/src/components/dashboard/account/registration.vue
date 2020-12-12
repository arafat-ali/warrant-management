<template>
	<div id = "home">
		<div class="w-full">
			<div class="bg-white py-8 px-6 shadow sm:rounded-lg sm:px-10">
				<form @submit.prevent="register()">
					<div class="flex flex-col xl:flex-row xl:justify-center xl:gap-4 xl:mb-4">
						<div class="mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">নাম</label> 
							<input type="text" v-model="nameBangla" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Name"> 
						</div>
						<div class="mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">নাম(ইংরেজি)</label> 
							<input type="text" v-model="name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Name(English)">
						</div> 
					</div>
					<div class="flex flex-col xl:flex-row xl:justify-center xl:gap-4 xl:mb-4">
						<div class="mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">ই-মেইল</label> 
							<input type="email" v-model="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Email">
						</div>
						<div class="mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">পাসওয়ার্ড</label> 
							<input type="password" v-model="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Password">
						</div>
					</div>
					<div class="flex flex-col xl:flex-row xl:justify-center xl:gap-4 xl:mb-4">
						<div class="mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">বিপি নং</label>
							<input type="number" v-model="bp" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="BP no.">
						</div>
						<div class="mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">মোবাইল নং </label>
							<input type="number" v-model="mobile" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Mobile no.">
						</div>
						
					</div>
					<div class="flex flex-col xl:flex-row xl:justify-center xl:gap-4 xl:mb-4">
						<div class="mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">লিঙ্গ</label> 
							<select name="" id="" v-model="gender" required class="w-full xl:w-52 px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
								<option value="">--নির্বাচন করুন--</option>
								<option value="1">পুরুষ</option>
								<option value="2">মহিলা </option>
							</select>
						</div>
						<div class="mb-4 xl:mb-0"> 
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">জেলা</label> 
							<select name="" id="" v-model="district" required class="w-full xl:w-52 px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
								<option value="">--নির্বাচন করুন--</option>
								<option value="1">ঢাকা</option>
								<option value="2">চট্রগ্রাম</option> 
								<option value="2">কুমিল্লা</option>
								<option value="2">রাজশাহী</option>
							</select>
						</div>
					</div>
					<div class="flex flex-col xl:flex-row xl:justify-center xl:gap-4 xl:mb-4">
						<div class="mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">থানা</label> 
							<select name="" id="" v-model="thana" required class="w-full xl:w-52 px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
								<option value="">--নির্বাচন করুন--</option>
								<option value="1">পটিয়া</option>
								<option value="2">সাতকানিয়া</option>
							</select>
						</div>
						<div class="mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">পদবি</label> 
							<select name="" id="" v-model="designation" required class="w-full xl:w-52 px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
								<option value="">--নির্বাচন করুন--</option>
								<option v-for="rank in rank_arr" :value="rank.id">{{rank.name}}</option>
							</select>
						</div>
					</div>
					<div class="flex flex-col xl:flex-row xl:justify-center xl:mb-4">
						<div class="w-full xl:w-96 mb-4 xl:mb-0">
							<label for="" class="block text-sm font-medium leading-5 text-gray-700">আউটপোস্ট</label> 
							<input type="text" v-model="outpost" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Outpost">
						</div>
						
					</div>
					<div class="flex flex-col xl:flex-row xl:justify-center xl:mb-4">
						<span class="block w-full xl:w-96 rounded-md shadow-sm">
							<button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
								Sign up
							</button>
						</span>
						<!-- <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
							Or
							<a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
								Login
							</a>
						</p> -->
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<script>


	export default {
	   name: "registration",
	   data() {
			return {
				nameBangla: '',
				name: '',
				email: '',
				password: '',
				bp: '',
				mobile: '',
				gender: '',
				district: '',
				thana: '',
				designation: '',
				outpost: '',
				rank_OC:'',
				rank_SP:'',
				rank_dig:'',
				role_id: '',
				rank_arr: []
			}
		},
		methods: {
			register() {
				let data = new FormData();
				data.append('name_bangla', this.nameBangla);
				data.append('name', this.name);
				data.append('email', this.email);
				data.append('password', this.password);
				data.append('bp', this.bp);
				data.append('mobile', this.mobile);
				data.append('gender', this.gender);
				data.append('district', this.district);
				data.append('thana', this.thana);
				data.append('role_id', this.designation);
				data.append('outpost', this.outpost);
				axios
				.post('api/registration', data)
				.then(response => {
					console.log(response.data.Message);
					alert('Registration Successful');
				})
				.catch(response => {
					alert(response)
				});

			}
		},
		created(){
			this.role_id = store.getters.getCurrentUser.role_id;
			console.log(this.role_id);
			if(this.role_id == 4){
				this.rank_arr = [{id:5, name:'SI'},{id:6, name:'ASI'}]
			}
			else if(this.role_id == 2){
				this.rank_arr = [{id:1, name:'CI'},{id:4, name:'OC'}]
			}
			else if(this.role_id == 3){
				this.rank_arr = [{id:2, name:'SP'}]
			}
		}
		
	}
</script>

<style></style>
