<template>
  <div class="small">
    <h4>Reportes del Venta Junio</h4>
    <bar-chart :chart-data="datacollection" :height="100"></bar-chart>
  </div>
</template>

<script>

import BarChart from './BarChart.js'

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

    fillData ()
    {
      this.datacollection = {
        labels: ['Lunes','Martes','Miercoles','Jueves','Viernes', 'Sabado' , 'Domingo','tracala'],
        datasets: [
          {
            label: 'Ventas',
            backgroundColor: '#00ff80',
            data: [ 20, 40, 50, 20, 50, 40,70,80]
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
