@extends('layouts.app')

@section('content')
<div class="container">
<br>
<form action="{{ url('/catalogo/'.$catalogo->id ) }}" method="post" enctype="multipart/form-data">

@csrf
{{ method_field('PATCH') }}

@include('catalogo.form', [ 'modo'=>'Editar']);

</form>

</div>
@endsection