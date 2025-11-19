<?php

namespace App\Exports;

use App\Models\Filiere;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FilieresExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Filiere::select('id', 'abreviation', 'nom_complet')->get();

    }

    public function headings(): array
    {
        return [
            'id',
            'abrevation',
            'nom_complet'
        ];
    }
}
