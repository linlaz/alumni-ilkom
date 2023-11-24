<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Working as WorkingModel;

class Working extends Component
{
    public $nama_perusahaan = '';
    public $tahun_masuk = '';
    public $jabatan = '';
    public $jobdesk = '';
    public $workingId = null;

    public function render()
    {
        return view('livewire.working');
    }

    public function checkSubmit()
    {
        if (is_null($this->workingId)) {
            $this->insertWorking();
        } else {
            $this->updateWorking();
        }
    }

    public function fetchData()
    {
        $working = WorkingModel::where('user_id', Auth::id())->first();
        if (!is_null($working)) {
            $this->nama_perusahaan = $working->nama_perusahaan;
            $this->tahun_masuk = $working->tahun_masuk;
            $this->jabatan = $working->jabatan;
            $this->jobdesk = $working->jobdesk;
            $this->workingId = encrypt($working->id);
        }
    }

    public function insertWorking()
    {
        $this->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'tahun_masuk' => 'required|numeric',
            'jabatan' => 'required|string|max:255',
            'jobdesk' => 'required|string|max:255',
        ]);

        WorkingModel::create([
            'user_id' => Auth::id(),
            'nama_perusahaan' => $this->nama_perusahaan,
            'tahun_masuk' => $this->tahun_masuk,
            'jabatan' => $this->jabatan,
            'jobdesk' => $this->jobdesk,
        ]);

        $this->fetchData();
        $this->emit('refresh');
    }

    public function updateWorking()
    {
        $this->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'tahun_masuk' => 'required|numeric',
            'jabatan' => 'required|string|max:255',
            'jobdesk' => 'required|string|max:255',
        ]);

        $workingId = decrypt($this->workingId);

        WorkingModel::where('id', $workingId)
            ->update([
                'nama_perusahaan' => $this->nama_perusahaan,
                'tahun_masuk' => $this->tahun_masuk,
                'jabatan' => $this->jabatan,
                'jobdesk' => $this->jobdesk,
            ]);

        $this->fetchData();
        $this->emit('refresh');
    }
}
