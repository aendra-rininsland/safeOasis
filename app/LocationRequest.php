<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationRequest extends Model
{
    protected $geofields = array('coords');


    public function setCoordinatesAttribute($value) {
        $this->attributes['coords'] = DB::raw("POINT($value)");
    }

    public function getCoordinatesAttribute($value){

        $loc =  substr($value, 6);
        $loc = preg_replace('/[ ,]+/', ',', $loc, 1);

        return substr($loc,0,-1);
    }

    public function scopeDistance($query,$dist,$location)
    {
        return $query->whereRaw('st_distance(coords,POINT('.$location.')) < '.$dist);
    }

    public function newQuery($excludeDeleted = true)
    {
        $raw='';
        foreach($this->geofields as $column){
            $raw .= ' astext('.$column.') as '.$column.' ';
        }

        return parent::newQuery($excludeDeleted)->addSelect('*',DB::raw($raw));
    }

    public function location()
    {
        return $this->hasOne('App\Location');
    }
}
