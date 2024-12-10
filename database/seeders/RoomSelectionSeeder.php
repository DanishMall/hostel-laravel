<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Block;
use App\Models\Unit;
use App\Models\Floor;
use App\Models\Room;
use App\Models\Amenity;

class RoomSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Blocks
        $blockA = Block::create(['name' => 'A']);
        $blockB = Block::create(['name' => 'B']);

        // Create Units
        $unitA1 = Unit::create(['block_id' => $blockA->id, 'name' => '1']);
        $unitA2 = Unit::create(['block_id' => $blockA->id, 'name' => '2']);
        $unitB1 = Unit::create(['block_id' => $blockB->id, 'name' => '1']);

        // Create Floors
        $floorA1U1 = Floor::create([
            'block_id' => $blockA->id,
            'unit_id' => $unitA1->id,
            'number' => 1
        ]);
        $floorA1U2 = Floor::create([
            'block_id' => $blockA->id,
            'unit_id' => $unitA2->id,
            'number' => 1
        ]);

        // Create Amenities
        $amenityWifi = Amenity::create(['name' => 'Free WiFi']);
        $amenityAC = Amenity::create(['name' => 'Air Conditioning']);
        $amenityBalcony = Amenity::create(['name' => 'Balcony']);

        // Create Rooms
        $room1 = Room::create([
            'name' => 'Standard Room',
            'block_id' => $blockA->id,
            'unit_id' => $unitA1->id,
            'floor_id' => $floorA1U1->id,
            'price' => 100.00,
            'status' => 'available'
        ]);
        $room1->amenities()->attach([$amenityWifi->id, $amenityAC->id]);

        $room2 = Room::create([
            'name' => 'Deluxe Room',
            'block_id' => $blockA->id,
            'unit_id' => $unitA2->id,
            'floor_id' => $floorA1U2->id,
            'price' => 150.00,
            'status' => 'available'
        ]);
        $room2->amenities()->attach([$amenityWifi->id, $amenityBalcony->id]);
    }
}
