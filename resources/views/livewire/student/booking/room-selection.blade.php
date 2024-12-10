<div>
    <!-- Location Filter Section -->
    <div style="margin-bottom: 1.5rem; padding: 1rem; border: 1px solid #e5e7eb; border-radius: 0.5rem; background-color: white; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">
        <h2 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 1rem;">Select Room Location</h2>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
            <!-- Block Selection -->
            <div>
                <label style="display: block; font-size: 0.875rem; color: #6b7280; margin-bottom: 0.5rem;">Block</label>
                <select
                    wire:model.live="selectedBlock"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.25rem;"
                >
                    <option value="">Select Block</option>
                    @foreach($blocks as $block)
                        <option value="{{ $block }}">Block {{ $block }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Unit Selection -->
            <div>
                <label style="display: block; font-size: 0.875rem; color: #6b7280; margin-bottom: 0.5rem;">Unit</label>
                <select
                    wire:model.live="selectedUnit"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.25rem;"
                    {{ !$selectedBlock ? 'disabled' : '' }}
                >
                    <option value="">Select Unit</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit }}">Unit {{ $unit }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Floor Selection -->
            <div>
                <label style="display: block; font-size: 0.875rem; color: #6b7280; margin-bottom: 0.5rem;">Floor</label>
                <select
                    wire:model.live="selectedFloor"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.25rem;"
                    {{ !$selectedUnit ? 'disabled' : '' }}
                >
                    <option value="">Select Floor</option>
                    @foreach($floors as $floor)
                        <option value="{{ $floor }}">Floor {{ $floor }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Reset Button -->
        <div style="margin-top: 1rem; text-align: right;">
            <button
                wire:click="resetSelection"
                style="padding: 0.5rem 1rem; background-color: #e5e7eb; color: #1f2937; border-radius: 0.25rem; border: none; cursor: pointer; transition: background-color 0.2s;"
                onmouseover="this.style.backgroundColor='#d1d5db';"
                onmouseout="this.style.backgroundColor='#e5e7eb';"
            >
                Reset Selection
            </button>
        </div>
    </div>

    <!-- Rooms Display Section -->
    <div style="display: grid; gap: 1.5rem;">
        @if($selectedBlock && $selectedUnit && $selectedFloor)
            @forelse($rooms as $room)
                <div
                    wire:click="selectRoom('{{ $room['id'] }}')"
                    style="padding: 1rem; border: 1px solid {{ $selectedRoom == $room['id'] ? '#3b82f6' : '#e5e7eb' }}; border-radius: 0.5rem; background-color: white; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); cursor: pointer; transition: all 0.2s;"
                    onmouseover="this.style.borderColor='#3b82f6';"
                    onmouseout="this.style.borderColor='{{ $selectedRoom == $room['id'] ? '#3b82f6' : '#e5e7eb' }}';"
                >
                    <div style="display: flex; gap: 1.5rem;">
                        <!-- Room Photos Carousel -->
                        <div style="width: 33%; position: relative;">
                            <div style="position: relative; padding-top: 75%; border-radius: 0.5rem; overflow: hidden;">
                                <img
                                    src="{{ $room['photos'][0] }}"
                                    alt="{{ $room['name'] }}"
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;"
                                >
                            </div>
                            @if(count($room['photos']) > 1)
                                <div style="display: flex; gap: 0.5rem; margin-top: 0.5rem;">
                                    @foreach(array_slice($room['photos'], 1) as $photo)
                                        <div style="width: 4rem; height: 3rem; border-radius: 0.25rem; overflow: hidden;">
                                            <img
                                                src="{{ $photo }}"
                                                alt="{{ $room['name'] }}"
                                                style="width: 100%; height: 100%; object-fit: cover;"
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Room Details -->
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div>
                                    <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937;">{{ $room['name'] }}</h3>
                                    <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #6b7280;">
                                        Block {{ $room['block'] }} • Unit {{ $room['unit'] }} • Floor {{ $room['floor'] }}
                                    </p>

                                    <div style="margin-top: 0.5rem;">
                                        <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.5rem; font-size: 0.75rem; font-weight: 500; border-radius: 0.5rem; background-color: #d1fae5; color: #065f46;">
                                            {{ $room['capacity'] }}
                                        </span>
                                        <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.5rem; font-size: 0.75rem; font-weight: 500; border-radius: 0.5rem; background-color: #dbeafe; color: #1d4ed8; margin-left: 0.5rem;">
                                            {{ $room['room_type'] }}
                                        </span>
                                    </div>

                                    <div style="margin-top: 1rem;">
                                        <h4 style="font-size: 0.875rem; font-weight: 500; color: #4b5563;">Amenities:</h4>
                                        <ul style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.25rem; margin-top: 0.25rem;">
                                            @foreach($room['amenities'] as $amenity)
                                                <li style="display: flex; align-items: center; font-size: 0.875rem; color: #6b7280;">
                                                    <svg style="width: 1rem; height: 1rem; color: #10b981; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    {{ $amenity }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div style="text-align: center; color: #6b7280; padding: 2rem; background-color: white; border-radius: 0.5rem; border: 1px solid #e5e7eb;">
                    <svg style="width: 4rem; height: 4rem; color: #9ca3af; margin: 0 auto 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16"></path>
                    </svg>
                    <p style="font-size: 1.125rem; font-weight: 500;">No rooms available for the selected location.</p>
                    <p style="font-size: 0.875rem; color: #9ca3af; margin-top: 0.25rem;">Please try selecting a different location or contact support for assistance.</p>
                </div>
            @endforelse
        @else
            <div style="text-align: center; color: #6b7280; padding: 2rem; background-color: white; border-radius: 0.5rem; border: 1px solid #e5e7eb;">
                <svg style="width: 4rem; height: 4rem; color: #9ca3af; margin: 0 auto 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"></path>
                </svg>
                <p style="font-size: 1.125rem; font-weight: 500;">Please select a location</p>
                <p style="font-size: 0.875rem; color: #9ca3af; margin-top: 0.25rem;">Select Block, Unit, and Floor to view available rooms.</p>
            </div>
        @endif
    </div>
</div>
