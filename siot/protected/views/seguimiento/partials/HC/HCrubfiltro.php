<script>
$(function () {
    $('#containerfiltro').highcharts({
        chart: {
            backgroundColor: {
                 linearGradient: { x1: 0, y1: 0, x2: 0, y2: 0 },
                 stops: [
                    [0, '#fff'],
                    [1, '#fff']
                 ]
              },
              type: 'pie'
        },
        title: {
            text: '<b>RUBROS</b>',
            align: 'center',
            verticalAlign: 'middle',
            y: 10
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                showInLegend: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: false
        },
        exporting:{ enabled:true},
        credits:{ enabled:false},
        series: [{
            type: 'pie',
            name: 'TOTAL',
            innerSize: '50%',
            data: [
                <?php foreach ($results1 as $result) 
                 {  
                  $nombre = $result["nombre_rubro"];
                  $prod = $result["prod"];
                 ?>
                 ['<?php echo "<b>$nombre</b>";?>' , <?php echo "$prod"; ?>],
                 <?php } ?>
            ]
        }]
    });
});
</script>