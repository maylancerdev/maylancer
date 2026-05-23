<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocsRepository extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'repository',
        'category',
        'full_name',
        'description',
        'demo',
        'support',
        'docs_path',
        'branches',
    ];

    protected $casts = [
        'branches' => 'array',
        'last_imported_branches' => 'array',
        'last_imported_at' => 'datetime',
    ];

    protected function githubUrl(): Attribute
    {
        return Attribute::get(fn () => "https://github.com/{$this->repository}");
    }
}
