<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Event;
use App\Models\Proker;
use App\Models\Article;
use App\Models\Contact;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalUser = 0;
    public $getData = false;
    public function loadData(){
        $this->totalUser = User::count();
        $this->getData = true;
    }
    public function render()
    {
        return view('livewire.dashboard');
    }

}
