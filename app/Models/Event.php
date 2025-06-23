<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'max_attendees',
        'status'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    // إضافة خصائص مساعدة
    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'active' => 'bg-green-100 text-green-800',
            'completed' => 'bg-blue-100 text-blue-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }

    public function getStatusTextAttribute()
    {
        return match ($this->status) {
            'active' => 'نشطة',
            'completed' => 'مكتملة',
            'cancelled' => 'ملغية',
            default => 'مجهول'
        };
    }

    public function getIsUpcomingAttribute()
    {
        return $this->start_date->isFuture();
    }
}
