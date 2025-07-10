<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactModel extends Model
{
    use HasFactory;

    protected $table = 'contact';

    public function getContacts()
    {
        return DB::table($this->table)
            ->where('isReply', 'n')
            ->orderBy('contactId', 'desc')
            ->get();
    }

    public function updateContact($contactId, $data)
    {
        return DB::table($this->table)
            ->where('contactId', $contactId)
            ->update($data);
    }

    // Đã xóa hàm countContactsUnread và mọi truy vấn bảng contact vì không còn dùng nữa

}
