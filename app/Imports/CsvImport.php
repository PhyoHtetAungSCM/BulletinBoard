<?php

namespace App\Imports;

use PhpOffice\PhpSpreadsheet\Shared\Date;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Post;

class CsvImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $created_at = intval($row['created_at']);
        $updated_at = intval($row['updated_at']);
        $deleted_at = intval($row['deleted_at']);

        return new Post([
            'title' => $row['title'],
            'description' => $row['description'],
            'status' => $row['status'],
            'create_user_id' => $row['create_user'],
            'updated_user_id' => $row['updated_user'],
            'deleted_user_id' => $row['deleted_user'],
            'created_at' => Date::excelToDateTimeObject($created_at),
            'updated_at' => Date::excelToDateTimeObject($updated_at),
            'deleted_at' => Date::excelToDateTimeObject($deleted_at),
        ]);
    }
}
