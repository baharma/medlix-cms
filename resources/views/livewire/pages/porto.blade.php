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
    <div class="card ">


        <div class="accordion">
            <input class="accordion__radio" type="radio" name="accordion-tabs" id="tab-one" checked />
            <label class="accordion__label" for="tab-one">Slider Image
                <span class="accordion-tab--status"></span>
            </label>
            <div class="accordion__content">
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between mb-3">
                            <h5>Portofolio Slider</h5>
                            <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#modalAdd"><i
                                    class="bx bx-plus "></i> Add</button>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <h6>Slider1</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider1 as $item)
                                    <tr>
                                        <td>
                                            <button class="btn btn-sm btn-danger"
                                                @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                                    class="bx bx-trash"></i></button>
                                        </td>
                                        <td>
                                            <div style="height: 100px; overflow:hidden;">
                                                <img src="{{ asset($item->images) }}" alt="image"
                                                    style="max-width: 100px">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Slider 2</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider2 as $item)
                                    <tr>
                                        <td>

                                            <button class="btn btn-sm btn-danger"
                                                @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                                    class="bx bx-trash"></i></button>
                                        </td>
                                        <td>
                                            <div style="height: 100px; overflow:hidden;">
                                                <img src="{{ asset($item->images) }}" alt="image"
                                                    style="max-width: 100px">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <input class="accordion__radio" type="radio" name="accordion-tabs" id="tab-two" />
            <label class="accordion__label" for="tab-two">Penghargaan
                <span class="accordion-tab--status"></span>
            </label>
            <div class="accordion__content">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between mb-3">
                            <h5>Penghargaan</h5>
                            <button class="btn btn-primary btn-sm " data-bs-toggle="modal"
                                data-bs-target="#modalPenghargaan"><i class="bx bx-plus "></i> Add</button>
                        </div>
                    </div>
                    <hr>
                    <div style="display: flex; justify-content: space-around">
                        @foreach ($award as $item)
                            <div class="card" style="width: 18rem;">
                                <div class="card-body text-center">
                                    <img src="{{ asset($item->title) }}" alt="" style="max-width: 80px">
                                    <br>
                                    <img src="{{ asset($item->images) }}" alt="" style="max-width: 50px">
                                    <p class="card-text">
                                        {!! $item->text !!}
                                    </p>
                                </div>
                                <div class="card-footer">

                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalPenghargaan"
                                        wire:click="editAward({{ $item->id }})"><i class="bx bx-edit"></i></button>
                                    <button class="btn btn-sm btn-danger"
                                        @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                            class="bx bx-trash"></i></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <input class="accordion__radio" type="radio" name="accordion-tabs" id="tab-tree" />
            <label class="accordion__label" for="tab-tree">Mitra & Diliput
                <span class="accordion-tab--status"></span>
            </label>
            <div class="accordion__content">
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between mb-3">
                            <h5>Mitra & Diliput</h5>
                            <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#modalAdd"
                                wire:click="setType(slider1)"><i class="bx bx-plus "></i> Add</button>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <h6>Mitra</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mitra as $item)
                                    <tr>
                                        <td>

                                            <button class="btn btn-sm btn-danger"
                                                @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                                    class="bx bx-trash"></i></button>
                                        </td>
                                        <td>
                                            <div style="height: 100px; overflow:hidden;">
                                                <img src="{{ asset($item->images) }}" alt="image"
                                                    style="max-width: 100px">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Diliput</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diliput as $item)
                                    <tr>
                                        <td>

                                            <button class="btn btn-sm btn-danger"
                                                @click="$dispatch('confirm-delete', { get_id: {{ $item->id }} })"><i
                                                    class="bx bx-trash"></i></button>
                                        </td>
                                        <td>
                                            <div style="height: 100px; overflow:hidden;">
                                                <img src="{{ asset($item->images) }}" alt="image"
                                                    style="max-width: 100px">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.component.confirm-delete')

    <livewire:pages.porto.form-penghargaan />
    <livewire:pages.porto.form />
</div>
