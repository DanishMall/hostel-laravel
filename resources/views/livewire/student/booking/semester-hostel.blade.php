<div>
    <div style="max-width: 1120px; margin: 0 auto; padding: 16px; padding-bottom: 24px;">

        <!-- Student View -->
        <div style="background-color: white; border-radius: 8px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); border: 1px solid #e5e7eb; padding: 24px;">
            <div style="font-size: 1.5rem; font-weight: 600; color: #1f2937; margin-bottom: 24px;">
                Available Semesters
            </div>
            <div style="display: grid; grid-template-columns: 1fr; gap: 24px;">
                <!-- Long Semester Card -->
                <div style="border: 1px solid {{ $longSemesterOpen ? '#10b981' : '#e5e7eb' }}; border-radius: 8px; padding: 24px; background-color: {{ $longSemesterOpen ? 'white' : '#f9fafb' }}; opacity: {{ $longSemesterOpen ? '1' : '0.5' }}; pointer-events: {{ $longSemesterOpen ? 'auto' : 'none' }};">
                    <div style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin-bottom: 8px;">
                        Long Semester
                    </div>
                    <div style="font-size: 0.75rem; font-weight: 600; color: #1f2937; margin-bottom: 8px;">
                        4 months duration
                    </div>
                    <div style="font-size: 1.25rem; font-weight: 700; color: #111827; margin-bottom: 16px;">
                        RM 900
                    </div>
                    <span style="display: inline-block; padding: 4px 12px; border-radius: 9999px; font-size: 0.875rem; font-weight: 500; background-color: {{ $longSemesterOpen ? '#d1fae5' : '#fee2e2' }}; color: {{ $longSemesterOpen ? '#065f46' : '#991b1b' }};">
                        {{ $longSemesterOpen ? 'Booking Open' : 'Booking Closed' }}
                    </span>
                    <button
                        wire:click="bookHostel('long')"
                        style="margin-top: 16px; display: inline-flex; align-items: center; padding: 8px 16px; border: none; border-radius: 4px; background-color: {{ $longSemesterOpen ? '#2563eb' : '#9ca3af' }}; color: white; font-size: 0.875rem; font-weight: 500; cursor: {{ $longSemesterOpen ? 'pointer' : 'not-allowed' }};">
                        Book Now
                    </button>
                </div>

                <!-- Short Semester Card -->
                <div style="border: 1px solid {{ $shortSemesterOpen ? '#10b981' : '#e5e7eb' }}; border-radius: 8px; padding: 24px; background-color: {{ $shortSemesterOpen ? 'white' : '#f9fafb' }}; opacity: {{ $shortSemesterOpen ? '1' : '0.5' }}; pointer-events: {{ $shortSemesterOpen ? 'auto' : 'none' }};">
                    <div style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin-bottom: 8px;">
                        Short Semester
                    </div>
                    <div style="font-size: 0.75rem; font-weight: 600; color: #1f2937; margin-bottom: 8px;">
                        2 months duration
                    </div>
                    <div style="font-size: 1.5rem; font-weight: 700; color: #111827; margin-bottom: 16px;">
                        RM 500
                    </div>
                    <span style="display: inline-block; padding: 4px 12px; border-radius: 9999px; font-size: 0.875rem; font-weight: 500; background-color: {{ $shortSemesterOpen ? '#d1fae5' : '#fee2e2' }}; color: {{ $shortSemesterOpen ? '#065f46' : '#991b1b' }};">
                        {{ $shortSemesterOpen ? 'Booking Open' : 'Booking Closed' }}
                    </span>
                    <button
                        wire:click="bookHostel('short')"
                        style="margin-top: 16px; display: inline-flex; align-items: center; padding: 8px 16px; border: none; border-radius: 4px; background-color: {{ $shortSemesterOpen ? '#2563eb' : '#9ca3af' }}; color: white; font-size: 0.875rem; font-weight: 500; cursor: {{ $shortSemesterOpen ? 'pointer' : 'not-allowed' }};">
                        Book Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
