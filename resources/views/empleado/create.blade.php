Formulario de creacion


<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
@csrf
{{-- here is for the layout --}}
@include('empleado.form',['modo'=>'Crear']);

</form>
