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
        public function getUrlAttribute(){
            return route('questions.show', $this->id );
        }
        public function getCreatedDateAttribute(){
            // created_date
            return $this->created_at->diffForHumans();
        }
}
