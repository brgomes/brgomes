<div class="form-group">
	<label for="ordem" class="col-sm-3 control-label">Ordem</label>
	<div class="col-sm-9">
		{!! Form::number('ordem', null, ['class' => 'form-control', 'id' => 'ordem', 'maxlength' => 3, 'required']) !!}
	</div>
</div>

<div class="form-group">
	<label for="nome" class="col-sm-3 control-label">Nome</label>
	<div class="col-sm-9">
		{!! Form::text('nome', null, ['class' => 'form-control', 'id' => 'nome', 'maxlength' => 100, 'required']) !!}
	</div>
</div>

<div class="form-group">
	<label for="dataaquisicao" class="col-sm-3 control-label">Data aquisição</label>
	<div class="col-sm-9">
		{!! Form::date('dataaquisicao', null, ['class' => 'form-control', 'id' => 'dataaquisicao', 'required']) !!}
	</div>
</div>

<div class="form-group">
	<label for="totalpaginas" class="col-sm-3 control-label">Páginas</label>
	<div class="col-sm-9">
		{!! Form::number('totalpaginas', null, ['class' => 'form-control', 'id' => 'totalpaginas', 'required']) !!}
	</div>
</div>

@if (isset($livro))
	<div class="form-group">
		<label for="paginaslidas" class="col-sm-3 control-label">Páginas lidas</label>
		<div class="col-sm-9">
			{!! Form::number('paginaslidas', null, ['class' => 'form-control', 'id' => 'paginaslidas']) !!}
		</div>
	</div>
@endif
