<?php

namespace App\Livewire;

use Livewire\Attributes\Session;
use App\Models\todo;
use Livewire\Component;

class TodoList extends Component
{
    #[Session(key:'search')] 
    public $title ='';
    public $id_todo = 0;
    public $isEdit = false;
    public $search ='';
    
    public function save(){

        $this->validate([
            'title' => 'required'
        ],[
            'required' => 'Data tidak boleh kosong'
        ]);

        if ($this->id_todo !== 0) {
            todo::find($this->id_todo)->update(['title' => $this->title]);
            session()->flash('berhasil','Data berhasil diedit');

        }else{
            todo::create(['title' => $this->title]);
            session()->flash('berhasil','Data berhasil ditambah');
        }

        $this->reset();
    }

    public function edit($id){
        $todo = todo::find($id);
        $this->title = $todo->title; 
        $this->id_todo = $todo->id;
        $this->isEdit = true;       
    }

    public function delete($id){
        todo::find($id)->delete();
    }

    public function hapusSession(){
        session()->flash('');
    }
    
    public function render()
    {
        return view('livewire.todo-list',[
            'todos' => $this->search == '' ? todo::all():
            todo::where('title','like','%'.$this->search.'%')->get()
        ]);
    }
}
