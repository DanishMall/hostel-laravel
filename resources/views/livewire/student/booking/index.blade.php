<div style="min-height: 100vh; background-color: #f9fafb; padding: 2rem;">
    <div style="max-width: 1024px; margin: 0 auto; padding: 0 1rem;">
        <div style="margin-bottom: 2rem;">
            <h1 style="font-size: 2rem; font-weight: bold; color: #1a202c;">Student Hostel Booking</h1>
            <p style="margin-top: 0.5rem; color: #4a5568;">Find and book your perfect student accommodation</p>
        </div>

        <div style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); overflow: hidden; margin-bottom: 1.5rem;">
            <div style="padding: 1.5rem; border-bottom: 1px solid #e5e7eb;">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #1a202c; display: flex; align-items: center; gap: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Available Rooms
                </h2>
                <p style="color: #6b7280; font-size: 0.875rem; margin-top: 0.25rem;">Choose from our selection of comfortable rooms</p>
            </div>

            <div style="padding: 1.5rem;">

                <livewire:student.booking.room-selection/>
                <livewire:student.booking.semester-hostel/>
                <livewire:student.booking.booking-summary/>

{{--                @if($selectedRoom && $checkIn && $checkOut)--}}
{{--                    <div style="margin-top: 1.5rem;">--}}
{{--                        <button--}}
{{--                            wire:click="$toggle('showPriceBreakdown')"--}}
{{--                            style="display: flex; align-items: center; gap: 0.5rem; color: #3b82f6; font-size: 0.875rem; background: none; border: none; cursor: pointer;"--}}
{{--                        >--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                                <circle cx="12" cy="12" r="10"></circle>--}}
{{--                                <line x1="12" y1="16" x2="12" y2="12"></line>--}}
{{--                                <line x1="12" y1="8" x2="12.01" y2="8"></line>--}}
{{--                            </svg>--}}
{{--                            {{ $showPriceBreakdown ? 'Hide' : 'Show' }} price breakdown--}}
{{--                        </button>--}}

{{--                        @if($showPriceBreakdown)--}}
{{--                            <div style="margin-top: 0.75rem; padding: 1rem; background-color: #f8fafc; border-radius: 0.5rem;">--}}
{{--                                <div style="display: flex; flex-direction: column; gap: 0.5rem;">--}}
{{--                                    <div style="display: flex; justify-content: space-between; font-size: 0.875rem; color: #4a5568;">--}}
{{--                                        <span>Number of nights:</span>--}}
{{--                                        <span>{{ $numberOfNights }} nights</span>--}}
{{--                                    </div>--}}
{{--                                    <div style="display: flex; justify-content: space-between; font-size: 0.875rem; color: #4a5568;">--}}
{{--                                        <span>Price per night:</span>--}}
{{--                                        <span>${{ number_format($roomPrice, 2) }}</span>--}}
{{--                                    </div>--}}
{{--                                    <div style="display: flex; justify-content: space-between; font-weight: 600; color: #1a202c; padding-top: 0.5rem; border-top: 1px solid #e2e8f0;">--}}
{{--                                        <span>Total:</span>--}}
{{--                                        <span>${{ number_format($total, 2) }}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                @endif--}}

                <div style="margin-top: 1.5rem;">
                    <div
                        x-data="{
            isLoading: false,
            get canBook() {
                return $wire.selectedRoom && $wire.semesterType;
            }
        }"
                        style="display: flex; flex-direction: column; gap: 1rem;"
                    >
                        <!-- Booking Requirements Message -->
                        <div
                            x-show="!canBook"
                            style="font-size: 0.875rem; color: #4b5563; background-color: #f9fafb; padding: 0.75rem; border-radius: 0.5rem; display: flex; align-items: center; gap: 0.5rem;"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #9ca3af;">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="16" x2="12" y2="12"/>
                                <line x1="12" y1="8" x2="12.01" y2="8"/>
                            </svg>
                            <span>Please select a room and semester type to continue</span>
                        </div>

                        <!-- Book Now Button -->
                        <button
                            wire:click="book"
                            x-on:click="isLoading = true"
                            x-bind:disabled="!canBook || isLoading"
                            style="width: 100%; padding: 1rem; border-radius: 0.5rem; font-weight: 600; color: #ffffff; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; position: relative;"
                            x-bind:style="{
                            backgroundColor: canBook && !isLoading ? '#3b82f6' : '#d1d5db',
                            cursor: canBook && !isLoading ? 'pointer' : 'not-allowed',
                            transform: canBook && !isLoading ? 'translateY(-2px)' : 'none'
                        }"
                        >
                            <!-- Loading Spinner -->
                            <span
                                x-show="isLoading"
                                style="position: absolute; left: 50%; transform: translateX(-50%);"
                            >
                            <svg class="animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="height: 1.25rem; width: 1.25rem; color: white;">
                                <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>

                            <!-- Button Text -->
                            <span x-show="!isLoading">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.5rem;">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                             </span>
                            <span x-show="!isLoading">Book Your Room Now</span>
                        </button>

                        <!-- Success Message -->
                        <div
                            x-show="$wire.bookingSuccess"
                            x-transition
                            style="font-size: 0.875rem; color: #047857; background-color: #d1fae5; padding: 0.75rem; border-radius: 0.5rem; display: flex; align-items: center; gap: 0.5rem;"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #10b981;">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                            <span>Booking successful! You'll receive a confirmation email shortly.</span>
                        </div>

                        <!-- Error Message -->
                        <div
                            x-show="$wire.bookingError"
                            x-transition
                            style="font-size: 0.875rem; color: #b91c1c; background-color: #fee2e2; padding: 0.75rem; border-radius: 0.5rem; display: flex; align-items: center; gap: 0.5rem;"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #ef4444;">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            <span>There was an error processing your booking. Please try again.</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div style="background-color: #ebf8ff; border: 1px solid #bee3f8; border-radius: 0.5rem; padding: 1rem; display: flex; gap: 0.5rem; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2b6cb0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <span style="color: #2b6cb0; font-size: 0.875rem;">
                Need help with your booking? Contact student housing support at support@university.edu
            </span>
        </div>
    </div>
</div>
