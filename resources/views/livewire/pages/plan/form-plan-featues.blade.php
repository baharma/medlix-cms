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
                    <ul class="list-group">
                        @foreach ($feature as $item)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-9 mt-2">
                                        <div>
                                            <span>{{ $item->name }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <div>
                                            <button class="btn btn-warning p-1"
                                                wire:click="Edit('{{ $item->id }}')">
                                                <i class='bx bxs-edit'></i>
                                            </button>
                                            <button class="btn btn-danger p-1"><i class="bx bx-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="col mt-2">
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
                            <br>
                            <button type="button" class="btn btn-primary mt-2" x-on:click="showInput = ! showInput">
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
