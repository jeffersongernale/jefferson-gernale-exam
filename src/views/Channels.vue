<template>
     <div class="wrapper">
        <div class="circle_left"></div>
        <div class="circle_right"></div>
            <AddChannels/>
            <ChannelTable/>            
        <!-- <Footer/> -->
    </div>
</template>


<script>
import AddChannels from "../components/AddChannels"
import ChannelTable from "../components/ChannelTable"
export default {
    name : "Channels",
      components:{
        AddChannels,
        ChannelTable
    },
   
}
</script>

<style lang="scss">
@import "../assets/sass/general";
@import "../assets/sass/myanimations";
@import "../assets/sass/colors";




// Small devices (landscape phones, 576px and up)
@media (max-width: 575px) { 
    .left_panel, .right_panel{
        width: 100%;
    }
 }

@media (min-width: 576px) { 
.left_panel, .right_panel{
        width: 100%;
    }

 }

// Extra large devices (large desktops, 1200px and up)
@media (min-width: 1200px) {  
  .left_panel
  {
        width: 40%;
  } 
  .right_panel{
        width: 55%;
    }
}
</style>