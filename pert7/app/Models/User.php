<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atribut yang dapat diisi (mass assignable).
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'last_access',
    ];

    /**
     * Atribut yang disembunyikan saat serialisasi (misal ke JSON).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang otomatis dikonversi ke tipe data tertentu.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_access' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke transaksi (user sebagai customer).
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    /**
     * Cek apakah user memiliki peran admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Cek apakah user memiliki peran customer.
     */
    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }
}
