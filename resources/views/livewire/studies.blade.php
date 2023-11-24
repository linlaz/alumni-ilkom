<div wire:init="fetchData">
    {{-- In work, do what you enjoy. --}}
    <div class="accordion mb-2 study-user" id="studies">
        <div class="accordion-item">
            <h2 class="accordion-header" id="study">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#study-user-detail" aria-expanded="false" aria-controls="study-user-detail">
                Kuliah
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

            <div id="study-user-detail" class="accordion-collapse collapse" aria-labelledby="study" data-bs-parent="#studies" wire:ignore.self>
                <div class="accordion-body">
                   <form action="">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <x-input name="nama_kampus" label="Nama Kampus"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <x-input name="jurusan" label="Jurusan"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <x-input name="tahun_masuk" label="Tahun Masuk"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="phone-column">Alamat Sekarang *</label>
                                <textarea class="form-control" rows="3" wire:model="alamat_kampus"></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary me-1 mb-1" wire:click="checkSubmit">
                            @if (is_null($studiesId))
                                Submit
                            @else
                                Update
                            @endif
                            </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
