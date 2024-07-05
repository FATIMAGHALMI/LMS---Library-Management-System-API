<?php
  
  namespace App\Models;

  use Illuminate\Foundation\Auth\User as Authenticatable;
  use Illuminate\Notifications\Notifiable;
  use Laravel\Sanctum\HasApiTokens;
  
  class User extends Authenticatable
  {
      use HasApiTokens, Notifiable;
  
      protected $fillable = [
          'name',
          'email',
          'password',
      ];
  
      protected $hidden = [
          'password',
          'remember_token',
      ];
  
    //   public function books()
    //   {
    //       return $this->hasMany(Book::class);
    //   }
  
    //   public function members()
    //   {
    //       return $this->hasMany(Member::class);
    //   }
  
    //   public function genres()
    //   {
    //       return $this->hasMany(Genre::class);
    //   }
      
  
    //   public function prets()
    //   {
    //       return $this->hasMany(Pret::class);
    //   }

    //   public function reservation()
    //   {
    //       return $this->hasMany(reservation::class);
    //   }
  }
  