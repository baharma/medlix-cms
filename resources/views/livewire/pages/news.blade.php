<div>

    <div class="d-flex justify-content-end mb-3">
        <a type="button" class="btn btn-primary" href="{{ route('artikel.create') }}">
            <i class='bx bx-add-to-queue'></i>
            Add News</a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
        @foreach ($data as $item)
        <div class="col">
            <div class="card border-primary border-bottom border-3 border-0">
                <img src="{{$item->thumbnail}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{$item->title}}</h5>
                    <hr>
                    <div class="d-flex align-items-center gap-2">
                        <a href="javascript:;" @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })" class="btn btn-inverse-danger"><i class='bx bxs-trash-alt' ></i>Delete</a>
                        <a href="{{route('artikel.create',$item->id)}}" class="btn btn-warning"><i class='bx bxs-pencil'></i>Edit</a>
                        <a href="{{route('artikel.detail',$item->id)}}" class="btn btn-outline-secondary">
                            <i class='bx bxs-detail' ></i>
                            Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    @include('layouts.component.confirm-delete')
</div>



@script
<script defer>
    window.onload = function () {
        ClassicEditor.create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '{{ route('image.upload').'?_token='.csrf_token() }}',
            },
        })
        .then(editor => {

            editor.keystrokes.set('Space', (key, stop) => {
                editor.execute('input', {
                    text: '\u00a0'
                });
                stop();
            });
        })
        .catch(error => {
            console.error(error);
        });
    };
</script>
@endscript
