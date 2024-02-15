<div>
    <div class="modal fade" id="formPlanFeatures" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Feature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="height: 500px; overflow: auto">
                    @foreach ($feature as $item)
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <div>
                                    <span>{{ $item->name }}</span>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <button class="btn btn-warning p-1" wire:click="Edit('{{ $item->id }}')">
                                        <i class='bx bxs-edit-alt'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="col">
                        <div style="" x-data="{ showInput: false }" x-init="$wire.on('showInput', (event) => { showInput = event[0].event })">
                            <div class="input-group mb-2" x-show="showInput" x-transition>
                                <input type="text" class="form-control @error('planFeatues') is-invalid @enderror"
                                    required wire:model.change="planFeatues" placeholder="Plan Feature">
                                <button class="input-group-text btn btn-primary" wire:click="create"><i
                                        class='bx bx-check'></i></button>
                            </div>
                            @error('planFeatues')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button type="button" class="btn btn-primary" x-on:click="showInput = ! showInput">
                                <i class='bx bx-plus'></i>Add New Featues
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close-modal-plan" class="btn btn-warning" data-bs-dismiss="modal">
                        <i class="bx bx-x"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
