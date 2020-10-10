<script type="text/javascript">
    $('#editar').on('show.bs.modal',function(event){
        var boton=$(event.relatedTarget)
        var id=boton.data('id')
        var nombre=boton.data('nombre')
        var stock=boton.data('stock')
        var categoria=boton.data('categoria')
        var estado=boton.data('estado')
        var modal=$(this)
        modal.find('.modal-body #id_producto').val(id)
        modal.find('.modal-body #nombre').val(nombre)
        modal.find('.modal-body #stock').val(stock)
        modal.find('.modal-body #categoria').val(categoria).attr('selected')
        modal.find('.modal-body #estado').val(estado).attr('selected')
	});
</script>