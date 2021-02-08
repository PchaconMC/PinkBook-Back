<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    protected $guarded = ['id'];
    use SoftDeletes;

    public function books(){
        return $this->hasMany(Book::class);
    }
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    protected static function boot(){
        parent::boot();
        if ( !app()->runningInConsole()) {
            self::creating(function ($table) {
                $table->user_id = auth()->id();
            });
        }
    }
}
