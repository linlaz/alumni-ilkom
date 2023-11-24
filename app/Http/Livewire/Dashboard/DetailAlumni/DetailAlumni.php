<?php

namespace App\Http\Livewire\Dashboard\DetailAlumni;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class DetailAlumni extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $limitPage = 10;
    public $search = '';
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public $showModal = false;
    public $formAction = '';
    public $idEntity = null;
    public $user;

    protected $listeners = [
        'editButtonFromGlobal' => 'editDetailAlumni',
        'deleteButtonFromGlobal' => 'deleteDetailAlumni',
        'refresh' => '$refresh',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getAllData()
    {
        $data = User::when(!empty($this->search),function($query){
            return $query->where('nama', 'like', '%' . $this->search . '%');
        })->orderBy('nama', 'asc')->paginate($this->limitPage);
        return $data;
    }

     public function resetAll()
    {
        $this->showModal = false;
        $this->formAction = '';
        $this->idEntity = null;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('closeFormModal');
        $this->emit('refresh');
    }

    public function render()
    {
        return view('dashboard.detail-alumni.livewire.detail-alumni',[
            'data'=>$this->getAllData(),
        ]);
    }

    public function editDetailAlumni($idEntity)
    {
        try {
            $user = User::with(['study', 'work'])->findOrFail(decrypt($idEntity));
            $this->user = $user;
            $this->showModal = true;
            $this->formAction = "update";
            $this->dispatchBrowserEvent('openFormModal');
        }catch (\Exception $e) {
            Log::error('error edit ', [
                'error' => $e->getMessage(),
            ]);
            return $this->dispatchBrowserEvent('errorSuccess');
        }
    }
}
