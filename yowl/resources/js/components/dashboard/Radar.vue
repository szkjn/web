<template>
 
  <mdb-container>
    <mdb-radar-chart
      :data="radarChartData"
      :options="radarChartOptions"
      :width="600"
      :height="300"
    ></mdb-radar-chart>
  </mdb-container>
</template>

<script>
  import { mdbRadarChart, mdbContainer } from "mdbvue";
  export default {
    name: "ChartPage",
    components: {
      mdbRadarChart,
      mdbContainer
    },
    props:{
      feed : Array
    },
    data() {
      return {
        radarChartData: {
          labels: [this.feed[0],this.feed[1],this.feed[2],this.feed[3],this.feed[4]],
         datasets: [
            {
              label: "number of posts by categories",
              backgroundColor: "rgba(255, 99, 132, 0.1)",
              borderColor: "rgba(255, 99, 132, 1)",
              borderWidth: 0.7,
              data: [1, 2, 1, 1, 2]
            },
            {
              label: "number of comments by categories",
              backgroundColor: "rgba(75, 192, 192, 0.2)",
              borderColor: "rgba(75, 192, 192, 1)",
              borderWidth: 0.7,
              data: [0, 1, 4, 2, 1]
            }
          ]
        },
        radarChartOptions: {
          responsive: false,
          maintainAspectRatio: false
        }
      };
    },
    
  };
</script>