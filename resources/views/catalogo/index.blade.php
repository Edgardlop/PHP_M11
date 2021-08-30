@extends('layouts.app')

@section('content')
<div class="container">




<a href="{{ url('catalogo/create') }}" class="btn btn-success">Ingresar nuevo libro</a>
<br / ><br />
<table class="table table-light">
    <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre Autor</th>
                <th>Apellido Autor</th>
                <th>Titulo Libro</th>
                <th>Genero</th>
                <th>Tapa Frente</th>
                <th>Tapa Dorso</th>
                <th>Editorial</th>
                <th>Precio</th>
            </tr>
    </thead>
    <tbody>

        @foreach($catalogos as $catalogo)
        <tr>
           <td>{{$catalogo->id}}</td>
           <td>{{$catalogo->AutorNombre}}</td>
           <td>{{$catalogo->AutorApellido}}</td>
           <td>{{$catalogo->LibroNombre}}</td>
           <td>{{$catalogo->LibroGenero}}</td>

           <td>
            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$catalogo->TapaFrontal}}"  width="100" alt="">   
         </td>

           <td>
            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$catalogo->TapaTrasera}}"  width="100" alt="">   
</td>
           <td>{{$catalogo->EditorialNombre}}</td>
          <td>{{$catalogo->Precio}}</td>
          <td>
              
            <a href="{{ url('/catalogo/'.$catalogo->id.'/edit') }}" class="btn btn-warning">
                Editar  
            </a>
            <form action="{{ url('/catalogo/'.$catalogo->id ) }}"class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('Eliminar Libro?')" class="btn btn-danger"value="Borrar">
            </form>  
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
    {{Session::get('mensaje')}}
  @endif
</div>

</div>
@endsection


