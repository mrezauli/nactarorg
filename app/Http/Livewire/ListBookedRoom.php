<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ListBookedRoom extends Component
{
    public $bookings;

    public function render()
    {
        $this->bookings = Booking::where('user_id', Auth::user()->id)->with(['room'])->get();
        return view('livewire.list-booked-room');
    }
}