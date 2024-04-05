@push('style')
    <style>
        :root {
            --color-one: #34D1D1;
            --color-two: #2F2235;
            --color-three: #3F3244;
            --color-four: #F2F2F2;
            --color-five: #D1D2D3;
            --color-six: #666666;
            --color-seven: #000000;
            --color-eight: #ffffff;
        }

        .accordion {
            display: flex;
            flex-wrap: wrap;
            height: auto;
            width: 100%;
        }

        .accordion__content {
            order: 1;
            flex-grow: 1;
            width: 100%;
            height: 100%;
            display: none;
        }

        .accordion__label {
            display: block;
            cursor: pointer;
            flex-grow: 1;
            text-align: center;
            padding: 1% 5% 1% 5%;
            background-color: var(--color-four);
            margin-right: 1px;
            border-bottom: 1px solid var(--color-five);
        }

        .accordion__radio {
            display: none;
        }

        .accordion input[type="radio"] {
            display: none;
        }

        .accordion input[type="radio"]+label {
            color: var(--color-six);
            z-index: 1;
        }

        .accordion input[type="radio"]:checked+label {
            background-color: white;
            font-weight: 600;
            border-top: 1px solid var(--color-five);
            border-left: 1px solid var(--color-five);
            border-right: 1px solid var(--color-five);
            border-bottom: none;
        }

        .accordion input[type="radio"]:checked+label+.accordion__content {
            display: flex;
            margin-right: 0;
            border-left: 1px solid var(--color-five);
            border-right: 1px solid var(--color-five);
            border-bottom: 1px solid var(--color-five);
        }

        .accordion__content__image__container {
            width: 40%;
            height: 100%;
            margin-right: 10px;
        }

        .accordion__content__image {
            max-width: 100%;
            max-height: 88%;
            margin: 3%;
            background-color: teal;
        }

        .accordion__content__text {
            width: 75%;
            margin-top: 1%;
            margin-left: 40px;
        }

        .accordion__content__text__title {
            margin-top: 3%;
        }

        .accordion__content__text__horizontal-line {
            border: none;
            border-bottom: 1px solid var(--color-five);
            margin-right: 2%;
        }

        .accordion__content__text__body {
            margin-top: 2%;
            padding-right: 5%;
        }

        @media (max-width: 900px) {
            .accordion {
                border: 1px solid var(--color-five);
            }

            .accordion-tab--status {
                display: inline;
            }

            .accordion__content,
            .accordion__label {
                order: initial;
            }

            .accordion__content {
                flex-direction: column;
            }

            .accordion__label {
                width: 100%;
                margin-right: 0;
                margin-bottom: 1px;
                display: flex;
                justify-content: space-between;
                font-size: 1.2em;
                padding: 5% 6% 5% 6%;
            }

            .accordion__label:last-child {
                background-color: magenta;
            }

            .accordion__content__image__container {
                width: 100%;
            }

            .accordion__content__image {
                padding: 0;
                margin: 0;
                object-fit: cover;
                height: 300px;
                width: 100%;
            }

            .accordion__content__text {
                font-size: 0.9em;
                margin: 4% 5% 4% 5%;
            }

            .accordion__content__text__title {
                margin: 2% 0 2% 0;
            }

            .accordion__content__text__horizontal-line {
                width: 100%;
            }

            .accordion input[type="radio"]+label span:after {
                content: '+';
            }

            .accordion input[type="radio"]:checked+label span:after {
                content: '—';
            }

            .accordion input[type="radio"]:checked+label {
                border: none;
            }

            .accordion input[type="radio"]:checked+label+.accordion {
                border: none;
            }

            .accordion input[type="radio"]:checked+label+.accordion__content {
                border: none;
            }
        }
    </style>
@endpush
<div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h4>Faskes & Peserta</h4>
                <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#modalFaskes"
                    wire:click='clearFaskes'><i class="bx bx-plus "></i> Add</button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faskes as $item)
                        <tr>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalFaskes" wire:click="editEvent({{ $item->id }})"><i
                                        class="bx bx-edit"></i></button>
                                <button class="btn btn-sm btn-danger"
                                    @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                        class="bx bx-trash"></i></button>
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ num($item->text) }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h4>Image & Slider</h4>
                <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#modalImage"><i
                        class="bx bx-plus " wire:click='clearFaskes'></i> Add</button>
            </div>
            <div class="accordion">
                <input class="accordion__radio" type="radio" name="accordion-tabs" id="tab-one" checked />
                <label class="accordion__label" for="tab-one">Provider Image
                    <span class="accordion-tab--status"></span>
                </label>
                <div class="accordion__content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                {{-- <th>Key</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($provider as $num => $i)
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('provider.edit', $i->id) }}"
                                            wire:navigate><i class="bx bx-edit"></i></a>
                                        <button class="btn btn-sm btn-danger"
                                            @click="$dispatch('confirm-delete', { get_id: {{ $i->id }} })"><i
                                                class="bx bx-trash"></i></button>
                                    </td>
                                    <td>
                                        <img src="{{ asset($i->images) }}" alt="{{ $i->images }}"
                                            style="max-width: 100px">
                                    </td>
                                    {{-- <td>{{ $i->title }}</td> --}}
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <input class="accordion__radio" type="radio" name="accordion-tabs" id="tab-two" />
                <label class="accordion__label" for="tab-two">Maps Image
                    <span class="accordion-tab--status"></span>
                </label>
                <div class="accordion__content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                {{-- <th>Key</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maps as $num => $m)
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('provider.edit', $m->id) }}"
                                            wire:navigate><i class="bx bx-edit"></i></a>
                                        <button class="btn btn-sm btn-danger"
                                            @click="$dispatch('confirm-delete', { get_id: {{ $m->id }} })"><i
                                                class="bx bx-trash"></i></button>
                                    </td>
                                    <td class="text-center"><img src="{{ asset($m->images) }}"
                                            alt="{{ $m->images }}" style="max-width: 800px"></td>
                                    {{-- <td>{{ $m->title }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <input class="accordion__radio" type="radio" name="accordion-tabs" id="tab-three" />
                <label class="accordion__label" for="tab-three">Client Image
                    <span class="accordion-tab--status"></span>
                </label>
                <div class="accordion__content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                {{-- <th>Key</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client as $i => $c)
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('provider.edit', $c->id) }}"
                                            wire:navigate><i class="bx bx-edit"></i></a>
                                        <button class="btn btn-sm btn-danger"
                                            @click="$dispatch('confirm-delete', { get_id: {{ $c->id }} })"><i
                                                class="bx bx-trash"></i></button>
                                    </td>
                                    <td>
                                        <img src="{{ asset($c->images) }}" alt="{{ $c->images }}" width="100px">
                                    </td>
                                    {{-- <td>{{ $c->title }}</td> --}}
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    @include('layouts.component.confirm-delete')

    <div class="modal fade" id="modalImage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="inpTitle">Mark</label>
                                    <div class="form-check  mt-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            wire:model="mark" value="provider" id="flexRadioDefault2">

                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Provider
                                        </label>

                                    </div>

                                    <div class="form-check  mt-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            wire:model="mark" value="maps" id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Maps
                                        </label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            wire:model="mark" value="client" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Client
                                        </label>
                                    </div>
                                    @error('mark')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal" class="btn btn-warning closeBtn"
                            data-bs-dismiss="modal"><i class="bx bx-x"></i> Close</button>
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
    <div class="modal fade" id="modalFaskes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Form Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="store" enctype="multipart/form-data" id="formInp">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12" id="inpList">
                                <div class="form-group mb-2">
                                    <x-componen-form.input-form label='Name' wireModel="name" name="name"
                                        placeholder="Fasilitas Kesehatan" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <x-componen-form.input-form label='Value' type="number" wireModel="value"
                                        name="value" placeholder="200000" />
                                    @error('value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal-provider" class="btn btn-warning closeBtn"
                            data-bs-dismiss="modal"><i class="bx bx-x"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Submit</button>
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


            $wire.on('imageClear', () => {
                $('.dropify').attr('data-default-file', '')
                $('.dropify').dropify();
                var clear = $('.dropify-clear');
                clear.click();
            })
            $('.closeBtn').on('click', function() {
                location.reload()
            })
        </script>
    @endscript
@endpush
