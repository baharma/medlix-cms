@push('style')
@endpush
<div>
    <div class="d-flex justify-content-between mb-3">
        <h4></h4>
        <button type="button" class="btn addBtn"
            style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
            data-bs-toggle="modal" data-bs-target="#ModalHero"> <i class="bx bx-plus"></i> Teams
        </button>
    </div>
    <div class="row mb-3">
        @foreach ($model as $item)
            @php
                $social = $item->extend;
                if ($social != null) {
                    $s = json_decode($social, true);

                    $twitter = $s['twitter'];
                    $instagram = $s['instagram'];
                    $linkedin = $s['linkedin'];
                } else {
                    $twitter = '#';
                    $instagram = '#';
                    $linkedin = '#';
                }
            @endphp
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ $item->name }}</h6>
                        <p class="card-text">{{ $item->title }}</p>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="bx bxl-twitter"></i>:{{ $twitter }}</li>
                            <li class="list-group-item"><i class="bx bxl-linkedin"></i>:{{ $linkedin }}</li>
                            <li class="list-group-item"><i class="bx bxl-instagram"></i>:{{ $instagram }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('team.medlinx.edit', $item->id) }}" wire:navigate class="btn btn-warning"> <i
                                class="bx bx-edit"></i></a>
                        <button class="btn btn-danger"
                            @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                class="bx bx-trash"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('layouts.component.confirm-delete')

    <div class="modal fade" id="ModalHero" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Teams</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data" id="formInp">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-componen-form.input-image-dropify label='Image' wireModel="image"
                                        imageDefault="{{ $image }}" name="image" />
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" id="inpList">
                                <div class="form-group mb-2">
                                    <x-componen-form.input-form label='Name' wireModel="name" name="name"
                                        placeholder="Fauzi Sungkar" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <x-componen-form.input-form label='Title' wireModel="title" name="title"
                                        placeholder="Director" />
                                </div>
                                {{-- <span style="margin-top: 10px; font-weight: bold">Social</span> --}}
                                {{-- <hr> --}}
                                <div class="container mt-3">
                                    <div class="form-group mb-2">
                                        <x-componen-form.input-form label='twitter' wireModel="twitter" name="twitter"
                                            placeholder="twitter url" />
                                    </div>
                                    <div class="form-group mb-2">
                                        <x-componen-form.input-form label='LinkedIn' wireModel="linkedin"
                                            name="linkedin" placeholder="LinkedIn url" />
                                    </div>
                                    <div class="form-group mb-2">
                                        <x-componen-form.input-form label='Instagram' wireModel="instagram"
                                            name="instagram" placeholder="instagram url" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 @if (auth()->user()->default_cms != 3) d-none @endif">
                                <div class="form-group mt-3">
                                    <label for="inpTitle">Only Medlinx Team</label>
                                    <div class="form-check  mt-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            wire:model="only" value="3" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            wire:model="only" value="null" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            No
                                        </label>
                                    </div>
                                    @error('only')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal" class="btn btn-warning" data-bs-dismiss="modal"><i
                                class="bx bx-x"></i> Close</button>
                        <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">
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

    @push('script')
        @script
            <script>
                $('.addBtn').on('click', function() {
                    $('.image').attr('data-default-file', '')
                    $('.image').dropify();
                    var clear = $('.dropify-clear');
                    clear.click();
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
</div>
