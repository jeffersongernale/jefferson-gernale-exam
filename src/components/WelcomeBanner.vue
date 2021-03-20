<template>
    <div class="wrapper">
        <div class="circle_left"></div>
         <div class="circle_right"></div>
        <img src="@/assets/images/ytillus.svg" class="banner-image"/>

        <div class="welcome_text">
            <span class="welcome_text--headline">Youtube Information<br>Getter</span><br>
            <div class="welcome_text--subtext">Don't miss any updates and videos of different youtube channels.</div>
            <br>
            <div class="welcome_text--social">
                <a href="https://youtube.com/" target="_blank">
                    <b-icon-youtube class="welcome_text--social_container"></b-icon-youtube> Youtube
                </a>
            </div>
        </div>
        <Footer/>
    </div>
</template>

<script>
import Footer from "./Footer"
export default {
    name: "WelcomeBanner",
    components:{
        Footer
    }
}
</script>

<style lang="scss" scoped>
    @import "../assets/sass/colors";
    @import "../assets/sass/myanimations";
    @import "../assets/sass/general";
    .black {
        color: $black;
    }
    
    .welcome_text {
        color: $black;
        position: absolute;
        top: 30%;
        right: -100%;
        text-align: center;
    
            &--headline {
                font-size: 50px;
                line-height: 50px;
                position: relative;
                right: -150%;
                animation: slideToLeft 1s;
                animation-fill-mode: forwards;
            }
            &--subtext {
                font-size: 15px;
                color: $gray;
                margin-top: 20px;
                opacity: 0;
                animation: fadeIn 1s;
                animation-fill-mode: forwards;
            }
            &--social {
                a, a:hover {
                    color: $black;
                    text-decoration: none;
                    margin: 5px;
                    opacity: 0;
                    animation: fadeIn 1s;
                    animation-fill-mode: forwards;
                }
                
                &_container{
                    background-color: $inactive-link;
                    width: 20px;
                    height: 20px;
                    padding: 4px;
                    border-radius: 50%;
                    color: $white
                }
            }
    }

    .banner-image{
        opacity: 0;
        animation: fadeIn 1s;
        animation-fill-mode: forwards;
    }

    // Small devices (landscape phones, 576px and up)
     @media (max-width: 575px) { 
        .banner-image{
            width: 70%;
            position: absolute;
            left: 20%;
            top: 10%;
        }

        .welcome_text {
            top: unset;
            right: unset;
            bottom: 10%;
            left: 5%;
        }
     }

    @media (min-width: 576px) { 
       .banner-image{
            width: 60%;
            height: 50vh;
            position: absolute;
            left: 20%;
            right: 20%;
            top: 4%;
            bottom: 10%;
        }

        .welcome_text{
            top: unset;
            right: unset;
            bottom: 10%;
            left: 8%;
            right: 8%;
        }
     }

    // Medium devices (tablets, 768px and up)
    @media (min-width: 768px) {  


        .banner-image{
            width: 45%;
            height: 50vh;
            position: absolute;
            left: 30%;
            right: 30%;
            top: 4%;
            bottom: 10%;
        }

        .welcome_text{
            top: 50%;
            right: 10%;
            left: 10%;
            right: 5%;
        }
    }

    // Large devices (desktops, 992px and up)
    @media (min-width: 992px) { 


        .banner-image{
            width: 50%;
            height: 50vh;
            position: absolute;
            left: 30%;
            right: 30%;
        }

        .welcome_text{
            top: 60%;
            right: 10%;
            left: 10%;
            right: 5%;
        }
     }

    // Extra large devices (large desktops, 1200px and up)
    @media (min-width: 1200px) {  


         .banner-image{
            width: 45%;
            height: unset;
            position: absolute;
            left: 10%;
            right: unset;
        }

        .welcome_text{
            top: 25%;
            left: unset;
            right: 5%;
        }
    }

 
</style>