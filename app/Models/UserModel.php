<?php
namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User; // Import model User

class UserModel
{
    // Mendapatkan user berdasarkan email
    public static function getUserByEmail($email)
    {
        return User::where('email', $email)->first(); // Gunakan model User
    }

    // Menambahkan user baru
    public static function createUser($email, $password)
    {
        User::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }

    // Memperbarui user
    public static function updateUser($id, $newEmail, $newPassword)
    {
        User::where('id', $id)->update([
            'email' => $newEmail,
            'password' => Hash::make($newPassword),
        ]);
    }

    // Menghapus user
    public static function deleteUser($id)
    {
        User::where('id', $id)->delete();
    }

    // Autentikasi pengguna
    public static function authenticateUser($email, $password)
    {
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            $token = JWTAuth::fromUser($user);  // Gunakan model User yang mengimplementasikan JWTSubject
            return $token;
        } else {
            throw new \Exception('Invalid credentials');
        }
    }

    // Mendapatkan JWT identifier
    public static function getJWTIdentifier($email)
    {
        $user = User::where('email', $email)->first();
        return $user ? $user->id : null;
    }

    // Mendapatkan JWT custom claims
    public static function getJWTCustomClaims()
    {
        return [];
    }
}


// namespace App\Models;

// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Tymon\JWTAuth\Facades\JWTAuth;

// class UserModel
// {
//     // Mendapatkan user berdasarkan email
//     public function getUserByEmail($email)
//     {
//         return DB::table('users')->where('email', $email)->first();
//     }

//     // Menambahkan user baru
//     public function createUser($email, $password)
//     {
//         DB::table('users')->insert([
//             'email' => $email,
//             'password' => Hash::make($password),
//         ]);
//     }

//     // Memperbarui user
//     public function updateUser($id, $newEmail, $newPassword)
//     {
//         DB::table('users')
//             ->where('id', $id)
//             ->update([
//                 'email' => $newEmail,
//                 'password' => Hash::make($newPassword),
//             ]);
//     }

//     // Menghapus user
//     public function deleteUser($id)
//     {
//         DB::table('users')
//             ->where('id', $id)
//             ->delete();
//     }

//     // Autentikasi pengguna
//     public function authenticateUser($email, $password)
//     {
//         $user = DB::table('users')->where('email', $email)->first();

//         if ($user && Hash::check($password, $user->password)) {
//             $token = JWTAuth::fromUser((object) $user);  // JWTAuth expects an object with `id` property
//             return $token;
//         } else {
//             throw new \Exception('Invalid credentials');
//         }
//     }

//     // Mendapatkan JWT identifier
//     public function getJWTIdentifier($email)
//     {
//         $user = DB::table('users')->where('email', $email)->first();
//         return $user ? $user->id : null;
//     }

//     // Mendapatkan JWT custom claims
//     public function getJWTCustomClaims()
//     {
//         return [];
//     }
// }