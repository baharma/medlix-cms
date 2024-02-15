<div>
    <div class="p-3">
        <div class="d-flex justify-content-between mb-3">
            {{-- <h4></h4> --}}
            <button type="button" class="btn btn-lg btn-success"
                style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" data-bs-toggle="modal"
                data-bs-target="#formPlanFeatures"> <i class="bx bx-plus"></i> Add Plan
                Feature</button>
            <button type="button" class="btn btn-lg"
                style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"
                data-bs-toggle="modal" data-bs-target="#formPlan" wire:click='resets'> <i class="bx bx-plus"></i> Add
                Plan Pricing</button>
        </div>
        <div class="row d-flex justify-content-center">
            @foreach ($myplan as $item)
                <div class="col-md-4 mb-4">
                    <div class="card mb-5 mb-lg-0 " style="border-radius:15px">
                        <div class="card-header bg-primary py-3" style="border-radius: 15px 15px 0px 0px">
                            <h5 class="card-title text-white text-uppercase text-center">{{ $item->name }}</h5>
                            <h5 class="card-price text-white text-center">{{ mataUang($item->amount) }}</h5>
                            <div class="d-flex justify-content-between mb-3">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="form-check">
                                    @if ($item->best_seller)
                                        <span class="text-primary"> <i class='bx bxs-check-square  m-auto'></i></span>
                                    @else
                                        <span class="text-secondary">
                                            <i class='bx bxs-x-square m-auto'></i>
                                        </span>
                                    @endif
                                    <label class="form-check-label" for="bestSeller{{ $item->id }}">
                                        Best Seller
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <ul class="list-group list-group-flush">
                                @foreach ($item->feature as $feature)
                                    <li class="list-group-item">
                                        <div class="">
                                            @if ($feature->pivot->check)
                                                <span class="text-primary"> <i
                                                        class='bx bxs-check-square  m-auto'></i></span>
                                            @else
                                                <span class="text-secondary">
                                                    <i class='bx bxs-x-square m-auto'></i>
                                                </span>
                                            @endif
                                            <label class="form-check-label"
                                                for="flexSwitchCheckDefault{{ $item->id }}{{ $feature->id }}">{{ $feature->name }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <div class="d-grid">
                                <a href="#" class="btn btn-warning my-2" style="border-radius: 0px"
                                    data-bs-toggle="modal" data-bs-target="#formPlan"
                                    wire:click="DataUpdatePlanToedit('{{ $item->id }}')"> <i
                                        class='bx bxs-edit'></i>
                                    Edit Plan</a>
                                <a href="#" class="btn btn-danger my-2" style="border-radius: 0px"
                                    @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"> <i
                                        class='bx bxs-trash'></i>
                                    Delete Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @livewire('pages.plan.form-plan')
    @livewire('pages.plan.form-plan-featues')

    @include('layouts.component.confirm-delete')
</div>




@push('script')
    @script
        <script>
            $wire.on('refreshCheckBox', (event) => {
                const data = event[0]
                const dataCheckbox = document.getElementById('best-seller-' + data.id);
                if (data.best == true) {
                    dataCheckbox.checked = false
                } else {
                    dataCheckbox.checked = true
                }
            });
            $wire.on('unSwitch', (event) => {
                const data = event[0]
                const dataSwich = document.getElementById('switch-' + data.id)
                if (data.switch == true) {
                    dataSwich.checked = false
                } else {
                    dataSwich.checked = true
                }
            });
            $wire.on('reloadPage', () => {
                location.reload();
            })
        </script>
    @endscript
@endpush
