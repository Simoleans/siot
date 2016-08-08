<script>  
          $(function () {
              var datos=<?php echo preg_replace( "/\"(\d+)\"/", '$1', json_encode($f)); ?>;
              var produccion=<?php echo preg_replace( "/\"(\d+)\"/", '$1', json_encode($todo)); ?>;
            $('#container2').highcharts({
              chart: {
                type: 'column',
                plotBackgroundColor: null,
                style: {
                  fontFamily: 'comic sans',
                }
              },
              credits: { enabled: false, }, 
              exporting: { enabled: true, },
              title: {
                text: 'PRODUCCION DE <?php echo ($nombre); ?>',
                style: {
                  fontWeight: '700',
                  fontSize: '18px'
                }           
              },
              subtitle: {
                text: 'KILOGRAMOS(KG) | Fecha de Registro'
              },
              xAxis: {
                categories: datos,
                crosshair: true
              },
              yAxis: {
                min: 0,
                title: {
                  text: 'KILOGRAMOS (KG)'
                }
              },
              tooltip: {
                headerFormat: '<table><tr><td><span style="font-size:12px;">{point.key}</span>',
                pointFormat: '</td></tr><tr><td><b>{series.name} </b>' +
                             '<b style="padding:0; color:#A60404"></b>',
                footerFormat: '</td></tr></table>',
                shared: true,
                useHTML: true
              },
              plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 2,
                    color:'#A32121',
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: false
                }
              },
              series: [{

                name: ' ',
                data: produccion,

              }]          
          
            });
        
      });     
</script>