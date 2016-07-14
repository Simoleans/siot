<script>  
      $(function () {
        $.getJSON('<?php echo $this->createUrl("site/stats"); ?>', function (json) {
          var datos=<?php echo preg_replace( "/\"(\d+)\"/", '$1', json_encode($f)); ?>;
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
            pointFormat: '</td></tr><tr><td><b>{series.name}: </b>' +
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
            name: '<?php echo join($des,",");?>',
            data: [<?php echo join($toneladas,","); ?>]

          }]          
          
            });
        });
        
      });     
</script>