function setDynamicChart(categories,tData){
  console.log(categories);
  console.log(tData);
  $('#grafica-terminado').highcharts( {
    
    title: {
      text: 'Grafica Tiempo Terminado',
      align: 'center'
    },
    
    xAxis: {
      categories: categories.terminado,
  },
    yAxis: {
      title: {
        text: 'Porcentaje'
      },
      labels: {
          formatter: function() {
              return this.value + ' %';
          }
      },
  },
  series: tData.Terminado,
  colorByPoint: true,
});
  $('#grafica-proceso').highcharts( {
    
    title: {
      text: 'Grafica Tiempo Proceso',
      align: 'center'
    },
    xAxis: {
      categories: categories.proceso,
  },
    yAxis: {
      title: {
        text: 'Porcentaje'
      },
      labels: {
          formatter: function() {
              return this.value + ' %';
          }
      },
  },
  series: tData.Proceso
});
  $('#grafica-ar').highcharts( {
    
    title: {
      text: 'Grafica Tiempo AR',
      align: 'center'
    },
    xAxis: {
      categories: categories.ar,
  },
    yAxis: {
      title: {
        text: 'Porcentaje'
      },
      labels: {
          formatter: function() {
              return this.value + ' %';
          }
      },
  },
  series: tData.Ar
});
}