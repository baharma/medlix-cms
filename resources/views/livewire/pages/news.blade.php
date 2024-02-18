<div>

    <div class="d-flex justify-content-end">
        <a type="button" class="btn btn-primary" href="{{ route('artikel.create') }}">
            <i class='bx bx-add-to-queue'></i>
            Add News</a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">

        <div class="col">
            <div class="card border-primary border-bottom border-3 border-0">
                <img src="assets/images/gallery/01.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-primary">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <hr>
                    <div class="d-flex align-items-center gap-2">
                        <a href="javascript:;" class="btn btn-inverse-primary"><i class='bx bx-star'></i>Button</a>
                        <a href="javascript:;" class="btn btn-primary"><i class='bx bx-microphone'></i>Button</a>
                    </div>
                </div>
            </div>
        </div>
 <textarea class="form-control"   placeholder="Leave a comment here" id="editor" style="height: 500px"></textarea>

    </div>
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
