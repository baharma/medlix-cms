@extends('auth.partials.app-auth')
@section('content')
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
        <div class="col mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">
                            <h3 class="">Sign in</h3>

                        </div>

                        <div class="login-separater text-center mb-4"> <span> SIGN IN WITH EMAIL</span>
                            <hr />
                        </div>
                        @error('credentials')
                            <div class="alert alert-warning text-center" role="alert">

                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-body">
                            <form class="row g-3" action="{{ route('auth.post') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                    <input type="email" class="form-control  @error('email') is-invalid  @enderror"
                                        id="inputEmailAddress" placeholder="Email Address" name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Enter
                                        Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password"
                                            class="form-control border-end-0  @error('password')  is-invalid @enderror"
                                            name="password" id="inputChoosePassword" placeholder="Enter Password"> <a
                                            href="javascript:;" class="input-group-text bg-transparent"><i
                                                class='bx bx-hide'></i></a>
                                        @error('password')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end"> <a href="#">Forgot Password ?</a>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign
                                            in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
