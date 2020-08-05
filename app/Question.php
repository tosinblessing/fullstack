<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Question extends Model
{
    //
    protected  $fillable = ['title', 'body'];


          // doing this because of slug
    public function setTitleAttribute($value){
        // dd(str::slug($value));
        // dd($value);
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }
    public function user(){
        return $this->belongsTo(User::class);
        }
}
