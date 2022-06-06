<?php

namespace App\Exports;

use App\Models\Loction;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Locationsexport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            "id", 
            "service_num",
             "phone",
              "name",
               "latitude",
                "longitude", 
                "created_at",
                 "updated_at"
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Location::all();
    }
}
