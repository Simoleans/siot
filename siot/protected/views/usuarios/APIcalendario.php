<script>
 $.datepicker.regional['es'] = {
   closeText: 'Listo',
   prevText: '<Ant',
   nextText: 'Sig>',
   currentText: 'Hoy',
   monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
   monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
   dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
   dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
   dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
   weekHeader: 'Sm',
   dateFormat: 'dd-mm-yy',
   firstDay: 1,
   isRTL: false,
   showMonthAfterYear: false,
   yearSuffix: ''
   };
   $.datepicker.setDefaults($.datepicker.regional['es']);
  $(function () {
  $("#fecha").datepicker();
});
</script>
<script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      showWeek: true,
      changeMonth: true,
      changeYear: true,
      yearRange: "2015:2050",
      showButtonPanel: false,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      showWeek: true,
      changeMonth: true,
      changeYear: true,
      yearRange: "2015:2050",
      showButtonPanel: false,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });

  });
</script>

<script type="text/javascript">

$(function() {
    $( "#fecha_nac" ).datepicker({
      defaultDate: "+1w",
      showWeek: true,
      changeMonth: true,
      changeYear: true,
      yearRange: "1940:2025",
      showButtonPanel: false,
      numberOfMonths: 1
     
    });
      });

    </script>



<!--$(function() {
      $("#from").datepicker({
          dateFormat: 'M-Y',
          changeMonth: true,
          changeYear: true,
          showButtonPanel: true,
          onClose: function(dateText, inst) {
              var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
              var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
              $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
          }
      });

      $("#from").focus(function () {
          $(".ui-datepicker-calendar").hide();
          $("#ui-datepicker-div").position({
              my: "center top",
              at: "center bottom",
              of: $(this)
          });
      });

  });-->