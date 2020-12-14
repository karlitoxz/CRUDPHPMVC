data-backdrop="static" = No se cierra si de dan click a la pantalla negra.
data-keyboard="false" = No se cierra si presionan la tecla Esc.

<!-- Modal -->
<div class="modal fade" id="cambiarPassword" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cambiarPasswordLabel">Es necesario cambiar la contraseña</h5>
      </div>
      <div class="modal-body">
			<form class="bg-light" name="formulario" id="formulario" method="post">

 					<div class="form-group">
 						<label for="userpass">Contrase&ntilde;a:</label>
 						<div class="input-group">
 							<div class="input-group-prepend">
 								<span class="input-group-text"><i class="fas fa-lock"></i></span>
 							</div>
 							<input type="password" class="form-control" placeholder="Enter password" id="userpass" name="userpass" required>
 						</div>
 					</div>
 					<div class="form-group">
 						<label for="userpass2">Repita la contrase&ntilde;a:</label>
 						<div class="input-group">
 							<div class="input-group-prepend">
 								<span class="input-group-text"><i class="fas fa-lock"></i></span>
 							</div>
 							<input type="password" class="form-control" placeholder="Enter password" id="userpass2" name="userpass2" required>
 						</div>
 					</div>
 		
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="cambiarPassword();" class="btn btn-primary btn-block azulServ">Cambiar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

------------------------Evento si se abre el modal-------------------------
$('#cambiarPassword').on('show.bs.modal', function () {
   alert('hi')
})

--------------------------llamarlo desde boton ---------------------------------
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cambiarPassword">
  Launch demo modal
</button>

-------------------------llamarlo desde ajax------------------------------------

function valCaducidadPassword(){
  login = $("#username").val();
  $.ajax({
    url: 'ajax/ajaxValidarCaducidadPassword.php',
    type: 'POST',
    data: {"login": login},
  })
  .done(function(result) {
    if (result == "si") {
      $('#cambiarPassword').modal('show');
    }
  })
  
}


