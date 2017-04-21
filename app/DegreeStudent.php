<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeStudent extends Model
{
    use BaseModel;

    public function setCurrentYear($year)
    {
        $this->currentYear = $year;
    }
}
