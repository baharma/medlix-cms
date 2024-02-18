<div>

    <div class="card">
        <form action="">
            <textarea name="editor" id="editor"></textarea>
        </form>
    </div>
</div>





@script
<script defer>
window.onload = function() {
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
            }
        })
        .then(editor => {
            editor.keystrokes.set('Space', (key, stop) => {
                editor.execute('input', { text: '\u00a0' });
                stop();
            });
        })
        .catch(error => {
            console.error(error);
        });
};
// test
</script>
@endscript
