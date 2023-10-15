<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'image',
        'is_published'
    ];


    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->mb_ucfirst($value),//акцессор
            set: fn($value) => $this->mb_ucfirst($value)// мутатор
        );
    }

    //каст
    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function isPublic(): bool
    {
        return $this->is_published;
    }

    private function mb_ucfirst($value): string
    {
        return mb_strtoupper(mb_substr($value, 0, 1)) . mb_substr($value, 1);
    }

}
