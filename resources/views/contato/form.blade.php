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
            <input type="text" class="form-control" name="nome"  value="{{$contato->nome ??''}}"placeholder="DIGITE NOME">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">TELEFONE</label>
              <input type="text" class="form-control" name="telefone" value="{{$contato->telefone ??''}}" placeholder="DIGITE TELEFONE">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">CEP</label>
              <input onfocusout="buscaCep()" type="text" class="form-control" name="cep" id="cep" value="{{$contato->cep ??''}}" placeholder="DIGITE CEP">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">LOGRADOURO</label>
              <input type="text" class="form-control" name="logradouro" id="logradouro"value="{{$contato->logradouro ??''}}" placeholder="DIGITE LOGRADOURO">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">BAIRRO</label>
              <input type="text" class="form-control" name="bairro" id="bairro"value="{{$contato->bairro ??''}}" placeholder="DIGITE BAIRRO">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">LOCALIDADE</label>
              <input type="text" class="form-control" name="localidade"id="localidade"value="{{$contato->localidade ??''}}" placeholder="DIGITE LOCALIDADE">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">ESTADO</label>
              <input type="text" class="form-control" name="estado"id="estado"value="{{$contato->estado ??''}}" placeholder="DIGITE ESTADO">
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

    @endif
      </div>
    
    
@stop

@section('css')

@stop
   

@section('js')

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

    function buscaCep(){

  let cep = document.getElementById('cep').value;
  let url='https://viacep.com.br/ws/'+ cep +'/json/';

  axios.get(url)
  .then(function (response) {
    document.getElementById('logradouro').value=response.data.logradouro
    document.getElementById('bairro').value=response.data.bairro
    document.getElementById('localidade').value=response.data.localidade
    document.getElementById('estado').value=response.data.uf



    // handle success
   // console.log(response.data);

  })
  .catch(function (error) {
  alert('Ops!CEP não encontrado')
  })
}

</script>
@stop
