<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <!--TITULO-->
      		<div class="modal-header">
		        <h4 class="modal-title" id="exampleModalCenterTitle">
		        	Proveedor
		        </h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
      		</div>
              <!--END TITULO-->
            
      		<div class="modal-body">
                <input type="hidden" name="id_producto" id="id_producto" >
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}" autofocus>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="tipo_documento">Tipo Documento</label>
                            <select id="tipo_documento" class="form-control" name="tipo_documento" requerid>
                                <option value="DNI">DNI</option>
                                <option value="RUC">RUC</option>
                                <option value="OTRO">OTRO</option>
                            </select> 
                    <small class="text-dark">(*)Campo requerido</small>
                        </div>
                        <div class="col-lg-8">
                            <label for="numdocumento">Numero de Documento</label>
                            <input type="text" name="numdocumento" id="numdocumento" class="form-control" requerid>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" maxlength="9">  
                        </div>
                        <div class="col-lg-7">
                            <label for="email">Email</label>  
                            <input type="text" name="email" id="email" class="form-control" >  
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}" autofocus>
                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                </div>

      		</div>
      		<div class="modal-footer">
      			<button class="btn btn-primary" type="submit">Guardar</button >
      		</div>
		</div>
	</div>
