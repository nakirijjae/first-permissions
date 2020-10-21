<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\User;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit items']);
        Permission::create(['name' => 'delete items']);
        Permission::create(['name' => 'view items']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'basicUser']);
        $role1->givePermissionTo('view items');
        $role1->givePermissionTo('edit items');

        $role2 = Role::create(['name' => 'adminUser']);
        $role2->givePermissionTo('edit items');
        $role2->givePermissionTo('delete items');

        $role3 = Role::create(['name' => 'superAdmin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user1 = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('test-pass'),
            'user_role' => $role2->name,
        ]);
        $user1->assignRole($role2);

        $user2 = User::create([
            'name' => 'Super User',
            'email' => 'super@example.com',
            'password' => Hash::make('test-pass'),
            'user_role' => $role3->name,
        ]);
        $user2->assignRole($role3);
    }
}
