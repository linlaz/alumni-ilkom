<div wire:init="fetchData">
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="accordion mb-2 working-user" id="works">
        <div class="accordion-item">
            <h2 class="accordion-header" id="working">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#working-user-detail" aria-expanded="false" aria-controls="working-user-detail">
                Kerja
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
            <div id="working-user-detail" class="accordion-collapse collapse" aria-labelledby="working" data-bs-parent="#works" wire:ignore.self>
                <div class="accordion-body">
                   <form action="">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <x-input name="nama_perusahaan" label="Nama Perusahaan *"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <x-input name="jabatan" label="Jabatan *"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <x-input name="tahun_masuk" label="Tahun Masuk *"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="phone-column">jobdesk *</label>
                                <textarea class="form-control" rows="3" wire:model="jobdesk"></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary me-1 mb-1" wire:click="checkSubmit">
                                @if (is_null($workingId))
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
