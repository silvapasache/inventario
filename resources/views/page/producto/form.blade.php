<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <!--TITULO-->
      		<div class="modal-header">
		        <h4 class="modal-title" id="exampleModalCenterTitle">
		        	Producto
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
                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="categoria">Categoria</label>
                            <select id="categoria" class="form-control" name="categoria" requerid>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                            </select> 
                    <small class="text-dark">(*)Campo requerido</small>
                        </div>
                        <div class="col-lg-8">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="form-control" requerid>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="stock">Cantidad</label>
                            <input type="number" name="stock" id="stock" class="form-control" >  
                        </div>
                        <div class="col-lg-6">
                            <label for="estado">Estado</label>
                            <select id="estado" class="form-control" name="estado" >
                                <option value="1">Activo</option>
                                <option value="0" >Inactivo</option>
                            </select> 
                        </div>
                    </div>
                </div>
      		</div>
      		<div class="modal-footer">
      			<button class="btn btn-primary" type="submit">Guardar</button >
      		</div>
		</div>
	</div>
