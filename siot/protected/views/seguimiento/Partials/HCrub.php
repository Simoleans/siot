<script>  
     $(function () {
	    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
	        return {
	            radialGradient: {
	                cx: 0.5,
	                cy: 0.3,
	                r: 0.7
	            },
	            stops: [
	                [0, color],
	                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // color de la torta
	            ]
	        };
	    });
        var chart = new Highcharts.Chart({
           chart:{
              renderTo:'container2',
              backgroundColor: {
                 linearGradient: { x1: 0, y1: 0, x2: 0, y2: 0 },
                 stops: [
                    [0, '#fff'],
                    [1, '#fff']
                 ]
              },
              type: 'pie'
           },
           tooltip: {
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.85)',
                    style: {
                       color: '#ccc'
                    }
                },
                pointFormat: '<i style="color: #C61F1F">{series.name}: <b>{point.percentage:.1f}%</b></i>'
           },
           exporting:{ enabled:true},
           credits:{ enabled:false},
           title:{
              style: {
                 color: '#000',
                 textTransform: 'uppercase',
                 fontSize: '20px'
              },
              text:'<b style="font-family:georgia; text-transform:uppercase">Rubros</b> (%)'
           },
           plotOptions: {
            pie: {
                showInLegend: true,
                color: '#FCCB7F',
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<i style="font-family:georgia"></i> <i style="color: #C61F1F">{point.percentage:.1f} %</i>',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'//color de los labels
                    },
                    connectorColor: 'silver'
                }
            }
           },
           series:[{
                 name:'TOTAL',
                 data:[
                 <?php foreach ($results2 as $result) 
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