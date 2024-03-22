<div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h4>All Users</h4>
                <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#inpModal" wire:click='clear'><i
                        class="bx bx-plus "></i> Add</button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Access</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                        @php
                            $access = json_decode($u->access, true);
                            $data = '';
                            foreach ($access['app_id'] as $value) {
                                if ($value == 1) {
                                    $data .= '<span class="badge bg-info">Medlinx</span> <br>';
                                }
                                if ($value == 2) {
                                    $data .= '<span class="badge bg-info">Izidok</span><br>';
                                }
                                if ($value == 3) {
                                    $data .= '<span class="badge bg-info">Iziklaim</span><br>';
                                }
                            }
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{!! $data !!}</td>
                            <td>
                                {!! $u->is_admin ? '<span class="badge bg-warning">Admin</span><br>' : '' !!}
                                {!! $u->status
                                    ? '<span class="badge bg-primary">Active</span><br>'
                                    : '<span class="badge bg-danger">Non Active</span><br>' !!}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning" wire:click="setEdit({{ $u->id }})"
                                    data-bs-toggle="modal" data-bs-target="#inpModal"><i
                                        class="bx bx-edit"></i></button>
                                <button class="btn btn-sm btn-danger"
                                    @click="$dispatch('confirm-delete', { get_id: {{ $u->id }} })"><i
                                        class="bx bx-trash"></i></button>
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
                <form wire:submit="save">
                    <div class="modal-body row">
                        <div class="col-md-12" id="inpList">
                            <div class="form-group mb-2">
                                <x-componen-form.input-form label='Name' wireModel="name" name="name"
                                    placeholder="Name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <x-componen-form.input-form label='Email' type="email" wireModel="email"
                                    name="email" placeholder="email@mail.com" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <x-componen-form.input-form label='Password' type="text" wireModel="password"
                                    name="password" placeholder="password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2 mt-3">
                                <label for="cms">Access</label>
                                <br>
                                @error('access')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @foreach ($cms as $item)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckDefault{{ $item->id }}" wire:model="access"
                                            value="{{ $item->id }}">
                                        <label class="form-check-label"
                                            for="flexSwitchCheckDefault{{ $item->id }}">{{ $item->app_name }}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2 mt-3">
                                <label for="">Is Admin</label>
                                <br>
                                @error('admin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        wire:model="admin" value="1" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Yes
                                    </label>

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" wire:model="admin" value="0" type="radio"
                                        name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        No
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-modal" class="btn btn-warning" data-bs-dismiss="modal"><i
                                class="bx bx-x"></i> Close</button>
                        <button class="btn btn-primary" type="submit"><i class="bx bx-save"></i>
                            Submit</button>
                    </div>
            </div>

            </form>
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
