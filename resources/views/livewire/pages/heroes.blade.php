<div>
    <div class="card">
        <form wire:submit="save" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <x-componen-form.input-image-dropify label='Hero  Image' wireModel="image"
                                imageDefault="{{ $image }}" name="image" />
                        </div>

                    </div>
                    <div class="col-md-12" id="inpList">
                        <div class="form-group mb-2">
                            <label for="inpTitle">Hero Title</label>
                            <input type="text" class="form-control" wire:model="title" id="inpTitle">
                        </div>
                        <div class="form-group ">
                            <label for="inpTitle">Hero Sub Title</label>
                            <input type="text" class="form-control" wire:model="title" id="inpTitle">
                        </div>

                        <div class="form-group mt-3">
                            <label>Extend Variable</label>
                            <br>
                            @if (!$model)
                                <div class="input-group mb-3">

                                    <textarea name="fistList" class="form-control" id="" cols="30" rows="2" wire:model="fistList"></textarea>
                                    <button type="button" class="btn btn-danger" wire:click="removeArr">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            @endif

                            @foreach ($extend as $index => $post)
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Key and Value</span>
                                    <input type="text" placeholder="Key | exp: app_vid_url" class="form-control"
                                        wire:model="extend.{{ $index }}.key">
                                    <input type="text" placeholder="Value | exp: http://"aria-label="Last name"
                                        class="form-control" wire:model="extend.{{ $index }}.val">
                                    <button type="button" class="btn btn-danger"
                                        wire:click="removeItem({{ $index }})">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            @endforeach

                            <button type="button" class="btn btn-success btn-sm" wire:click="addItem">
                                <i class="bx bx-plus"></i> Add Item
                            </button>

                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>
                    Submit</button>
            </div>
        </form>
    </div>
</div>
