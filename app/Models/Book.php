<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    protected $guarded = ['id'];
    use SoftDeletes;
    protected $perPage = 10;

    public function rates(){
        return $this->hasMany(Rate::class);
    }
    public function category() {
        return $this->belongsTo(Category::class, "category_id");
    }
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
/*
    protected static function boot(){
        parent::boot();
        if ( !app()->runningInConsole()) {
            self::creating(function ($table) {
                $table->user_id = auth()->id();
            });
        }
    }
    */
}
