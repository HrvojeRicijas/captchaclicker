<template>
    <div class="test">
        <h1>{{title}}</h1>
        <input type="text" v-model="title"><br>
        <span class="number"v-for="letter in title.length"  v-bind:style="{color: isCorrect(letter-1)}" v-text="title[letter-1]"></span>
        <b>{{stuff}}</b>
    </div>

</template>

<script>
    export default {
        name: 'test',
        data(){
            return {
                title: 'Hello World',
                correct: 'All I want for christmas is you',
                user: {
                    firstName: 'Jim',
                    lastName: 'Dough'
                },
            }
        },
        computed: {
            isSame: function () {
                return this.title.slice(0, this.correct.length) == this.correct
            }
        },
        methods: {
            isCorrect: function (thing) {
                if (this.isSame && thing <= this.correct.length){
                        return "blue";
                }
                if (this.title[thing] == this.correct[thing]){
                    return "#00fa2a";
                } else {
                    return "red";
                }
            }
        },
        props: ['stuff']


    }

</script>

<style scoped>
.number + .number {
    margin-left: 0px;
}

</style>
