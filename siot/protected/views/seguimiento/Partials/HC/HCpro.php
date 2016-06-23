<script>  
      $(function () {
        $.getJSON('<?php echo $this->createUrl("site/stats"); ?>', function (json) {
        $('#container2').highcharts({
          chart: {
            type: 'column',
            plotBackgroundColor: null,
            style: {
              fontFamily: 'Century Gothic',
            }
          },
          credits: { enabled: false, }, 
          exporting: { enabled: true, },
          title: {
            text: '<?php echo ($nombre); ?>',
            style: {
              fontWeight: '700',
              fontSize: '18px'
            }           
          },
          subtitle: {
            text: 'Toneladas(Tn) | Fecha de Registro'
          },
          xAxis: {
            categories: datos,
            crosshair: true
          },
          yAxis: {
            min: 0,
            title: {
              text: 'TONELADAS (Tn)'
            }
          },
          tooltip: {
            headerFormat: '<table><tr><td><span style="font-size:12px;">{point.key}</span>',
            pointFormat: '</td></tr><tr><td><b>{series.name}: </b>' +
                         '<b style="padding:0; color:#A60404">{point.y}</b><b>Tn</b>',
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
            name: 'PRODUCCION',
            data: [<?php echo join($toneladas,","); ?>]

          }]          
          
            });
        });
        
      });     
</script>