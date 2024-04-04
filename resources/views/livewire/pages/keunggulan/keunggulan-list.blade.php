<div>
<!-- Modal -->
<div class="modal fade" wire:ignore.self id="ListKeunggulan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" wire:ignore.self>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">List Keunggulan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent='save'>
        <div class="modal-body">
            <div >
                <div x-data="{image:false,dropify:true,cancel:false}" x-init="
                $wire.on('imageshow',()=>{
                    image=true
                    dropify=false
                })
                $wire.on('clearImage',()=>{
                    cancel=false
                    image=false
                    dropify=true
                })

                ">
                    <div class="row mb-3" x-show="image">
                        <label for="inputAddress4" class="col col-form-label">Image Keunggulan</label>
                        <img src="{{$image}}" style="width: 350px">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <a href="#" x-on:click="image = ! image,dropify = ! dropify,cancel = ! cancel">Edit Image</a>
                        </div>
                    </div>
                    <div class="row mb-3" x-show="dropify">
                        <x-componen-form.input-image-dropify label='Image' wireModel="image"
                        imageDefault="" name="image" />
                        <div class="d-flex flex-row-reverse bd-highlight">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <a href="#" x-on:click="image = ! image,dropify = ! dropify,cancel = ! cancel" x-show="cancel">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <x-componen-form.textarea-input label="Title keunggulan"
                        idTextarea="DescriptionEvent" wireModel="title" rows="3" classInput="col-sm-9"
                        classLabels="col-sm-3" placeholder="Description" />
                        <div class="d-flex flex-row-reverse bd-highlight">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-modal" >Close</button>
          <button type="submit" class="btn btn-primary">

            <i class="bx bx-save"></i>
            <span wire:loading.remove>Save</span>
            <span wire:loading>Loading...</button>
                <span wire:loading>Loading...</span>
        </div>
        </form>
      </div>
    </div>
  </div>


</div>


@push('script')
    @script
        <script>

            $wire.on('clearImagedrofi', () => {
                var clear = $('.dropify-clear');
                    clear.click();
                    $('.dropify').attr('data-default-file', '')
                    $('.dropify').dropify();
            })

            $wire.on('closeModal', () => {
                const closeButton = document.getElementById('close-modal');
                if (closeButton) {
                    closeButton.click();
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
            })
        </script>
    @endscript
@endpush
