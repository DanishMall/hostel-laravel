<?php

namespace App\Livewire\Student\Booking;

use Livewire\Component;

class SemesterHostel extends Component
{
    public $longSemesterOpen = false;
    public $shortSemesterOpen = false;

    public function toggleLongSemester(): void
    {
        $this->longSemesterOpen = !$this->longSemesterOpen;
    }

    public function toggleShortSemester(): void
    {
        $this->shortSemesterOpen = !$this->shortSemesterOpen;
    }

    public function bookHostel($semesterType): void
    {
        // Add booking logic here
        $this->emit('hostelBooked', $semesterType);
    }

    public function render()
    {
        return view('livewire.student.booking.semester-hostel');
    }
}
