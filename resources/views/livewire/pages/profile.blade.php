<div>
    <div class="card col-md-4">
        <form action="" wire:submit="save">
            <div class="card-body">
                <div class="col-md-12" id="inpList">
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" wire:model="name" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="name">Email</label>
                        <input type="email" wire:model="email" class="form-control">
                    </div>
                    <div style="display: flex; align-items: center;" class="mt-4">
                        <h6 style="margin-right: 10px;">Update Password</h6>
                        <hr style="flex-grow: 1; border: none; border-top: 1px solid black;">
                    </div>

                    <div class="form-group mb-2 mr-3">
                        <label for="name">Password</label>
                        <input type="password" wire:model="password" class="form-control">
                    </div>
                    <div class="form-group mb-2 mr-3">
                        <label for="name">Retype Password</label>
                        <input type="password" wire:model="password_confirmation" class="form-control">
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Update</button>
            </div>
        </form>
    </div>
</div>
