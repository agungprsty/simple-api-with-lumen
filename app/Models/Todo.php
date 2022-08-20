<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'uid', 'title', 'complated'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class, 'uid');
    }
}
