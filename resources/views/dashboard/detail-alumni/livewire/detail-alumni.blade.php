<div>
    {{-- Be like water. --}}
    <section class="section">
        <div class="card">
            <div class="card-header d-flex flex-column ">
                <div class="mt-3 d-md-inline-flex">
                    <div>
                        Total Data : {{$data->count()}}
                    </div>
                    <div class="search row ms-auto me-3 mt-3 mt-sm-0">
                        <label for="staticEmail" class="d-none d-sm-flex col col-form-label">Cari</label>
                        <div class="col-12 col-sm-9">
                            <input type="text" class="form-control" id="inputPassword" wire:model="search"
                                placeholder="Nama">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover rounded-md" id="table1">
                        <thead>
                            <tr class="table-secondary">
                                <th>Nama</th>
                                <th>Email</th>
                                <th>NIM</th>
                                <th>Aktifitas Sekarang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-hover">
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ @$item->aktifitas_sekarang }}</td>
                                    <td>
                                        <span><button type="button"
                                                class="btn btn-outline-secondary m-1"
                                                id="editButton{{ encrypt($item->id) }}">Lihat</button></span>


                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <h4>Data Tidak Di Temukan</h4>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-modal name="{{ $formAction }} Info" wire:model="{{ $formAction }}" kirim="0">
       <div class="card">
        <h4>Profil </h4>
        <hr>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <x-input name="nama" label="Name" readonly="1" value="{{ @$user->nama }}" needLivewire="0" disabled="1"/>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <x-input name="email" label="Email" readonly="1" value="{{ @$user->email }}" needLivewire="0" disabled="1"/>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <x-input name="nim" label="NIM" readonly="1" value="{{ @$user->nim }}" needLivewire="0" disabled="1"/>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <x-input name="tahun_masuk" label="Tahun Masuk" readonly="1" value="{{ @$user->tahun_masuk }}" needLivewire="0" disabled="1"/>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <x-input name="nomor" type="number" label="Nomor Handphone *" readonly="1" value="{{ @$user->nomor }}" needLivewire="0" disabled="1"/>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group mb-3">
                    <label for="aktifitas_sekarang" class="form-label">
                        <h6>Aktivitas Sekarang</h6>
                    </label>
                    <select class="form-control" name="nomor" disabled>
                        <option value="kuliah" {{ @$user->nomor === 'kuliah' ? 'selected' : '' }}>Kuliah</option>
                        <option value="kerja" {{ @$user->nomor === 'kerja' ? 'selected' : '' }}>Kerja</option>
                        <option value="kuliah-kerja" {{ @$user->nomor === 'kuliah-kerja' ? 'selected' : '' }}>Kuliah dan Kerja</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-12">
                <label for="phone-column">Alamat Sekarang *</label>
                <textarea class="form-control" rows="3" disabled> {{ @$user->alamat }}</textarea>
            </div>
        </div>
       </div>
       <div class="card mt-5">
            <h4>Kuliah </h4>
            <hr>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-input name="nama_kampus" label="Nama Kampus" readonly="1" value="{{ @$user->study->nama_kampus }}" needLivewire="0" disabled="1"/>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-input name="jurusan" label="Jurusan" readonly="1" value="{{ @$user->study->jurusan }}" needLivewire="0" disabled="1"/>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <x-input name="tahun_masuk" label="Tahun Masuk" readonly="1" value="{{ @$user->study->tahun_masuk }}" needLivewire="0" disabled="1"/>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="phone-column">Alamat Sekarang *</label>
                        <textarea class="form-control" rows="3" disabled>{{ @$user->study->alamat }}</textarea>
                    </div>
                </div>
            </div>
       </div>
       <div class="row">
        <h4>Kerja </h4>
        <hr>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <x-input name="nama_perusahaan" label="Nama Perusahaan *" readonly="1" value="{{ @$user->work->nama_perusahaan }}" needLivewire="0" disabled="1"/>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <x-input name="jabatan" label="Jabatan *" readonly="1" value="{{ @$user->work->jabatan }}" needLivewire="0" disabled="1"/>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <x-input name="tahun_masuk" label="Tahun Masuk *" readonly="1" value="{{ @$user->work->tahun_masuk }}" needLivewire="0" disabled="1"/>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="phone-column">jobdesk *</label>
                    <textarea class="form-control" rows="3" disabled>{{ @$user->work->jobdesk }}</textarea>
                </div>
            </div>
        </div>
       </div>
    </x-modal>
</div>
