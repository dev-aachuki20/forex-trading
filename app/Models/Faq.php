<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;

    public $table = 'faq';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question',
        'answer',
        'faq_type',
        'status',
        'language_id',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Faq $model) {
            $model->created_by = auth()->user()->id;
        });
    }

    public function uploads()
    {
        return $this->morphMany(Uploads::class, 'uploadsable');
    }

    public function faqImage()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'faq-image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->faqImage) {
            return $this->faqImage->file_url;
        }
        return "";
    }

    public function faqVideo()
    {
        return $this->morphOne(Uploads::class, 'uploadsable')->where('type', 'faq-video');
    }

    public function getFaqVideoUrlAttribute()
    {
        if ($this->faqVideo) {
            return $this->faqVideo->file_url;
        }
        return "";
    }

    public function faqType()
    {
        return $this->belongsTo(FaqType::class,'faq_type','id');
    }
}
