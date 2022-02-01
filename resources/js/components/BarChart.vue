<template>
  <div class="small">

    <bar-chart :chart-data="datacollection" :height="100"></bar-chart>
  </div>
</template>

<script>

import BarChart from './BarChart.js'
import axios from 'axios'

export default {
  components: {
    BarChart
  },
  data(){
    return {
      datacollection: null
    }
  },
  mounted () {
    this.fillData()
  },
  methods: {

    fillData: async function ()
    {
        let dataT = {
          labels:[],
          data:[]
        };

        await axios.get("/api/a").then(response=>{
            let { data } = response
            data.forEach(item=>{
                dataT.labels.push(item.hour)
                dataT.data.push(item.productionXhour)
            })
        })

      this.datacollection = {
       labels: dataT.labels,
       datasets: [
          {
            label: 'Actual',
            backgroundColor: '#00ff80',
            data: dataT.data
          },
        ]
        }
    }
  }
}
</script>

<style lang="css">
.small {
  max-width: 800px;
  /* max-height: 500px; */
  margin:  50px auto;
}
</style>
