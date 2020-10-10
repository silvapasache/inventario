	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <!--TITULO-->
      		<div class="modal-header">
		        <h4 class="modal-title" id="exampleModalCenterTitle">
		        	Usuario
		        </h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
      		</div>
              <!--END TITULO-->
            
      		<div class="modal-body">
                <input type="hidden" name="id_usuario" id="id_usuario" >
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
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  value="{{ old('email') }}"
                    placeholder="example@outlook.com">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="dni">DNI</label>
                            <input type="text" name="dni" id="dni" class="form-control"  maxlength="8">

                        </div>
                        <div class="col-lg-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" maxlength="9">
                            @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" >
                    @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="usuario">Usuario (*)</label>
                            <input type="text" name="usuario" id="usuario" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" value="{{ old('usuario') }}" maxlength="14">
                            @if ($errors->has('usuario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-lg-8">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="form-control" requerid>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password (*)</label>
                    <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}"  requerid>
                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="dni">Rol</label>
                            <select id="idrol" class="form-control" name="idrol" requerid>
                                @foreach($roles as $rol)
                                <option value="{{$rol->id}}">{{$rol->rol}}</option>
                                @endforeach
                            </select>    
                        </div>
                        <div class="col-lg-6">
                            <label for="estado">Estado</label>
                            <select id="estado" class="form-control" name="estado" requerid>
                                <option value="1">Activo</option>
                                <option value="2" >Inactivo</option>
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
