<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProfileUser extends Component
{
    public $isFetch = false;
    public $nama = '';
    public $email = '';
    public $nim = '';
    public $tahun_masuk = '';
    public $aktifitas_sekarang = '';
    public $alamat = '';
    public $nomor = '';

    public function fetchUser(){
        $this->isFetch = true;
        $user = Auth::user();
        $this->fill($user->only([
            'nama', 'email', 'nim', 'tahun_masuk', 'aktifitas_sekarang', 'alamat', 'nomor'
        ]));
    }

    public function render()
    {
        return view('livewire.profile-user');
    }

    public function updateProfile() {
        $this->validate([
            'aktifitas_sekarang' => 'required|string|in:kuliah,kerja,kuliah-kerja',
            'alamat' => 'required|string|max:255',
            'nomor' => 'required|string|max:15',
        ]);
        try {
            $user = User::findOrFail(Auth::id());
            $reloadHard = $user->aktifitas_sekarang === $this->aktifitas_sekarang;
            $user->update([
                'aktifitas_sekarang' => $this->aktifitas_sekarang,
                'alamat' => $this->alamat,
                'nomor' => $this->nomor,
            ]);
            if (!$reloadHard) {
                return redirect(request()->header('Referer'));
            }
            $this->emit('refresh');
            $this->dispatchBrowserEvent('messageSuccess');
        } catch (\Throwable $th) {
            Log::error('update profile ', [
                'error' => $th->getMessage(),
            ]);
            $this->dispatchBrowserEvent('errorSuccess');
        }


    }
}
