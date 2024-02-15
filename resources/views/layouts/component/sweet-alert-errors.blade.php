@if ($errors->any())
    <script>
        $(document).ready(function () {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: `{{ implode('<br>', $errors->all()) }}`,
            });
        });
    </script>
@endif
