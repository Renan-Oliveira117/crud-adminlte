@extends('adminlte::page')

@section('title', 'Contatos')

@section('content_header')

    <h1>Novo Contato</h1>
    @include('flash::message')
   
  
@stop

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        
        <!-- /.box-header -->
        <!-- form start -->
    <form method="post" action="{{route('contatos.store')}}">
        @csrf

          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">NOME</label>
            <input type="text" class="form-control" name="nome"  value={{"$contato->nome ??"}}placeholder="DIGITE NOME">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">TELEFONE</label>
              <input type="text" class="form-control" name="telefone" value={{"$contato->telefone ??"}} placeholder="DIGITE TELEFONE">
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{route('contatos.index')}}"  class= "btn btn-primary" > Cancelar</a>
          </div>
        </form>

        @if(isset($contato))
    <form action="/contatos/{{$contatos->id}}" method="post">
    @csrf

    @method('DELETE')

    <button type="submit" class="btn btn-danger">Excluir</button>
    
    
    </form>
      </div>
    
    
@stop

@section('css')
   

@section('js')
   
@stop