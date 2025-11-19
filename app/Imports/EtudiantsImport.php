<?php

namespace App\Imports;

use App\Models\Etudiant;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EtudiantsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       $etudiant = User::firstOrCreate(
            ['cne' => $row['cne']],
            [
                'nom' => $row['nom'], 
                'prenom' => $row['prenom'],
                'cne' => $row['cne'], 
                'cin' => $row['cin'],
                ]
        );

        $etudiant->filieres()->syncWithoutDetaching($row['filiere_id']);

        return $etudiant;
    }
}
