<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\TitleExt;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['title_ext'];

    protected function startDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('m/d/Y'),
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }
    protected function endDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('m/d/Y'),
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    public function getTitleExtAttribute()
    {
        $s = ($this->max - $this->current);

        return "{$this->title} {$this->start_date} ({$this->max}/{$this->current}) ";
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function updateCurrentParticipants()
    {
        $this->update(['current'=>$this->participants()->count()]);
    }



}
