<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    //
    protected $table = "job_listings";

    protected $fillable = ["title", "description", "salary", "tags", "job_type", "remote", "requirements", "benefits", "address", 
                "city", "state", "zip", "code", "contact", "email" , "contact_phone", "contact_email", "company_name",
                "company_description", "company_logo", "company_website", "user_id"];

    
        
}
