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
                <h4>All Section</h4>
                <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#inpModal"><i
                        class="bx bx-plus "></i> Add</button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-start">CMS</th>
                        <th colspan="3" class="text-center">Details</th>
                        <th rowspan="2" class="text-start">Action</th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>ICON</th>
                        <th>URL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="{{ $medlinx->count() + 1 }}">Medlinx</td>
                    </tr>
                    @foreach ($medlinx as $item)
                        <tr>
                            <td>{{ $item->section->name }}</td>
                            <td><i class="{{ $item->section->icon }}"></i> {{ $item->section->icon }}</td>
                            <td>{{ $item->section->url }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#inpModal"
                                    wire:click="setEdit({{ $item->section->id }})"> <i class="bx bx-edit"></i></button>
                                <button class="btn btn-sm btn-danger"
                                    @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"> <i
                                        class="bx bx-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td rowspan="{{ $izidok->count() + 1 }}">Izidok</td>
                    </tr>
                    @foreach ($izidok as $item)
                        <tr>
                            <td>{{ $item->section->name }}</td>
                            <td><i class="{{ $item->section->icon }}"></i> {{ $item->section->icon }}</td>
                            <td>{{ $item->section->url }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning"> <i class="bx bx-edit"></i></button>
                                <button class="btn btn-sm btn-danger"> <i class="bx bx-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td rowspan="{{ $iziklaim->count() + 1 }}">iziklaim</td>
                    </tr>
                    @foreach ($iziklaim as $item)
                        <tr>
                            <td>{{ $item->section->name }}</td>
                            <td><i class="{{ $item->section->icon }}"></i> {{ $item->section->icon }}</td>
                            <td>{{ $item->section->url }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning"> <i class="bx bx-edit"></i></button>
                                <button class="btn btn-sm btn-danger"> <i class="bx bx-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layouts.component.confirm-delete')

    <div class="modal fade" id="inpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        wire:ignore.self aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0 text-info" id="staticBackdropLabel">Add Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion">
                        <input class="accordion__radio" type="radio" name="accordion-tabs" id="tab-one" checked />
                        <label class="accordion__label" for="tab-one">ALL Section
                            <span class="accordion-tab--status"></span>
                        </label>
                        <div class="accordion__content">
                            <div class="container mt-3">
                                <form wire:submit="save">
                                    <div class="col-md-12" id="inpList">
                                        <div class="form-group mb-2">
                                            <x-componen-form.input-form label='Name' wireModel="name" name="name"
                                                placeholder="Section" />
                                        </div>
                                        <div class="form-group mb-2">
                                            <x-componen-form.input-form label='URL' wireModel="url" name="url"
                                                placeholder="/section" />
                                        </div>
                                        <div class="form-group mb-2">
                                            <x-componen-form.input-form label='Icon' wireModel="icon" name="icon"
                                                placeholder="bx bx-icon" />
                                        </div>
                                        <div class="form-group mb-2 mt-3">
                                            <label for="cms">To CMS</label>
                                            <select name="cms" id="" class="form-control  form-select"
                                                wire:model="cms">
                                                <option value="0">ALL</option>
                                                <option value="1">Medlinx</option>
                                                <option value="2">Izidok</option>
                                                <option value="3">Iziklaim</option>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="form-group mb-2 mt-3">
                                            <button class="btn btn-primary" type="submit"><i class="bx bx-save"></i>
                                                Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <input class="accordion__radio" type="radio" name="accordion-tabs" id="tab-two" />
                        <label class="accordion__label" for="tab-two">CMS Section
                            <span class="accordion-tab--status"></span>
                        </label>
                        <div class="accordion__content">
                            <div class="container mt-3">
                                <form wire:submit="store">
                                    <div class="col-md-12" id="inpList">
                                        <div class="form-group mb-2 mt-3">
                                            <label for="cms">To CMS</label>
                                            <select name="cms" id="" class="form-control form-select"
                                                wire:model="cms" wire:change="setSection">
                                                <option>--Select cms</option>
                                                <option value="1">Medlinx</option>
                                                <option value="2">Izidok</option>
                                                <option value="3">Iziklaim</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2 mt-3">
                                            <label for="cms">Section</label>
                                            @foreach ($section as $item)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckDefault{{ $item->id }}"
                                                        wire:model="app" value="{{ $item->id }}">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckDefault{{ $item->id }}">{{ $item->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <div class="form-group mb-2 mt-3">
                                            <button class="btn btn-primary" type="submit"><i class="bx bx-save"></i>
                                                Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close-modal" class="btn btn-warning" data-bs-dismiss="modal"><i
                            class="bx bx-x"></i> Close
                    </button>
                </div>
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
            })
        </script>
    @endscript
@endpush
