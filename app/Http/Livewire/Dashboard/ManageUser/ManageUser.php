<?php

namespace App\Http\Livewire\Dashboard\ManageUser;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class ManageUser extends Component
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


    public $nama = '';
    public $email = '';
    public $is_active = false;
    public $role = [];
    public $peran = '';


    protected $listeners = [
        'editButtonFromGlobal' => 'editUser',
        'deleteButtonFromGlobal' => 'deleteUser',
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
        $this->nama = '';
        $this->email = '';
        $this->is_active = '';
        $this->peran = '';
        $this->showModal = false;
        $this->formAction = '';
        $this->idEntity = null;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('closeFormModal');
        $this->emit('refresh');
    }

    public function render()
    {
        return view('dashboard.manage-users.livewire.manage-user',[
            'data'=>$this->getAllData(),
        ]);
    }

    public function editUser($idEntity)
    {
        try {
            $user = User::findOrFail(decrypt($idEntity));
            $this->idEntity = encrypt($user->id);
            $this->nama = $user->nama;
            $this->email = $user->email;
            $this->is_active = $user->is_active;
            $this->peran = $user->getRoleNames()->first();
            if (empty($this->role)) {
                $this->role = Role::all();
            }
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

    public function updateUser()
    {
        $this->validate([
            'peran' => ['required'],
            'is_active' => ['required'],
        ]);

        try{
            $user = User::findOrFail(decrypt($this->idEntity));
            $user->update([
                'is_active' => $this->is_active,
            ]);
            $user->syncRoles($this->peran);
            $this->resetAll();
            $this->dispatchBrowserEvent('messageSuccess');
        }catch (\Exception $e) {
            Log::error('error update', [
                'error' => $e->getMessage(),
            ]);
            return $this->dispatchBrowserEvent('errorSuccess');
        }
    }

    public function deleteUser($idEntity)
    {
        try {
            $user = User::findOrFail(decrypt($idEntity));
            $user->delete();
            $this->emit('refresh');
            $this->dispatchBrowserEvent('messageSuccess');
        } catch (\Exception $e) {
            Log::error('error deleting', [
                'error' => $e->getMessage(),
            ]);
            return $this->dispatchBrowserEvent('errorSuccess');
        }
    }



}
