<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryHasMediaModel extends Model
{
    protected $table = 'category_has_media';
    protected $allowedFields = ['id_category', 'name', 'id_user', 'id_media'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    // mise à jour horodatage
    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');// format américain
        return $data;
    }

    // mise à jour horodatage
    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
    
}