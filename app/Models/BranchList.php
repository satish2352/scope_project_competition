<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchList extends Model
{
    use HasFactory;
    protected $table = 'branch_lists';
    protected $primaryKey = 'id';

}