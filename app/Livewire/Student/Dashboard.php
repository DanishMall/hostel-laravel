<?php

namespace App\Livewire\Student;

use App\Models\Announcement;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $profile = [];
    public $stats = [];
    public $announcements = [];
    public $payments = [];

    public function mount()
    {
        $student = Auth::user();

        $this->profile = [
            'name' => $student->name,
            'student_id' => $student->student_id,
            'room' => $student->room,
            'floor' => $student->floor,
            'status' => 'Active Resident'
        ];

        $this->stats = [
            'room_rent_status' => $this->getRoomRentStatus($student),
            'mess_balance' => $this->getMessBalance($student),
            'leave_days' => $this->getLeaveDays($student),
            'complaints' => $this->getActiveComplaints($student)
        ];

        $this->announcements = $this->getRecentAnnouncements();
        $this->payments = $this->getRecentPayments($student);
    }

    private function getRoomRentStatus($student)
    {
        $lastPayment = Payment::where('student_id', $student->id)
            ->where('type', 'room_rent')
            ->latest()
            ->first();

        return [
            'status' => $lastPayment ? 'Paid' : 'Pending',
            'next_due' => now()->addMonth()->firstOfMonth()->format('j F')
        ];
    }

    private function getMessBalance($student)
    {
        return [
            'balance' => $student->mess_balance,
            'days_to_due' => 5
        ];
    }

    private function getLeaveDays($student)
    {
        return [
            'used' => $student->used_leave_days,
            'total' => 15,
            'remaining' => 15 - $student->used_leave_days
        ];
    }

    private function getActiveComplaints($student)
    {
        return [
            'total' => $student->complaints()->where('status', 'active')->count(),
            'details' => 'Active request'
        ];
    }

    private function getRecentAnnouncements()
    {
        return Announcement::latest()->take(3)->get()->map(function($announcement) {
            return [
                'title' => $announcement->title,
                'description' => $announcement->description,
                'created_at' => $announcement->created_at->diffForHumans()
            ];
        });
    }

    private function getRecentPayments($student)
    {
        return Payment::where('student_id', $student->id)
            ->latest()
            ->take(3)
            ->get()
            ->map(function($payment) {
                return [
                    'type' => $payment->type,
                    'amount' => $payment->amount,
                    'date' => $payment->created_at->format('M d, Y')
                ];
            });
    }
    public function render()
    {
        return view('livewire.student.dashboard',  [
            'profile' => $this->profile,
            'stats' => $this->stats,
            'announcements' => $this->announcements,
            'payments' => $this->payments
        ]);
    }
}
