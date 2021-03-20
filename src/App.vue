<template>
  <div id="app">
    <navbar/>
    <div style="height: 100%;">
       <router-view/>
    </div>
  </div>
</template>

<script>
import Navbar from "./components/Navbar"
export default {
  name: "App",
  components:{
    Navbar
  }
}
</script>
<style lang="scss">
@import "./assets/sass/general";

@font-face {
    font-family: Montserrat-Regular;
    src:url("./assets/fonts/Montserrat-Regular.ttf") format("truetype");
  }

#app {
  // font-family: Avenir, Helvetica, Arial, sans-serif;
  font-family: Montserrat-Regular;
  font-size: 13px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;

}


</style>
