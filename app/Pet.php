<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pet extends Model
{
    protected $fillable = [
        'pet_category_id', 'img', 'name',  'description', 'price',
    ];

    public function saveImage($image)
    {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('images/pets', $imageName, 'public');
        return $imageName;
    }
    public function deleteImage($image)
    {
        if ($image) {
            Storage::delete('/public/images/pets/' . $image);
        }
        return;
    }

    public function reservations()
    {
        return $this->hasOne(Reservation::class);
    }

    public function pet_category()
    {
        return $this->belongsTo(PetCategory::class);
    }
}
