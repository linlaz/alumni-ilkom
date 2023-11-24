<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Studies as ModelsStudies;

class Studies extends Component
{
    public $nama_kampus = '';
    public $jurusan = '';
    public $tahun_masuk = '';
    public $alamat_kampus = '';
    public $studiesId = null;

    public function render()
    {
        return view('livewire.studies');
    }

    public function checkSubmit()
    {
        if (is_null($this->studiesId)) {
            $this->insertStudies();
        } else {
            $this->updateStudies();
        }
    }

    public function fetchData()
    {
        $studies = ModelsStudies::where('user_id', Auth::id())->first();
        if (!is_null($studies)) {
            $this->nama_kampus = $studies->nama_kampus;
            $this->jurusan = $studies->jurusan;
            $this->tahun_masuk = $studies->tahun_masuk;
            $this->studiesId = encrypt($studies->id);
            $this->alamat_kampus = $studies->alamat;
        }
    }

    public function insertStudies()
    {
        $this->validate([
            'nama_kampus' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_masuk' => 'required|numeric|digits:4',
            'alamat_kampus' => 'required|string|max:255',
        ]);

        ModelsStudies::create([
            'user_id' => Auth::id(),
            'nama_kampus' => $this->nama_kampus,
            'jurusan' => $this->jurusan,
            'tahun_masuk' => $this->tahun_masuk,
            'alamat' => $this->alamat_kampus,
        ]);

        $this->fetchData();
        $this->emit('refresh');
    }

    public function updateStudies()
    {
        $this->validate([
            'nama_kampus' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_masuk' => 'required|numeric|digits:4',
            'alamat_kampus' => 'required|string|max:255',
        ]);

        $studiesId = decrypt($this->studiesId);

        ModelsStudies::where('id', $studiesId)
            ->update([
                'nama_kampus' => $this->nama_kampus,
                'jurusan' => $this->jurusan,
                'tahun_masuk' => $this->tahun_masuk,
                'alamat' => $this->alamat_kampus,
            ]);

        $this->fetchData();
        $this->emit('refresh');
    }
}
