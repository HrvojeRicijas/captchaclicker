<template>
    <div class="gamebox">
        <div class="clickbuttonbox">
            <button style="flex: 1" v-on:click="buttonIsClicked"  v-text="Math.floor(this.value)"></button>
        </div>
        <div class="autos">
            <Auto
                v-for="anAuto in autos" :key="autos.id"
                :production="autopower[anAuto]*autoamounts[anAuto]"
                :autoid="anAuto"
                :cash="value"
                :amount="autoamounts[anAuto]"
                :price="Math.floor(autoprice[anAuto] * Math.pow(priceIncrease, autoamounts[anAuto]))"
                :upgradeprice="upgradeprice[anAuto] * Math.pow(upgradeIncrease, upgradeamount[anAuto])"
                v-on:clickedAuto="buyAuto"
                v-on:upgradedAuto="upgradeAuto"
            > </Auto>
        </div>
        <button v-on:click="start">start</button>
    </div>
</template>

<script>
    import Auto from "./Auto";
    export default {
        name: "game",

        components: {
            Auto
        },

        data () {
            return {
                autos: [0, 1, 2, 3, 4],
                autoamounts: [0, 0, 0, 0, 0],
                autopower: [1, 5, 20, 100, 500],
                autoprice: [10, 100, 500, 3000, 10000],
                upgradeamount: [0, 0, 0, 0, 0],
                upgradeprice:[500, 5000, 25000, 100000, 1000000],
                value: 0,
                priceIncrease: 1.1,
                upgradeIncrease: 3,
                interval: 100,
            }
        },

        mounted() {
            this.start()
        },


        methods: {
            buyAuto (autoid){
                this.value = Math.floor( this.value - this.autoprice[autoid] * Math.pow(this.priceIncrease, this.autoamounts[autoid]));
                this.autoamounts[autoid]++;
            },

            upgradeAuto (autoid) {
                this.value = Math.floor(this.value - this.upgradeprice[autoid] * Math.pow(this.upgradeIncrease, this.upgradeamount[autoid]));
                this.upgradeamount[autoid]++;
                this.autopower[autoid] += this.autopower[autoid];
            },

            buttonIsClicked(){
                this.value++;
            },

            start(){
                 setInterval(this.timeEvents, this.interval)
            },

            timeEvents(){
                let toAdd = 0;
                for (let i = 0; i<this.autos.length; i++){
                    toAdd = toAdd + this.autoamounts[i]*this.autopower[i];
                }
                this.value += toAdd*this.interval/1000;
            }
        }
    }

</script>

<style scoped>
    .autos{
        display: inline-flex;
        flex-direction: column;
        height: 100%;
        width: 30%;
        float: right;
    }

    .gamebox{
        height: inherit;
        display: inherit;
        flex-direction: row;
        width: 100%
    }


    .clickbuttonbox{
        display: inline-flex;
        height: 100%;
        width: 70%;
    }


</style>
