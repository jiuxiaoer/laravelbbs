<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'pid'];

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function matchAt(){
        $userModel=new \App\Models\User();
        $isMatched = preg_match('/href="\/users\/(.*?)">/', $this->content, $matches);
        if ($isMatched){
            return $userModel->where('id',$matches[1])->get()[0];
        }
        return false;
    }
}
