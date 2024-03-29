<div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                @if (auth()->user()->default_cms == 2)
                    <h4>Demo Image</h4>
                @else
                    <h4>Slider Image</h4>
                @endif
                <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#modalFaskes"><i
                        class="bx bx-plus "></i> Add</button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slider as $item)
                        <tr>
                            <td>
                                <a href="{{ route('slider.inp', $item->id) }}" wire:navigate class="btn btn-warning btn-sm"><i
                                        class="bx bx-edit"></i></a>
                                <button class="btn btn-sm btn-danger"
                                    @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                        class="bx bx-trash"></i></button>
                            </td>
                            <td><img src="{{ asset($item->images) }}" alt="" style="max-width: 500px"></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layouts.component.confirm-delete')

    <div class="modal fade" id="modalFaskes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" id="inpList">
                                <div class="form-group mb-3">
                                    <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                        name="image" />
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal" class="btn btn-warning" data-bs-dismiss="modal"
                            aria-label="Close"><i class="bx bx-x"></i>
                            Close</button>
                            <button class="btn btn-primary" type="submit"  wire:loading.attr="disabled" :disabled="$isSubmitting">
                                <i class="bx bx-save"></i>
                                <span wire:loading.remove>Save</span>
                                <span wire:loading>Loading...</span>
                            </button>
                            <!-- Loading Indicator -->
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
            $wire.on('closeModal', () => {
                const closeButton = document.getElementById('close-modal');
                if (closeButton) {
                    closeButton.click();
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
                const closeButtonPro = document.getElementById('close-modal-provider');
                if (closeButton) {
                    closeButtonPro.click();
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
            })
        </script>
    @endscript
@endpush
