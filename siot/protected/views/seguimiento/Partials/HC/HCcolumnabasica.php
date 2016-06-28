<script type="text/javascript">
    $(function () {
        $('#empresaplanta').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: '<b>PLANTA <?php echo $planta;?></b>'
            },
            subtitle: {
                text: '<i><?php echo join($rub,"/");?></i>'
            },
            xAxis: {
                categories: [
                <?php foreach ($results1 as $result) 
                 { 
                  $nombre = $result["nombre_rubro"];
                 ?>
                    '<?php echo $nombre;?>',
                 <?php } ?>

                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Kilogramos (KG)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0;"><b>{point.y:.1f}</b><b style="color:#931919"> KG</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true,
                backgroundColor: '#EEEEEE',
                    style: {
                       color: '#000'
                    }
            },
            credits:{ enabled:false},
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    color:'#931919',
                    showInLegend: false,
                    pointPadding: 0.3,
                    borderWidth: 2,
                    dataLabels: {
                        enabled: true,

                    }
                }
            },
            series: [{
                name:'Sub-Total',
                 data:[
                 <?php foreach ($results1 as $result) 
                 { 
                  $nombre = $result["nombre_rubro"];
                  $prod = $result["prod"];
                 ?>
                 ['<?php echo $nombre;?>' , <?php echo "$prod"; ?>],
                 <?php } ?>
                 ]
                 }]        
             });
    });
</script>