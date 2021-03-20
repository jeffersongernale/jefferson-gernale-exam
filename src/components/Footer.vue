<template>
    <div class="wrapper">
        <!-- <img src="@/assets/images/nba.png" alt="nba logo" class="nba_logo"> -->
        Codalify Technical Exam © 2021
    </div>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style lang="scss" scoped>
    @import "../assets/sass/colors";
    .wrapper{
        position: absolute;
        bottom: 0;
        padding: 3px;
        width: 100%;
        height: 20px;
        background-color: $darker-blue;
        color: $white;
        font-size: 10px;
           .nba_logo{
                height: 80px;
                position: relative;
                top: -150%;
            }
        }
</style>