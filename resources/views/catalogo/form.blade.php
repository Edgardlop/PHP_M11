<h1>{{$modo}} Libro</h1>

@if(count($errors)>0)
  <div class="alert alert-danger" role="alert">
    <ul>
    @foreach ($errors->all() as $error)
   <li> {{$error}} </li>
@endforeach
</ul>
  </div>


@endif
<div class="form-group">
<label for="AutorNombre"> Nombre Autor</label>       
<input type="text" class="form-control" name="AutorNombre" value="{{ isset($catalogo->AutorNombre) ?$catalogo->AutorNombre: old('AutorNombre') }}"
 id="AutorNombre">  
</div>
<div class="form-group">
<label for="AutorApellido"> Apellido Autor</label>       
<input type="text" class="form-control" name="AutorApellido" value="{{ isset($catalogo->AutorApellido) ?$catalogo->AutorApellido:old('AutorApellido')  }}"
 id="AutorApellido">
</div>
<div class="form-group">
<label for="LibroNombre"> Nombre Libro</label>       
<input type="text" class="form-control" name="LibroNombre" value="{{ isset($catalogo->LibroNombre) ?$catalogo->LibroNombre: old('LibroNombre')  }}"
 id="LibroNombre">
</div>
<div class="form-group">
<label for="LibroGenero"> Genero</label>       
<input type="text" class="form-control" name="LibroGenero" value="{{ isset($catalogo->LibroGenero) ?$catalogo->LibroGenero: old('LibroGenero')  }}"
 id="LibroGenero">
</div>
<div class="form-group">
<label for="TapaFrontal"> Tapa Frontal</label>   
@if( isset($catalogo->TapaFrontal))
<img class="img-thumbnail img-fluid" src="{{ asset('storage'). '/' . $catalogo->TapaFrontal }}" width="100" alt=" ">   
@endif
<input type="file" class="form-control"  name="TapaFrontal" value="" id="TapaFrontal">
</div>
<div class="form-group">
<label for="TapaTrasera"> Tapa Trasera </label>     
  @if( isset($catalogo->TapaTrasera))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$catalogo->TapaTrasera}}"  width="100" alt=" ">   
@endif
<input type="file" class="form-control" name="TapaTrasera" value="" id="TapaTrasera">
</div>
<div class="form-group">
<label for="EditorialNombre"> Editorial Nombre</label>       
<input type="text" class="form-control"  name="EditorialNombre" value="{{ isset($catalogo->EditorialNombre)?$catalogo->EditorialNombre:old('EditorialNombre') }}"
 id="EditorialNombre">
</div>
<div class="form-group">
<label for="Precio"> Precio</label>       
<input type="text" class="form-control" name="Precio" value="{{ isset($catalogo->Precio)?$catalogo->Precio:''}}" id="Precio">
</div>

<input class="btn btn-success" type="submit"  value="{{$modo}}">

<a class="btn btn-primary" href="{{ url('catalogo/') }}">Principal</a>

