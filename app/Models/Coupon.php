<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The dates that will be mutated to Carbon instance.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at', 'starts_at', 'ends_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'code', 'description', 'starts_at', 'ends_at', 'percent_or_amount', 'minimum_amount',
    ];
}
