<?php

namespace App\Models;

use Library\Core\AbstractModel;

class PostModel extends AbstractModel
{
    public function findAll(): array
    {
        return $this->db->getResults(
            'SELECT id, title, content, created_at 
            FROM posts
            ORDER BY created_at DESC'
        );
    }
    
    public function find(int $id): array
    {
        return $this->db->getResults(
            'SELECT id, title, content, created_at 
            FROM posts
            WHERE id = :id
            ORDER BY created_at DESC', [
                'id' => $id    
            ]
        );
    }
}