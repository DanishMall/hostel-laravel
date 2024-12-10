<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-weight: 600; font-size: 1.25rem; color: #1E3A8A; line-height: 1.5;">
                {{ __('Student Dashboard') }}
            </h2>
            <div style="display: flex; gap: 1rem;">
                <button style="background-color: #EF4444; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; transition: transform 0.2s, box-shadow 0.2s;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                    Report Issue
                </button>
                <button style="background-color: #10B981; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; transition: transform 0.2s, box-shadow 0.2s;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                    Request Leave
                </button>
            </div>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0; background-color: #F9FAFB;">
        <div style="max-width: 1120px; margin: 0 auto; padding: 0 1.5rem;">

            <!-- Student Profile Summary -->
            <div style="background-color: white; border-radius: 0.5rem; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: box-shadow 0.3s;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 5rem; height: 5rem; background: linear-gradient(135deg, #4F46E5, #9333EA); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: transform 0.3s;"
                         onmouseover="this.style.transform='rotate(12deg)';"
                         onmouseout="this.style.transform='rotate(0deg)';">
                        <span style="font-size: 1.5rem; color: white;">HOs</span>
                    </div>
                    <div>
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: #1E3A8A;" >{{ Auth::user()->name }}</h3>
                        <p style="color: #4B5563;">Student ID: {{ Auth::user()->student_id }}</p>
{{--                        <p style="color: #4B5563;">Room: B-101 | Floor: 1st</p>--}}
                    </div>
                    <div style="margin-left: auto; text-align: right;">
                        <span style="background-color: #D1FAE5; color: #065F46; padding: 0.375rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 500; animation: pulse 2s infinite;">Active Resident</span>
                    </div>
                </div>
            </div>

            <!-- Stats Overview -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;"
                     onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 8px rgba(0,0,0,0.15)';"
                     onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                    <div style="color: #4B5563; font-size: 0.875rem;">Room Rent Status</div>
                    <div style="font-size: 1.5rem; font-weight: 700; color: #10B981;">Paid</div>
                    <div style="font-size: 0.875rem;">Next due: 1st June</div>
                </div>
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;"
                     onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 8px rgba(0,0,0,0.15)';"
                     onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                    <div style="color: #4B5563; font-size: 0.875rem;">Mess Balance</div>
                    <div style="font-size: 1.5rem; font-weight: 700; color: #4F46E5;">$120</div>
                    <div style="font-size: 0.875rem; color: #F59E0B;">Due in 5 days</div>
                </div>
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;"
                     onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 8px rgba(0,0,0,0.15)';"
                     onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                    <div class="text-sm text-gray-600">Leave Days</div>
                    <div class="text-2xl font-bold text-purple-600">8/15</div>
                    <div class="text-sm">Days remaining this semester</div>
                </div>
                <div style="background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;"
                     onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 8px rgba(0,0,0,0.15)';"
                     onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)';">
                    <div class="text-sm text-gray-600">Complaints</div>
                    <div class="text-2xl font-bold text-red-500">1</div>
                    <div class="text-blue-600 text-sm">1 active request</div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div style="display: grid; grid-template-columns: 1fr; gap: 24px; @media (min-width: 1024px) { grid-template-columns: 2fr 1fr; }">
                <!-- Announcements -->
                <div style="background-color: white; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                    <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                        <h3 style="font-size: 1.125rem; font-weight: 600; color: #1e3a8a;">Recent Announcements</h3>
                    </div>
                    <div style="padding: 24px;">
                        <div style="display: flex; flex-direction: column; gap: 16px;">
                            <div style="border-left: 4px solid #f59e0b; padding-left: 16px; padding-bottom: 16px; transition: all 0.3s ease;"
                                 onmouseover="this.style.paddingLeft='24px';" onmouseout="this.style.paddingLeft='16px';">
                                <div style="font-weight: 500; color: #111827;">Maintenance Notice</div>
                                <div style="font-size: 0.875rem; color: #6b7280;">Water supply will be interrupted on Sunday from 10 AM to 2 PM</div>
                                <div style="font-size: 0.75rem; color: #9ca3af; margin-top: 4px;">2 hours ago</div>
                            </div>
                            <div style="border-left: 4px solid #3b82f6; padding-left: 16px; padding-bottom: 16px; transition: all 0.3s ease;"
                                 onmouseover="this.style.paddingLeft='24px';" onmouseout="this.style.paddingLeft='16px';">
                                <div style="font-weight: 500; color: #111827;">Weekend Activities</div>
                                <div style="font-size: 0.875rem; color: #6b7280;">Join us for movie night this Saturday at 8 PM in the common room</div>
                                <div style="font-size: 0.75rem; color: #9ca3af; margin-top: 4px;">1 day ago</div>
                            </div>
                            <div style="border-left: 4px solid #10b981; padding-left: 16px; padding-bottom: 16px; transition: all 0.3s ease;"
                                 onmouseover="this.style.paddingLeft='24px';" onmouseout="this.style.paddingLeft='16px';">
                                <div style="font-weight: 500; color: #111827;">Mess Menu Updated</div>
                                <div style="font-size: 0.875rem; color: #6b7280;">New menu for next week has been uploaded</div>
                                <div style="font-size: 0.75rem; color: #9ca3af; margin-top: 4px;">2 days ago</div>
                            </div>
                        </div>
                        <div style="margin-top: 16px;">
                            <a href="#" style="font-size: 0.875rem; color: #6366f1; text-decoration: none; transition: color 0.3s ease;"
                               onmouseover="this.style.color='#4338ca';" onmouseout="this.style.color='#6366f1';">View all announcements →</a>
                        </div>
                    </div>
                </div>

                <!-- Payment History -->
                <div style="background-color: white; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                    <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                        <h3 style="font-size: 1.125rem; font-weight: 600; color: #1e3a8a;">Recent Payments</h3>
                    </div>
                    <div style="padding: 24px;">
                        <div style="display: flex; flex-direction: column; gap: 16px;">
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; transition: all 0.3s ease; background-color: white;"
                                 onmouseover="this.style.backgroundColor='#f9fafb'; this.style.boxShadow='0px 4px 6px rgba(0, 0, 0, 0.1)';"
                                 onmouseout="this.style.backgroundColor='white'; this.style.boxShadow='none';">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                    <div>
                                        <div style="font-weight: 500; color: #111827;">Room Rent - May</div>
                                        <div style="font-size: 0.875rem; color: #6b7280;">Paid on May 1, 2024</div>
                                    </div>
                                    <span style="font-weight: 500; color: #10b981;">$500</span>
                                </div>
                            </div>
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; transition: all 0.3s ease; background-color: white;"
                                 onmouseover="this.style.backgroundColor='#f9fafb'; this.style.boxShadow='0px 4px 6px rgba(0, 0, 0, 0.1)';"
                                 onmouseout="this.style.backgroundColor='white'; this.style.boxShadow='none';">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                    <div>
                                        <div style="font-weight: 500; color: #111827;">Mess Fee - April</div>
                                        <div style="font-size: 0.875rem; color: #6b7280;">Paid on Apr 28, 2024</div>
                                    </div>
                                    <span style="font-weight: 500; color: #10b981;">$200</span>
                                </div>
                            </div>
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; transition: all 0.3s ease; background-color: white;"
                                 onmouseover="this.style.backgroundColor='#f9fafb'; this.style.boxShadow='0px 4px 6px rgba(0, 0, 0, 0.1)';"
                                 onmouseout="this.style.backgroundColor='white'; this.style.boxShadow='none';">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                    <div>
                                        <div style="font-weight: 500; color: #111827;">Utility Charges</div>
                                        <div style="font-size: 0.875rem; color: #6b7280;">Paid on Apr 15, 2024</div>
                                    </div>
                                    <span style="font-weight: 500; color: #10b981;">$50</span>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 16px;">
                            <a href="#" style="font-size: 0.875rem; color: #6366f1; text-decoration: none; transition: color 0.3s ease;"
                               onmouseover="this.style.color='#4338ca';" onmouseout="this.style.color='#6366f1';">View payment history →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div style="margin-top: 24px; background-color: white; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                    <h3 style="font-size: 1.125rem; font-weight: 600; color: #1e3a8a;">Quick Actions</h3>
                </div>
                <div style="padding: 24px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; @media (min-width: 768px) { grid-template-columns: repeat(4, 1fr); }">
                    <button style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; text-align: center; transition: all 0.3s ease; background-color: white; cursor: pointer;"
                            onmouseover="this.style.boxShadow='0px 4px 6px rgba(0, 0, 0, 0.1)'; this.style.backgroundColor='#eef2ff';"
                            onmouseout="this.style.boxShadow='none'; this.style.backgroundColor='white';">
                        <svg style="width: 24px; height: 24px; margin: 0 auto 8px; fill: none; stroke: #6366f1; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='none';" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span style="color: #374151; transition: color 0.3s ease;" onmouseover="this.style.color='#6366f1';" onmouseout="this.style.color='#374151';">Pay Fees</span>
                    </button>
                    <button style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; text-align: center; transition: all 0.3s ease; background-color: white; cursor: pointer;"
                            onmouseover="this.style.boxShadow='0px 4px 6px rgba(0, 0, 0, 0.1)'; this.style.backgroundColor='#eef2ff';"
                            onmouseout="this.style.boxShadow='none'; this.style.backgroundColor='white';">
                        <svg style="width: 24px; height: 24px; margin: 0 auto 8px; fill: none; stroke: #6366f1; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='none';" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <span style="color: #374151; transition: color 0.3s ease;" onmouseover="this.style.color='#6366f1';" onmouseout="this.style.color='#374151';">View Mess Menu</span>
                    </button>
                    <button style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; text-align: center; transition: all 0.3s ease; background-color: white; cursor: pointer;"
                            onmouseover="this.style.boxShadow='0px 4px 6px rgba(0, 0, 0, 0.1)'; this.style.backgroundColor='#eef2ff';"
                            onmouseout="this.style.boxShadow='none'; this.style.backgroundColor='white';">
                        <svg style="width: 24px; height: 24px; margin: 0 auto 8px; fill: none; stroke: #6366f1; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='none';" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span style="color: #374151; transition: color 0.3s ease;" onmouseover="this.style.color='#6366f1';" onmouseout="this.style.color='#374151';">Book Amenities</span>
                    </button>
                    <button style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; text-align: center; transition: all 0.3s ease; background-color: white; cursor: pointer;"
                            onmouseover="this.style.boxShadow='0px 4px 6px rgba(0, 0, 0, 0.1)'; this.style.backgroundColor='#eef2ff';"
                            onmouseout="this.style.boxShadow='none'; this.style.backgroundColor='white';">
                        <svg style="width: 24px; height: 24px; margin: 0 auto 8px; fill: none; stroke: #6366f1; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='none';" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span style="color: #374151; transition: color 0.3s ease;" onmouseover="this.style.color='#6366f1';" onmouseout="this.style.color='#374151';">House Rules</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
