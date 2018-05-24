<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use Carbon\Carbon;
use App\Tag;


class Task extends Model
{
    protected $fillable = ['title', 'body'];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    /*
        archives function  is responsible for query of archives by date
    */
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, 
                                   day(created_at) day, count(*) Published')
                ->groupBy('year','month','day')
                ->orderByRaw('min(created_at) desc')
                ->get()
                ->toArray();

    }

    public static function tasks(){
        return static::all();
    }

    public function scopeFilter($query, $filters)
    {
    	if($day=$filters['day']){
    		$query->whereDay('created_at', $day);
    	}
    	if($month=$filters['month']){
    		$query->whereMonth('created_at', Carbon::parse($month)->month);
    	}
    	if($year=$filters['year']){
    		$query->whereYear('created_at', $year);
    	}
        if($auther=$filters['Auther']){
            $query->where('user_id', $auther);
        }
    	
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
