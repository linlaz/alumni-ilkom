<x-auth-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card-auth mx-auto my-5">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nama *') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="ilmu komputer">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email *') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="ilmukomputer@ipb.ac.id"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nim"
                                    class="col-md-4 col-form-label text-md-end">{{ __('NIM *') }}</label>
                                <div class="col-md-6">
                                    <input id="nim" type="text" placeholder="076*****"
                                        class="form-control @error('nim') is-invalid @enderror" name="nim"
                                        value="{{ old('nim') }}" required autocomplete="nim">
                                    <div id="nimHelp" class="form-text">Diawali 07, setelahnya 5 atau 6, panjang maximal 13</div>

                                    @error('nim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tahun_masuk"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Tahun Masuk *') }}</label>
                                <div class="col-md-6">
                                    <input id="tahun_masuk" type="number" placeholder="2020"
                                        class="form-control @error('tahun_masuk') is-invalid @enderror" name="tahun_masuk"
                                        value="{{ old('tahun_masuk') }}" required autocomplete="tahun_masuk">

                                    @error('tahun_masuk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password *') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation mb-3">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="*****" id="password" aria-describedby="basic-addon2"
                                            autocomplete="new-password" required>
                                            <button type="button" class="input-group-text" id="basic-addon2" onclick="changeType('password')"><i
                                                class="bi bi-eye-fill"></i></button>
                                        @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Konfirmasi Password *') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation mb-3">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password_confirmation" placeholder="*****" id="confirm-password"
                                            aria-describedby="basic-addon2" autocomplete="new-password" required>
                                            <button type="button" class="input-group-text" id="basic-addon2" onclick="changeType('confirm-password')"><i
                                                class="bi bi-eye-fill"></i></button>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function changeType(id) {
                let type = $(`#${id}`).attr('type');
                if (type == 'text') {
                    $(`#${id}`).attr('type', 'password');
                } else {
                    $(`#${id}`).attr('type', 'text');
                }
            }
        </script>
    @endpush
</x-auth-layout>
