<template>
     <div class="wrapper">
        <div class="circle_left"></div>
        <div class="circle_right"></div>

            <div class="left_panel">
                <div class="left_panel__card">
                    <div class="left_panel__card-title">
                        Input Channel
                    </div>
                    <img src="@/assets/images/videographer.svg" class="left_panel__card-image"/>
                    <div class="left_panel__card-body">
                        Check the latest videos to your favorite channels by registering them to our website.
                        <br>
                        <br>
                        <form style="line-height: 30px;">
                            <label class="mb-4"><b>Register Channel ID: </b></label>
                            <input type="text" class="form-inputs" placeholder="Input text here..."> <br>
                            <button class="btn-primary" style="margin-top: 20px; width: 50%;">Submit</button>
                        </form>
                    </div>
                   
                </div>
            </div>
            <div class="right_panel"></div>
           
   
 

           
            
        <!-- <Footer/> -->
    </div>
</template>


<script>
import Footer from "../components/Footer"
export default {
    name : "Channels",
      components:{
        Footer
    }
}
</script>

<style lang="scss">
@import "../assets/sass/general";
@import "../assets/sass/myanimations";
@import "../assets/sass/colors";


.left_panel{
    padding: 10px;
    text-align: center;
    // border: solid 3px red;
    float: left;
    width: 40%;
    position: relative;

    &__card {
        margin: 0 auto;
        background-color: $white;
        width: 20rem;
        border-radius: 10px;
        box-shadow: 0 2px 4px $light-grey;
        padding-bottom: 20px;

        &-image{
            width: 90%;
        }
        &-title{
            background-color: $inactive-link;
            color: $white;
            padding: 10px;
            border-radius: 10px 10px 0px 0px;
            margin-bottom: 10px;
        }
        &-body{
            color: $gray;
            padding: 20px;
        }

    }
}

.right_panel{
    padding: 10px;
    text-align: center;
    border: solid 3px blue;
    float: right;
    width: 55%;
}


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

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) {  
   
    
}

// Large devices (desktops, 992px and up)
@media (min-width: 992px) { 


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