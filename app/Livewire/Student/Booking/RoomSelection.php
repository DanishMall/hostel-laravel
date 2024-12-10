<?php

namespace App\Livewire\Student\Booking;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class RoomSelection extends Component
{
    public $blocks = [];
    public $units = [];
    public $floors = [];

    public $selectedBlock = '';
    public $selectedUnit = '';
    public $selectedFloor = '';
    public $selectedRoom = null;

    public $rooms = [];

    public function mount()
    {
        $this->blocks = $this->getBlocks();
    }

    public function updatedSelectedBlock($block)
    {
        $this->reset(['selectedUnit', 'selectedFloor', 'selectedRoom', 'units', 'floors', 'rooms']);

        if ($block) {
            $this->units = $this->getUnitsForBlock($block);
        }
    }

    public function updatedSelectedUnit($unit)
    {
        $this->reset(['selectedFloor', 'selectedRoom', 'floors', 'rooms']);

        if ($unit) {
            $this->floors = $this->getFloorsForUnit($this->selectedBlock, $unit);
        }
    }

    public function updatedSelectedFloor($floor)
    {
        $this->selectedRoom = null;

        if ($floor) {
            $this->rooms = $this->getRooms($this->selectedBlock, $this->selectedUnit, $floor);
        } else {
            $this->rooms = [];
        }
    }

    public function selectRoom($roomId)
    {
        $this->selectedRoom = $roomId;
        $this->dispatch('roomSelected', ['roomId' => $roomId]);
    }

    public function resetSelection()
    {
        $this->reset([
            'selectedBlock',
            'selectedUnit',
            'selectedFloor',
            'selectedRoom',
            'units',
            'floors',
            'rooms'
        ]);
    }

    private function getBlocks()
    {
        return ['A', 'B', 'C', 'D', 'E', 'F'];
    }

    private function getUnitsForBlock($block)
    {
        return ['U1', 'U2', 'U3', 'U4', 'U5', 'U6', 'U7', 'U8'];
    }

    private function getFloorsForUnit($block, $unit)
    {
        return ['F1', 'F2', 'F3', 'F4'];
    }

    private function getRooms($block, $unit, $floor)
    {
        // Simulate room data - in production, this would come from your database
        return [
            [
                'id' => "room_{$block}_{$unit}_{$floor}_1",
                'name' => "Room {$block}-101",
                'block' => $block,
                'unit' => $unit,
                'floor' => $floor,
                'photos' => [
                    '/storage/rooms/room1-main.jpg',
                    '/storage/rooms/room1-bathroom.jpg',
                    '/storage/rooms/room1-desk.jpg'
                ],
                'amenities' => [
                    'Air Conditioning',
                    'Private Bathroom',
                    'Study Desk',
                    'High-Speed Internet'
                ],
                'status' => 'available',
                'capacity' => '2 Person',
                'room_type' => 'Standard Twin'
            ],
            [
                'id' => "room_{$block}_{$unit}_{$floor}_2",
                'name' => "Room {$block}-102",
                'block' => $block,
                'unit' => $unit,
                'floor' => $floor,
                'photos' => [
                    '/storage/rooms/room1-main.jpg',
                    '/storage/rooms/room1-bathroom.jpg',
                    '/storage/rooms/room1-desk.jpg'
                ],
                'amenities' => [
                    'Air Conditioning',
                    'Shared Bathroom',
                    'Study Desk',
                    'High-Speed Internet',
                    'Mini Fridge'
                ],
                'status' => 'available',
                'capacity' => '1 Person',
                'room_type' => 'Standard Single'
            ],
            [
                'id' => "room_{$block}_{$unit}_{$floor}_3",
                'name' => "Room {$block}-103",
                'block' => $block,
                'unit' => $unit,
                'floor' => $floor,
                'photos' => [
                    '/storage/rooms/room1-main.jpg',
                    '/storage/rooms/room1-bathroom.jpg',
                    '/storage/rooms/room1-desk.jpg'
                ],
                'amenities' => [
                    'Air Conditioning',
                    'Private Bathroom',
                    'Study Desk',
                    'High-Speed Internet',
                    'Balcony View'
                ],
                'status' => 'available',
                'capacity' => '2 Person',
                'room_type' => 'Standard Twin'
            ]
        ];
    }

    public function render()
    {
        return view('livewire.student.booking.room-selection');
    }
}
