<div>
    <div class="card" style="height: 600px;background-image: url('{{ asset('assets/wait.gif') }}'); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
        <div class="card-body text-center " style="margin-top: 200px;">
            {{-- <h4>DASHBOARD UNDER CONSTRUCTION</h4> --}}
            {{-- <img src="" alt="" style="max-width: 500px"> --}}
        </div>
    </div>
</div>




@script

<script>
    $wire.on('alertSuccess', (event) => {
        Swal.fire({
            icon: "success",
            title: event,
            showConfirmButton: false,
            timer: 1500
        });
    })
</script>

@endscript
