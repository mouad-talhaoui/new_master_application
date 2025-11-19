<?php

namespace App\Exports;


use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EtudiantsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id', 'nom', 'prenom', 'cin', 'cne')->get();
    }

        public function headings(): array
    {
        return [
            'id',
            'nom',
            'prenom',
            'cin',
            'cne'
        ];
    }
}
