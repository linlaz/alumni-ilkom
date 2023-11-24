<div wire:init="fetchUser">
    {{-- Success is as dangerous as failure. --}}
    <div class="accordion mb-2 profile-user" id="profiles">
        <div class="accordion-item">
            <h2 class="accordion-header" id="profile">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#profile-user-detail" aria-expanded="false" aria-controls="profile-user-detail">
                Profile
                </button>
            </h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div id="profile-user-detail" class="accordion-collapse collapse" aria-labelledby="profile" data-bs-parent="#profiles" wire:ignore>
                <div class="accordion-body">
                    <form class="form">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <x-input name="nama" label="Name" readonly="true"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <x-input name="email" label="Email" readonly="true"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <x-input name="nim" label="NIM" readonly="true"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <x-input name="tahun_masuk" label="Tahun Masuk" readonly="true"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <x-input name="nomor" type="number" label="Nomor Handphone *"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <x-select name="aktifitas_sekarang" label="Aktivitas Sekarang *">
                                        <option value="kuliah">Kuliah</option>
                                        <option value="kerja">Kerja</option>
                                        <option value="kuliah-kerja">Kuliah dan Kerja</option>
                                    </x-select>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="phone-column">Alamat Sekarang *</label>
                                <textarea class="form-control" rows="3" wire:model="alamat"></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary me-1 mb-1" wire:click="updateProfile">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
