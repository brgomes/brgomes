{{ Form::open(['route' => 'sistema.livros.store', 'class' => 'form-horizontal', 'method' => 'post']) }}
	<div class="modal fade" id="modalInserirLivro" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Cadastrar livro</h4>
	            </div>
	            <div class="modal-body">
					@include('sistema.livros._form', ['livro' => null])
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	            </div>
	        </div>
	    </div>
	</div>
{{ Form::close() }}
