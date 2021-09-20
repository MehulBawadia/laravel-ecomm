<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The category is in draft state.
     *
     */
    const DRAFT = 10;

    /**
     * The category is published,
     *
     */
    const PUBLISHED = 20;

    /**
     * The dates that will be mutated to Carbon instance.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'status', 'description', 'meta_title', 'meta_description', 'meta_keywords',
    ];

    /**
     * Get all the statuses for the category.
     *
     * @return array
     */
    public static function getAllStatus()
    {
        return [
            self::DRAFT => 'Draft',
            self::PUBLISHED => 'Published',
        ];
    }
}
