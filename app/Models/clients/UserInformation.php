<?php

namespace App\Models\clients;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInformation extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'user_information';

    public function createNameUser ($data)
    {
        return DB::table($this->table)->insert($data);
    }
}
