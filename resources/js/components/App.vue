<template>
    <div>
        <h1>Mrkve su dobre za zečeve</h1>
        <test stuff="aaaaa"></test>
    </div>
</template>

<script>

    import Test from './Test'
    export default {
        name: "app",
        components: {
            Test
        },

    }

</script>

<style>
    #app {
        font-family: "Helvetica Neue", Arial, sans-serif;
        text-align: center;
        color: #2c3e50;
        margin-top: 0px;
    }
</style>
