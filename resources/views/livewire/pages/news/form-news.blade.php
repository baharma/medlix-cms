<div>
    <div class="card text-start p-3">
        <form wire:submit="save">
            <div class="row mb-3">
                <div class="col">
                <x-componen-form.input-image-dropify label='Thumnail News' wireModel="thumnail"
                                        imageDefault="" imageDefault="" name="image" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                      <x-componen-form.input-form idInput="nameEvent" label="Title News" wireModel="title"
                                        placeholder="Enter Your Name Event" name="name" classInput="col"
                                        classLabels="col-sm-3" />
                </div>
            </div>
            <div class="row mb-3" wire:ignore>
                <div class="col">
                <label>News Detail</label>
                <textarea class="form-control" wire:model='discription' placeholder="Leave a comment here" id="editor" style="height: 500px"></textarea>
                </div>
            </div>
            <div class="d-flex flex-row-reverse bd-highlight">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
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
            editor.model.document.on('change:data', () => {
                @this.set('discription', editor.getData());
            });
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


