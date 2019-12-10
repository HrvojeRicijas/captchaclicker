<template>

        <div class="autobox">
            <div class="buttonbox">
                <button class="buybutton" v-on:click="buy()" :disabled="cash<price" v-text="amount">
                </button>
                <button class="upgradebutton" v-on:click="upgrade()"  v-text="upgradeprice">
                </button>
            </div>
                <label class="statsbox">Price: {{price}}</label>
                <label class="statsbox">Production: {{production}}</label>
        </div>

</template>

<script>
    export default {
        name: "auto",

        props: [
            'autoid',
            'cash',
            'amount',
            'price',
            'production',
            'upgradeprice',

        ],

        data(){
            return {}
        },

        mounted() {
            if (this.lastValue) {
                this.value = this.lastValue
            }
        },

        methods:{
            buy() {
                if (this.cash>=this.price){
                    this.$emit('clickedAuto', this.autoid);
                }
            },

            upgrade() {
                if (this.cash>=this.upgradeprice){
                    this.$emit('upgradedAuto', this.autoid);
                }
            },

        },
    }
</script>

<style scoped>

    .autobox{
        flex: 1;
        display:inline-flex;
        flex-direction: column;
    }

    .buttonbox{
        flex: 1;
        display:inline-flex;
        flex-direction: row;
    }

    .buybutton{
        height: 100%;
        width: 75%;
    }

    .upgradebutton{
        height: 100%;
        width: 25%;
    }


    .statsbox{
        text-align: left;
        margin-left: 2px;
        margin-bottom: 0px
        /*margin: 0;*/
    }


</style>
