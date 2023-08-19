<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Sluggable;


class WhyTradeWithUs extends Model
{
    use HasFactory, SoftDeletes,Sluggable;
    public $table = 'why_trade_with_us';
    protected $fillable = [
        'title',
        'description',
        'slug',
        'language_id',
        'status',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (WhyTradeWithUs $model) {
            $model->created_by = auth()->user()->id;
        });

        static::creating(function (WhyTradeWithUs $model) {
            $model->created_by = auth()->user()->id;
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function (WhyTradeWithUs $model) {
            if ($model->type != 3) {
                $model->slug = $model->generateSlug($model->title);
            }
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }


    public function tradeImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'trade-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->tradeImage) {
            return $this->tradeImage->file_url;
        }
        return "";
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
