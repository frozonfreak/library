<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use Validator;
use Hash;

class User extends \Eloquent implements Authenticatable
{   
    use SoftDeletes;
    use AuthenticableTrait;
    
    private $rules = [
                        'first_name' => 'required|max:255',
                        'last_name' => 'required|max:255',
                        'email' => 'required|unique:users,email|max:255',
                        'password' => 'required|min:8|max:255',
                        'age'=>'required|numeric|min:10',
                    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'age'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // For JSON responses
    protected $visible = array(
        'first_name', 
        'last_name',
        'email',
        'age',
    );

    public function validate($data)
    {
        // make a new validator object
        return Validator::make($data, $this->rules);

    }
    
    public function roles()
    {
      return $this->belongsToMany('App\Role', 'user_roles')->withTimestamps();
    }
    
    public function books()
    {
      return $this->belongsToMany('App\Book', 'user_books')->withTimestamps();
    }

    public function isPasswordValid($password)
    {
        if (Hash::check($password, $this->password)) {
            return true;
        }
        else{
            return false;
        }
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name',$role)->count() > 0)
            return true;
        else
            return false;    
    }
}
