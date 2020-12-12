<template>
  <div class="leading-normal tracking-normal" id="main-body">
    <div class="flex flex-wrap">

      <Sidebar />

      <div class="w-full bg-gray-100 pl-0 lg:pl-64 min-h-screen" :class="sideBarOpen ? 'overlay' : ''" id="main-content">

        <Navbar />

        <div class="p-6 bg-gray-100 mb-20">
        	<div id="main">
        		<registration />
        	</div>
          
        </div>

        <Footer />

      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import registration from "./account/registration";
import Sidebar from './dashboard_headr/sidebar'
import Navbar from './dashboard_headr/navbar'
import Footer from './dashboard_footr/footr'

export default {
  name: "Registration",
  computed: {
    ...mapState(['sideBarOpen'])
  },
  components: {
  	Sidebar,
  	Navbar,
  	Footer,
    registration,
  },
};
</script>

<style></style>
