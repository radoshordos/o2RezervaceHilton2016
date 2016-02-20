<?php
namespace Db;

class Rezervace extends \Eloquent
{
    protected $table = 'rezervace';
    protected $guarded = [];
    public $timestamps = true;

    public static $rules = [
        'fullname' => "required",
        'email'    => "required|unique:rezervace,email",
        'tikets'   => 'required|numeric|min:1|max:2',
    ];
}