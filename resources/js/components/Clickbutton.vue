<template>
    <div class="clickbuttonbox">
        <button style="flex: 1" v-text="myValue" v-on:click="$emit('')">button</button>
    </div>
</template>

<script>
    export default {
        name: "Clickbutton",


        data(){
            return{}
        },

        computed:{
            myValue(){
                return this.$parent.value;
            }
        },
    }

</script>

<style scoped>

    .clickbuttonbox{
        display: inline-flex;
        height: 100%;
        width: 70%;
    }

</style>
