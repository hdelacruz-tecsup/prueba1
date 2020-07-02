@extends('layouts.layout')
@section('content')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Contactos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('contacto.create') }}" class="btn btn-info" >Añadir Contacto</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombres</th>
               <th>Apellidos</th>
               <th>Telefono</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($contactos->count())  
              @foreach($contactos as $libro)  
              <tr>
                <td>{{$libro->nombres}}</td>
                <td>{{$libro->apellidos}}</td>
                <td>{{$libro->telefono}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ContactoController@edit', $libro->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ContactoController@destroy', $libro->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
 
    $(document).ready( function () {
      
      $('#mytable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    },"lengthMenu": [ 5, 10, 20 ]
  });
    }); 

 </script>


@endsection