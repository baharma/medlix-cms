<div>
    <div class="modal fade" id="formPlan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> Plan & Feature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='create'>
                    <div class="modal-body row">
                        <div class="col">
                            <div class="form-group row mb-3">
                                <label for="name" class="col-sm-4 col-form-label">Plan Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        wire:model="name" placeholder="Plan Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="name" class="col-sm-4 col-form-label">Plan Duration</label>
                                <div class="col-sm-8">
                                    <input class="form-control  @error('duration') is-invalid @enderror" type="number"
                                        wire:model="duration" placeholder="12">
                                    @error('duration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  mb-3">
                                <label for="name" class="col-sm-4 col-form-label">Plan Price</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control  @error('amount') is-invalid @enderror"
                                        wire:model="amount" placeholder="00,000">
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  mb-3">
                                <label for="name" class="col-sm-4 col-form-label">Best Seller</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input   @error('best_seller') is-invalid @enderror"
                                            type="radio" value="1" name="best_seller" id="best_seller1"
                                            wire:model="best_seller">
                                        <label class="form-check-label" for="best_seller1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input   @error('best_seller') is-invalid @enderror"
                                            type="radio" value="0" name="best_seller" id="best_seller2"
                                            wire:model="best_seller">
                                        <label class="form-check-label" for="best_seller2">
                                            No
                                        </label>
                                    </div>
                                    @error('best_seller')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <hr>
                            <span>Plan Details</span>
                            <div x-data="{ showAlldata: false, dataUpdate: false }" x-init="$wire.on('showAlldata', (event) => { showAlldata = event[0].event })
                            $wire.on('dataUpdate', (event) => { dataUpdate = event[0].event })">

                                <div x-show="showAlldata">
                                    <div class="modal-body" style="height: 500px; overflow: auto">
                                        @foreach ($featues as $index => $detas)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="planDetails{{ $detas->id }}"
                                                    wire:click="getDataCheckbox('{{ $detas->id }}',$event.target.checked)">
                                                <label class="form-check-label" for="planDetails{{ $detas->id }}">
                                                    {{ $detas->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div x-show="dataUpdate">
                                    @foreach ($checkDetail as $item)
                                        <div class="form-check form-switch" wire:ignore.self>
                                            <input class="form-check-input" type="checkbox"
                                                @if ($item->pivot->check) checked @endif
                                                wire:click="unSwitch('{{ $item->pivot->id }}')">
                                            <label class="form-check-label"
                                                for="flexSwitchCheckDefault">{{ $item->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal-plan" class="btn btn-warning reloadPage"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-check"></i>Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.component.confirm-delete')
</div>


@push('script')
    @script
        <script>
            $wire.on('closeModalPlan', () => {
                const closeButton = document.getElementById('close-modal-plan');
                if (closeButton) {
                    closeButton.click();
                } else {
                    console.error('Button with ID "close-modal" not found');
                }
            })
            $('.reloadPage').on('click', function() {
                location.reload();
            })
        </script>
    @endscript
@endpush
