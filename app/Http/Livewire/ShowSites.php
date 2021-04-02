<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Site;

class ShowSites extends Component
{
	public $site_id, $url, $keyword;
    protected $rules = [
        'url' => 'required|url'
    ];

	public $isOpenCreateModal = false;
	public $confirmDeleteModal = false;

    public function render()
    {
    	$sites = Site::all();
        return view('livewire.show-sites',compact(['sites']));
    }

    public function create()
    {
    	$this->isOpenCreateModal = true;
    }

    public function edit($id)
    {
    	$site = Site::findOrFail($id);
    	$this->site_id = $site->id;
    	$this->url = $site->url;
    	$this->keyword = $site->keyword;
    	$this->isOpenCreateModal = true;
    }

    public function store(Request $req)
    {
    	$this->validate();
    	$user = $req->user();
    	$user->sites()->updateOrCreate(['id'=>$this->site_id],['url'=>$this->url,'keyword'=>$this->keyword]);
    	$this->isOpenCreateModal = false;
    	$this->resetInputs();
    }

    public function resetInputs()
    {
    	$this->site_id = null;
    	$this->url = null;
    	$this->keyword = null;
    }

    public function confirmDelete($id)
    {
    	$this->site_id = $id;
    	$this->confirmDeleteModal = true;
    }

    public function deleteSite()
    {
    	Site::where('id',$this->site_id)->delete();
    	$this->resetInputs();
    	$this->confirmDeleteModal = false;
    }
}
