<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Avatar;


class CroppieController extends Component
{
    public $multimedia;

    public $avatars;

    protected $listeners = [
        'saveMultimedia' => 'saveMultimedia', 
        'deleteMultimedia' => 'deleteMultimedia'
    ];

    public function mount() 
    {
        $this->avatars = Avatar::all();
    }

    public function render()
    {
        return view('croppie', ['avatars' => $this->avatars])
            ->extends('layouts.app')
            ->section('content');;
    }

    public function saveMultimedia($blob)
    {
        //yours validations

        try {
            $new_avatar = Avatar::create([
                'image' => base64_encode($blob['image'])
            ]);
            $this->avatars = $this->avatars->prepend($new_avatar);
            $this->dispatchBrowserEvent("message_custom", [
                'message' => 'Avatar added successfully', 
                'has_error' => false
            ]);
        } catch (Exception $error) {
            Log::error($error->getMessage());
            $this->dispatchBrowserEvent("message_custom", [
                'message' => 'Error to save', 
                'has_error' => true
            ]);
        }
    }

}
