<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    //
    protected $table = 'courses';
    
    public function scopeGetAllCourse($query) {
        $courses = $query->orderBy('name', 'asc')->get();
        foreach ($courses as $course) {
            if (!empty($course->recipe)) {
                $recipe = json_decode($course->recipe);
                $kcal = 0;
                foreach($recipe as $fid => $info) {
                    $food = $this->getFood($fid);
                    if (!empty($info->w)) {
                        $kcal = $kcal + $food->kcal * $info->w/100;
                    }
                    
                    if (!empty($info->u)) {
                        $kcal = $kcal + $food->kcal * ($info->u * $food->weight)/100;
                    }
                    
                }
                
                
                $course->kcal = $kcal;
            }
        }
        return $courses;
    }
    
    public function scopeGetCourse($query, $id) {
        return $query->find($id);
    }
    
    public function getComposition() {
        return json_decode($this->composition, true);
    }
    
    
    public function getFood($fid) {
        return Food::find($fid);
    }
    
    public function getCompositionInfo() {
        $composition = $this->getComposition();
        foreach ($composition as $fid => $item) {
                $composition[$fid] = array();
                $composition[$fid]['food'] = $this->getFood($fid);
                $composition[$fid]['cm'] = $item;
                $composition[$fid]['unit'] = round($item/$composition[$fid]['food']->weight, 2);
                $composition[$fid]['foodName'] = $composition[$fid]['food']->name;
        }
        return $composition;
    }
    
    
}
