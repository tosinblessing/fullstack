<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }
    //working on event
    // public static function boot(){
    //      parent::boot();

    //      static::created(function ($answer){
    //         echo "Answer Created\n";
    //      });
    //      static::saved(function ($answer){
    //         echo "Answer saved\n";
    //      });
    // }
    //working on event
    public static function boot(){
        parent::boot();

        static::created(function ($answer){
            $answer->question->increment('answers_count');
            $answer->question->save();
        });
    }
    public function getCreatedDateAttribute(){
        // created_date
        return $this->created_at->diffForHumans();
    }



}

