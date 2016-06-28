<script>  
      $(function () {
        $.getJSON('<?php echo $this->createUrl("site/stats"); ?>', function (json) {
        var datos=<?php echo preg_replace( "/\"(\d+)\"/", '$1', json_encode($FechaFiltro)); ?>;
        $('#containerfiltro').highcharts({
          title: {
            text: '<?php echo ($nombre); ?>',         
          },
          subtitle: {
            text: 'Kilogramos(Kg) | Fecha de Registro'
          },
          credits: { enabled: false, }, 
          exporting: { enabled: true, },
          xAxis: {
            categories: datos,
            crosshair: true
          },
          yAxis: {
            title: {
              text: 'kilogramos (Kg)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#7D0107'
            }]
          },
          plotOptions: {
            line: {
                color:'#A32121',
                allowPointSelect: true,
                cursor: 'pointer',
                showInLegend: false,
                dataLabels: {
                    enabled: true
                }
            }
          },
          tooltip: {
            valueSuffix: '<span style="padding:0; color:#A60404"><b> KG</b></span>',
            useHTML: true
          },
          series: [{
            name: 'PRODUCCION',
            data: [<?php echo join($toneladas2,","); ?>]

          }]          
          
            });
        });
        
      });     
</script>
