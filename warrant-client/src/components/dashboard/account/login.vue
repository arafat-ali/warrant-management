<template>
	<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
		<div class="sm:mx-auto sm:w-full sm:max-w-md">
			<h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
				Sign in to your account
			</h2>
			
		</div>

		<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
			<div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
				<form @submit.prevent="login(user)">
					<div>
						<label for="email" class="block text-sm font-medium leading-5 text-gray-700">
							Email address
						</label>
						<div class="mt-1 rounded-md shadow-sm">
							<input id="email" v-model="user.email" type="email" required 
							class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
						</div>
					</div>

					<div class="mt-6">
						<label for="password" class="block text-sm font-medium leading-5 text-gray-700">
							Password
						</label>
						<div class="mt-1 rounded-md shadow-sm">
							<input id="password" v-model="user.password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
						</div>
					</div>

					

					<div class="mt-6">
						<span class="block w-full rounded-md shadow-sm">
							<button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
								Sign in
							</button>
						</span>
					</div>
				</form>

				
			</div>
		</div>
	</div>
</template>

<script>


	export default {
	   name: "login_comp",
	   data() {
			return {
				user: {
					email: 'ci@gmail.com',
					password: '123456',
					},
				isLoggedIn: false,
				role_id: ''
			}
		},
		methods: {
			login(user) {
				store.dispatch('login', user)
				.then(response => {
					store.dispatch('getCurrentUser')
					.then(resp => {
						this.role_id = store.getters.getCurrentUser.role_id;
						if(this.role_id==1){
							this.$router.push('/dashboard-ci')
						} else if(this.role_id==2){
							this.$router.push('/dashboard-sp')
						} else if(this.role_id==3){
							this.$router.push('/dashboard-dig')
						} else if(this.role_id==4){
							this.$router.push('/dashboard-oc')
						} else if(this.role_id==5){
							this.$router.push('/dashboard-si')
						} else this.$router.push('/dashboard')
					})
					.catch(err => {
					})
				})
				.catch(error => {
					// let errorMessage = error.response.data.message
					alert(error)
				})
			}
		},
	    components: {

	    },
	    mounted(){
			this.isLoggedIn = store.getters.getCurrentUser ? true : false;
	    	if(this.isLoggedIn){
				this.role_id = store.getters.getCurrentUser.role_id;
				if(this.role_id==1){
					this.$router.push('/dashboard-ci')
				} else if(this.role_id==2){
					this.$router.push('/dashboard-sp')
				} else if(this.role_id==3){
					this.$router.push('/dashboard-dig')
				} else if(this.role_id==4){
					this.$router.push('/dashboard-oc')
				} else if(this.role_id==5){
					this.$router.push('/dashboard-si')
				} else this.$router.push('/dashboard')
	    	}
	    }
	}
</script>

<style></style>
