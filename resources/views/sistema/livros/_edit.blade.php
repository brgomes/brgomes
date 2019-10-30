{{ Form::model($livro, ['route' => ['sistema.livros.update', $livro->id], 'class' => 'form-horizontal', 'method' => 'put']) }}
	<div class="modal fade" id="modalEditarLivro{{ $livro->id }}" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Editar livro</h4>
	            </div>
	            <div class="modal-body">
					@include('sistema.livros._form')
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-primary"><i class="fas fa-save" aria-hidden="true"></i> Salvar</button>
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	            </div>
	        </div>
	    </div>
	</div>
{{ Form::close() }}
