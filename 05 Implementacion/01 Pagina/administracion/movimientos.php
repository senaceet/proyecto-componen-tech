<div class="TablaBD">

    <div class="CabezaHerramientas">
   	    <div class="Herramientas">
           <h1>Movimientos</h1>
           <div>
                Desde<br>
               <input id="desde" type="date" max="<?php echo date('Y-m-d') ?>">
           </div>
           <div>
                Hasta <br>
               <input id="hasta" type="date" max="<?php echo date('Y-m-d') ?>">
           </div>
   	  		
   	  	</div>	
    </div>
    <!--✖-->
    <script>
        $(document).ready(function(){
            function obtener_datos(){
  				   $.ajax({
  					  url: "../administracion/mov.php",
  					  method: "POST",
  					  success: function(data){
  				         $("#result").html(data)
  					  }
  				   })
  		      }
            obtener_datos();
            $(document).on('input','#desde,#hasta',function(){
               var desde = $('#desde').val();
               var hasta = $('#hasta').val();
  
               $.ajax({
                  url: "../administracion/mov.php",
                  method: "POST",
                  data: {desde,hasta},
                  success: function(data){
                     $("#result").html(data);
                  }
				   })
            })
        })

    </script>
   	<table class="TableroDatos" id="result">
   	</table>

</div>
