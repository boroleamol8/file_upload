<?php
namespace App\Imports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'sapid'     => $row['sapid'],
            'hostname'    => $row['hostname'], 
            'loopback' => $row['loopback'],
            'mac_address' => $row['mac_address'],
        ]);
    }
}
