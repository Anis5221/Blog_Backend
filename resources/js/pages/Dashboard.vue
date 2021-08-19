<template>
  <div class="container">
 <h2>Vue Js Google Pie Chart Demo</h2>

                        <GChart
                        type="PieChart"
                        :options="options"
                        :data="data"
                        />
  </div>
</template>

<script>
import {Gchart} from 'vue-google-charts'
export default {

    components:{
        Gchart
    },

    data () {
        return {
            data: [
          ['Daily Routine', 'Hours per Day'],
          ['Work',     14],
          ['Eat',      1],
          ['Reading',  2],
          ['Exercise', 2],
          ['Sleep',    5]
      ],
      options: {
        width: 1100,
        height: 400
      }

        }
    }
}
</script>

<style>

</style>
