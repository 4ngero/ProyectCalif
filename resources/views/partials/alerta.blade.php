@if(session()->has('Confirmacion'))
<script>
    Swal.fire(
        'Todo correcto',
        '{{session('Confirmacion')}}',
        'success'
    )
</script>
@endif

@if(session()->has('Error'))
<script>
    Swal.fire(
        'Error',
        'Usuario y/o contraseña incorrectos',
        'error'
    )
</script>
@endif
