<div>
    <form wire:submit.prevent="submit">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 class="mb-0">APP Settings</h5>
                </div>
                <hr />

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <x-componen-form.input-form idInput="app_name" label="Name" wireModel="app_name"
                                placeholder="" name="app_name" classInput="col-sm-10" classLabels="col-sm-2" />
                        </div>
                        <div class="row mb-3">
                            <x-componen-form.input-form idInput="app_url" label="URL" wireModel="app_url"
                                placeholder="" name="app_url" classInput="col-sm-10" classLabels="col-sm-2" />
                        </div>
                        {{-- <div class="row mb-3">
                            <x-componen-form.input-form idInput="app_title" label="Title" wireModel="app_title"
                                placeholder="" name="app_title" classInput="col-sm-10" classLabels="col-sm-2" />
                        </div>
                        <div class="row mb-3">
                            <x-componen-form.input-form idInput="app_sub_title" label="Sub Title"
                                wireModel="app_sub_title" placeholder="" name="app_sub_title" classInput="col-sm-10"
                                classLabels="col-sm-2" />
                        </div> --}}
                        <div class="row mb-3">
                            <x-componen-form.textarea-input label="Address" classInput="col-sm-10"
                                classLabels="col-sm-2" idTextarea="app_address" wireModel="app_address" cols="30"
                                rows="3" placeholder="" />
                        </div>
                        <div class="row mb-3">
                            <x-componen-form.input-form idInput="app_mail" label="Mail" wireModel="app_mail"
                                placeholder="" name="app_mail" classInput="col-sm-10" classLabels="col-sm-2" />
                        </div>
                        <div class="row mb-3">
                            <x-componen-form.input-form idInput="app_phone" label="Phone" wireModel="app_phone"
                                placeholder="" name="app_phone" classInput="col-sm-10" classLabels="col-sm-2" />
                        </div>
                        <div class="row mb-3">
                            <x-componen-form.input-form idInput="app_wa" label="Whatsapp" wireModel="app_wa"
                                placeholder="" name="app_wa" classInput="col-sm-10" classLabels="col-sm-2" />
                        </div>
                        <div class="row mb-3">
                            <x-componen-form.input-form idInput="app_gmaps" label="Gmaps" wireModel="app_gmaps"
                                placeholder="" name="app_gmaps" classInput="col-sm-10" classLabels="col-sm-2" />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <x-componen-form.input-image-dropify label='Logo' wireModel="logo"
                                imageDefault="{{ $logo }}" name="image" />
                        </div>
                        {{-- <div class="form-group mb-3">
                            <x-componen-form.input-image-dropify label='Hero Image' wireModel="app_hero_img"
                                imageDefault="{{ $app_hero_img }}" name="app_hero_img" />
                        </div> --}}

                    </div>
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-between mb-3">
            {{-- <h4></h4> --}}

            <button type="submit" class="btn btn-lg"
                style="background-color: #3652AD; color: white; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
                <i class="bx bx-save"></i>SUBMIT</button>
        </div>
    </form>
</div>
