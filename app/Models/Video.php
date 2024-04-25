<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
  protected $fillable = [
      'title', 'path','user_id','transcript','summary','status','score','job_id'
  ];
  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }
  public function job(){
    return $this->belongsTo(Job::class);
  }
}
