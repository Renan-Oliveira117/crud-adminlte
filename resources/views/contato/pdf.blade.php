<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    table{
        width: 100%;
        border-collapse: collapse;
    }

    table th{
        background: #5c5c5c;
        color: white;
    }

    table th,td{

        border: 1px solid;
        padding: 5px;
    }
    
    </style>
  <!--  <title>Document</title> excluir titulo - não importa para pdf-->
</head>


<body>
    
    <h1>Lista de Contatos</h1>
    <hr>

    <table>

        <tr>
            <th>NOME</th>
            <th>TELEFONE</th>
        </tr>

   @forelse ($contatos as $r)

    
    <tr>
        <td>{{$r->nome}}</td>
        <td>{{$r->telefone}}</td>

    </tr>     

   @empty

   <h2>Sem contatos cadastro</h2>
       
   @endforelse

</table>
</body>
</html>