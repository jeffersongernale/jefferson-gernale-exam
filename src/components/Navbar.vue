<template>
<div>
    <div class="top_line"></div>
    <div id="nav">
        <div class="nav__links">
            <router-link to="/"><b-icon-house></b-icon-house> HOME</router-link>
            <router-link to="/channels"><b-icon-info-circle></b-icon-info-circle> CHANNELS</router-link>
        </div>
      
    </div>
     
</div>
</template>

<script>
export default {
    name: "Navbar"
}
</script>

<style lang="scss" scoped>
    @import "../assets/sass/colors";
    @font-face {
        font-family: Montserrat-Bold;
        src:url("../assets/fonts/Montserrat-Bold.ttf") format("truetype");
    }
    #nav {
    padding: 15px;
    text-align: right;
    transition: 1s ease-in;
    position: absolute;
    width: 100vw;
    // background-color: #fff;
    z-index: 999;
    // box-shadow: 0 2px 4px rgb(233, 233, 233);
        a {
            color: $inactive-link;
            margin: 5px;
            text-decoration: none;
            &.router-link-exact-active {
            color: $inactive-link;
            font-family: Montserrat-Bold;   
        
            }

            &:hover{
                text-decoration: none;
                font-weight: 600;
                // transition: 0.5s ease;
                border-bottom: 2px solid $primary-color;
            }
        }
        .nav__image{
            width: 50px;
            height: 25px;
        }

        .nav__brand
        {
            float: left;
        }

        .nav__links
        {
            float: right;
            margin-right: 35px;
        }

        
    }
    .top_line {
            background-color: $primary-color;
            height: 3px;
            position: relative;
            z-index: 999;
            width: 0%;
            animation: line-slide 1.5s;
            animation-fill-mode: forwards;
    }

    @keyframes line-slide {
        from{
            width: 0%;
        }
        to {
            width: 100%;
        }
    }
</style>