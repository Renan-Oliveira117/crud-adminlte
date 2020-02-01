@extends('adminlte::page')

@section('title', 'Contatos')

@section('content_header')

@include('flash::message')

    <a  class= "btn btn-primary" href="{{route('contatos.create')}}">NOVO CONTATO</a> <p></p>

    <a  class="btn btn-success" href="{{route('relatorio.contato')}}">RELATÓRIO</a>
  
@stop

@section('content')
    <p>BEM VINDO.</p>
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">LISTA DE CONTATO</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody><tr>
              
              <th style="width: 10px">ID</th>
              <th>NOME</th>
              <th>TELEFONE</th>
              <th>Acões</th>

              @foreach($contatos as $c)
              <tr>

              <td>{{$c->id}}</td>
              <td>{{$c->nome}}</td>
              <td>{{$c->telefone}}</td>

             <td> <a  class= "btn btn-primary" href="{{route('contatos.edit',$c->id)}}">EDITAR</a>
             <a  class= "btn btn-danger" href="javascript:excluirContato({{$c->id}})">EXCLUIR</a>

             </td>
             </tr>
                    
              @endforeach
             
            
                
        <!-- /.box-body -->
       
         </div>
    </div>
</div>
    
@stop


   

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    function excluirContato(id){
        
        bootbox.confirm("Deseja mesmo excluir esse contato?", function(sim) {
            if (sim) {
                // bootbox.alert("Deve excluir o cliente com ID:" + id);
                axios.delete('/contatos/' + id)
                    .then(function(resposta) {
                        window.location.href = "/contatos";
                    })
                    .catch(function(erro) {
                        bootbox.alert("Ocoreu um erro:" + erro);
                    });
            }
        });
    }
</script>
   
@stop






