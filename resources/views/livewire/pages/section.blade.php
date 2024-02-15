<div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-0">Active Section In : <span class="text-primary">{{ $app->app_name }}</span></h5>
                    </div>
                    <hr />
                    <table class="table">
                        <thead>
                            @foreach ($section as $side)
                                <tr class="">
                                    <th>
                                        <div class="h5"><i class="{{ $side->section->icon }}"></i>
                                            {{ $side->section->name }}</div>
                                    </th>
                                    <th class="text-end">
                                        <button class="btn btn-danger btn-sm"
                                            @click="$dispatch('confirm-delete', { get_id: {{ $side->id }} })">
                                            <i class="bx bx-trash-alt"></i></button>
                                    </th>
                                </tr>
                            @endforeach
                            <form wire:submit="save">
                                <tr>
                                    <th>
                                        <select type="text" wire:model='newsection' class="form-control form-select">
                                            <option selected>Select New Section</option>
                                            @foreach ($appSection as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th class="text-end">
                                        <button class="btn btn-primary btn-sm" type="submit"><i
                                                class="bx bx-plus "></i></button>
                                    </th>
                                </tr>
                            </form>

                        </thead>
                    </table>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-0">All Section</h5>
                    </div>
                    <hr />
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Icon</th>
                                <th>
                                    @if (auth()->user()->is_admin)
                                        Option
                                    @endif
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allSection as $all)
                                <tr>
                                    <td>{{ $all->name }}</td>
                                    <td>{{ $all->url }}</td>
                                    <td><i class="{{ $all->icon }}"></i> {{ $all->icon }}</td>
                                    <td>
                                        @if (auth()->user()->is_admin)
                                            <button class="btn btn-warning btn-sm">edit</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.component.confirm-delete')
</div>
