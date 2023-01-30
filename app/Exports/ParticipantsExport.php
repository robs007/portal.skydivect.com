<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ParticipantsExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(int $event_id)
    {
        $this->event_id = $event_id;
    }

    public function query()
    {
        return Participant::query()->where('event_id', $this->event_id);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'Email',
            'Jumps',
            'Paid',
            'Registered'
        ];
    }

    public function map($participant): array
    {
        return [
            $participant->firstname.' '.$participant->lastname,
            $participant->phone,
            $participant->email,
            $participant->jumps,
            $participant->amount,
            $participant->created_at->format('m-d-Y')
        ];
    }
}
