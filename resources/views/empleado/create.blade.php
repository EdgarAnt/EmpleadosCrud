@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
@csrf
{{-- here is for the layout --}}
@include('empleado.form',['modo'=>'Crear']);

</form>

</div>
@endsection

{{-- Enjoy this page, is a lot of job for me :D --}}