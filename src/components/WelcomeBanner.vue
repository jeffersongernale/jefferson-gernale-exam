<template>
    <div class="wrapper">
        <div class="circle_left"></div>
         <div class="circle_right"></div>
        <img src="@/assets/images/basketball.svg" class="banner-image"/>

        <div class="welcome_text">
            <span class="welcome_text--headline">Watch the NBA, <br>Your Way.</span><br>
            <div class="welcome_text--subtext">Don’t miss a minute of the action with Full Game Highlights, ,<br>Top Performances and more from your favorite teams and players!</div>
            <br>
            <div class="welcome_text--social">
                <a href="https://twitter.com/nba" target="_blank">
                    <b-icon-twitter class="welcome_text--social_container"></b-icon-twitter> Twitter
                </a>
                <a href="https://www.facebook.com/nba" target="_blank">
                    <b-icon-facebook class="welcome_text--social_container"></b-icon-facebook> Facebook
                </a>
                <a href="https://watch.nba.com/streaming-subscriptions?cid=nba_leaguepass_youtube_socialheader&_branch_match_id=866207340333783700" target="_blank">
                    <b-icon-link class="welcome_text--social_container"></b-icon-link> NBA League Pass
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

    .circle_left, .circle_right {
        background-color:$white;
        height: 60vh;
        width: 60vh;
        border-radius: 100%;
        position: absolute;
        box-shadow: 0 4px 5px rgb(248, 248, 248);
    }

    // Small devices (landscape phones, 576px and up)
     @media (max-width: 575px) { 
        .circle_left {
            top: -50%; 
            left: -100%;
           
            animation: circle_left 1s;
            animation-fill-mode: forwards;
        }

        .circle_right {
            top: unset;
            bottom: 0%; 
            right: -100%;
            animation: circle_right 1s;
            animation-fill-mode: forwards;
        }

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
         .circle_left {
            top: -100%; 
            left: -100%;
            animation: circle_left 1s;
            animation-fill-mode: forwards;
        }

        .circle_right {
            top: 40%; 
            right: -100%;
            animation: circle_right 1s;
            animation-fill-mode: forwards;
        }

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
        .circle_left {
            top: -100%; 
            left: -100%;
            animation: circle_left 1s;
            animation-fill-mode: forwards;
        }

        .circle_right {
            bottom: -20%; 
            top: unset;
            right: -100%;
            animation: circle_right 1s;
            animation-fill-mode: forwards;
        }

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
        .circle_left {
            top: -100%; 
            left: -100%;
            animation: circle_left 1s;
            animation-fill-mode: forwards;
        }

        .circle_right {
            top: 40%; 
            right: -100%;
            animation: circle_right 1s;
            animation-fill-mode: forwards;
        }

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
        .circle_left {
            top: -100%; 
            left: -100%;
            animation: circle_left 1s;
            animation-fill-mode: forwards;
        }
        .circle_right {
            top: 40%; 
            right: -100%;
            animation: circle_right 1s;
            animation-fill-mode: forwards;
        }

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