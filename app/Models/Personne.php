<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;

abstract class Personne extends Authenticatable{
    use HasFactory, Notifiable;
    protected $fillable = ['nom', 'email', 'password', 'telephone'];

    public static function createTableIfNotExists($tablename)
    {
        if (!Schema::hasTable($tablename)) {
            Schema::create($tablename, function (Blueprint $table) {
                $table->id();
                $table->string('nom');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('telephone');
                static::additionalColumns($table);
                $table->timestamps();
            });
        }
    }
}