<?php

namespace App\Models;
use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteBook extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function notes() {
        return $this->hasMany(Note::class);
    }
}
