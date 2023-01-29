<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\backend\UserSetting;
use App\Models\backend\Perfil;

// agregamos
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\PermissionRegistrar;
// use Spatie\Permission\Models\model_has_roles;
// use Spatie\Permission\Models\model_has_permissions;

class UserSeeder extends Seeder
{
    public function __construct()
    {
        $users = [
            'admin' => [
                'name' => 'Super Admin',
                'email' => 'admin@email.com',
                'profile_photo_path' => '/avatars/admin.png',
                'email_verified_at' => now(),
                // 'password' => Hash::make('0Admin'), //bcrypt('0Admin')
                'password' => '123',
                'remember_token' => Str::random(10),
                'is_active' => 1,
                'role' => 'admin'
            ],
            // 'guest' => [
            //     'name' => 'guest',
            //     'email' => 'guest@email.com',
            //     'profile_photo_path' => '/avatars/guest.png',
            //     'email_verified_at' => now(),
            //     'password' => 'guest', //bcrypt('guest')
            //     'remember_token' => Str::random(10),
            //     'is_active' => 1,
            //     'role' => 'user',
            // ],
            'user' => [
                'name' => 'user',
                'email' => 'user@email.com',
                'profile_photo_path' => '/avatars/guest.png',
                'email_verified_at' => now(),
                'password' => '123', //bcrypt('guest')
                'remember_token' => Str::random(10),
                'is_active' => 1,
                'role' => 'user',
            ],
            'cliente' => [
                'name' => 'cliente',
                'email' => 'cliente@email.com',
                'profile_photo_path' => '/avatars/guest.png',
                'email_verified_at' => now(),
                'password' => '123', //bcrypt('guest')
                'remember_token' => Str::random(10),
                'is_active' => 1,
                'role' => 'cliente',
            ],
            'vendedor' => [
                'name' => 'vendedor',
                'email' => 'vendedor@email.com',
                'profile_photo_path' => '/avatars/guest.png',
                'email_verified_at' => now(),
                'password' => '123', //bcrypt('guest')
                'remember_token' => Str::random(10),
                'is_active' => 1,
                'role' => 'vendedor',
            ],
        ];

        $theme = 'light';
        $language = 'es-ES';

        foreach ($users as $user) {
            $u = User::create($user);
            if ($user['name'] == 'Super Admin' || $user['name'] == 'Admin') {
                $u->assignRole('admin');
            } elseif ($user['name'] == 'cliente') {
                $u->assignRole('cliente');
            } elseif ($user['name'] == 'vendedor') {
                $u->assignRole('vendedor');
            } else {
                $u->assignRole('user');
                $theme = 'dark';
                $language = 'fr-FR';
            }
            //guardar un registro de configuracion para el usuario
            UserSetting::create([
                'user_id' => $u['id'],
                'theme' => $theme,
                'language' => $language,
            ]);
            //guardar un registro de perfil para el usuario
            Perfil::factory()->create([
                'user_id' => $u->id,
            ]);
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::factory()
        //     // ->has(UserSetting::factory()->count(1), 'userSetting')
        //     ->count(48)
        //     ->create();

        // factory(App\User::class, 25)->create()->each(function ($user) {
        //     $user->profile()->save(factory(App\UserProfile::class)->make());
        // });
        $array1 = ['light', 'dark'];
        $array2 = ['es-ES', 'fr-FR', 'en-EN'];
        // $array3 = ['admin', 'user', 'cliente', 'vendedor',];
        $array3 = Role::all('name')->toArray();

        User::factory(50)
            ->create()
            ->each(function ($user) use ($array3) {
                // dump($user);
                // asigna roles a los usuarios
                $user->assignRole(array_rand($array3, rand(1, count($array3) - 2)));
                UserSetting::factory()->create([
                    'user_id' => $user->id,
                ]);
                Perfil::factory()->create([
                    'user_id' => $user->id,
                ]);
            });
    }
}
