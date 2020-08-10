<?php

namespace App;

use Parsedown;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

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
        // setters(accessors)
        public function getUrlAttribute(){
            // return route('questions.show', $this->id );
            // to show
            return route('questions.show', $this->slug );
        }
        public function getCreatedDateAttribute(){
            // created_date
            return $this->created_at->diffForHumans();
        }
        public function getStatusAttribute(){
            // dd($this->answers);
            if($this->answers > 0){
                if($this->best_answer_id){
                    return "answered-accepted";
                }
                return 'answered';
            }
            return "unanswered";
        }
        public function getBodyHtmlAttribute(){
            return \Parsedown::instance()->text($this->body);
        }
        public function answers(){
            return $this->hasMany(Answer::class);
        }
}
