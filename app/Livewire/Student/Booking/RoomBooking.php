<?php

namespace App\Livewire\Student\Booking;

use Carbon\Carbon;
use Livewire\Component;

class RoomBooking extends Component
{
    public $selectedRoom = '';
    public $checkIn = '';
    public $checkOut = '';
    public $showPriceBreakdown = false;

    public $rooms = [
        [
            'id' => 1,
            'name' => 'Standard Single Room',
            'price' => 50.00,
            'amenities' => ['Single Bed', 'Study Desk', 'Shared Bathroom']
        ],
        [
            'id' => 2,
            'name' => 'Deluxe Single Room',
            'price' => 75.00,
            'amenities' => ['Single Bed', 'Study Desk', 'Private Bathroom', 'Mini Fridge']
        ],
        [
            'id' => 3,
            'name' => 'Twin Sharing Room',
            'price' => 40.00,
            'amenities' => ['Two Single Beds', '2 Study Desks', 'Shared Bathroom']
        ]
    ];

    protected $rules = [
        'selectedRoom' => 'required|integer|min:1',
        'checkIn' => 'required|date|after_or_equal:today',
        'checkOut' => 'required|date|after:checkIn',
    ];

    protected $messages = [
        'selectedRoom.required' => 'Please select a room.',
        'checkIn.required' => 'Check-in date is required.',
        'checkIn.after_or_equal' => 'Check-in date must be today or later.',
        'checkOut.required' => 'Check-out date is required.',
        'checkOut.after' => 'Check-out date must be after check-in date.',
    ];

    public function getNumberOfNightsProperty()
    {
        return $this->calculateTotalNights();
    }

    public function getRoomPriceProperty()
    {
        $room = collect($this->rooms)->firstWhere('id', (int)$this->selectedRoom);
        return $room ? $room['price'] : 0;
    }

    public function getTotalProperty()
    {
        return $this->calculateTotal();
    }

    public function getSelectedRoomDetailsProperty()
    {
        return collect($this->rooms)->firstWhere('id', (int)$this->selectedRoom);
    }

    public function mount()
    {
        $this->checkIn = Carbon::today()->format('Y-m-d');
        $this->checkOut = Carbon::tomorrow()->format('Y-m-d');
    }

    protected function calculateTotalNights()
    {
        if (!$this->checkIn || !$this->checkOut) {
            return 0;
        }

        $start = Carbon::parse($this->checkIn);
        $end = Carbon::parse($this->checkOut);
        return $end->diffInDays($start);
    }

    protected function calculateTotal()
    {
        $nights = $this->calculateTotalNights();
        return $this->roomPrice * $nights;
    }

    public function updatedCheckIn($value)
    {
        if ($this->checkOut && Carbon::parse($this->checkOut)->lte(Carbon::parse($value))) {
            $this->checkOut = Carbon::parse($value)->addDay()->format('Y-m-d');
        }
        $this->validateOnly('checkIn');
    }

    public function updatedCheckOut($value)
    {
        $this->validateOnly('checkOut');
    }

    public function updatedSelectedRoom($value)
    {
        $this->validateOnly('selectedRoom');
    }

    public function togglePriceBreakdown()
    {
        $this->showPriceBreakdown = !$this->showPriceBreakdown;
    }

    public function book()
    {
        $this->validate();

        // Add your booking logic here
        // Example:
        // Booking::create([
        //     'room_id' => $this->selectedRoom,
        //     'check_in' => $this->checkIn,
        //     'check_out' => $this->checkOut,
        //     'total_nights' => $this->numberOfNights,
        //     'total_price' => $this->total,
        //     'user_id' => auth()->id(),
        // ]);

        session()->flash('message', 'Room booked successfully!');
        session()->flash('message-type', 'success');

        // Reset the form
        $this->reset(['selectedRoom', 'showPriceBreakdown']);
        $this->checkIn = Carbon::today()->format('Y-m-d');
        $this->checkOut = Carbon::tomorrow()->format('Y-m-d');
    }

    public function isRoomAvailable($roomId, $checkIn, $checkOut)
    {
        // Add your availability check logic here
        // Example:
        // return !Booking::where('room_id', $roomId)
        //     ->where(function ($query) use ($checkIn, $checkOut) {
        //         $query->whereBetween('check_in', [$checkIn, $checkOut])
        //             ->orWhereBetween('check_out', [$checkIn, $checkOut]);
        //     })->exists();
        return true;
    }

    public function render()
    {
        return view('livewire.student.booking.index', [
            'numberOfNights' => $this->numberOfNights,
            'roomPrice' => $this->roomPrice,
            'total' => $this->total,
            'selectedRoomDetails' => $this->selectedRoomDetails,
        ]);
    }
}
