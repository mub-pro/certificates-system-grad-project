<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_name',
        'document_description',
        'document_issue_date',
        'user_id',
        'document_type_id',
        'degree_id'
    ];

    public function document_type() {
        return $this->belongsTo(DocumentType::class);
    }
}
