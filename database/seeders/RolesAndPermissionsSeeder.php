<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        $permissions = [
            'manage settings',
            'manage users',
            'manage roles',
            'manage services',
            'manage portfolio',
            'manage blogs',
            'manage career jobs',
            'manage career applications',
            'manage contact enquiries',
            'manage newsletter',
            'manage testimonials',
            'manage faqs',
            'manage clients',
            'manage gallery',
            'view analytics',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        // Clear cache again after creation to make sure Spatie registry sees the new database rows
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Fetch all permissions from DB
        $allPermissions = Permission::where('guard_name', 'web')->get();

        // Create Roles and Assign Permissions
        
        // 1. Super Admin
        $superAdminRole = Role::findOrCreate('Super Admin', 'web');
        $superAdminRole->syncPermissions($allPermissions);

        // 2. Admin
        $adminRole = Role::findOrCreate('Admin', 'web');
        $adminPermissions = Permission::whereIn('name', [
            'manage settings',
            'manage services',
            'manage portfolio',
            'manage blogs',
            'manage career jobs',
            'manage career applications',
            'manage contact enquiries',
            'manage newsletter',
            'manage testimonials',
            'manage faqs',
            'manage clients',
            'manage gallery',
            'view analytics',
        ])->get();
        $adminRole->syncPermissions($adminPermissions);

        // 3. Content Manager
        $contentManagerRole = Role::findOrCreate('Content Manager', 'web');
        $managerPermissions = Permission::whereIn('name', [
            'manage services',
            'manage portfolio',
            'manage blogs',
            'manage testimonials',
            'manage faqs',
            'manage clients',
            'manage gallery',
        ])->get();
        $contentManagerRole->syncPermissions($managerPermissions);

        // 4. Editor
        $editorRole = Role::findOrCreate('Editor', 'web');
        $editorPermissions = Permission::whereIn('name', [
            'manage blogs',
            'manage testimonials',
            'manage faqs',
        ])->get();
        $editorRole->syncPermissions($editorPermissions);

        // 5. Marketing
        $marketingRole = Role::findOrCreate('Marketing', 'web');
        $marketingPermissions = Permission::whereIn('name', [
            'manage blogs',
            'manage testimonials',
            'manage clients',
            'manage newsletter',
            'view analytics',
        ])->get();
        $marketingRole->syncPermissions($marketingPermissions);

        // 6. HR
        $hrRole = Role::findOrCreate('HR', 'web');
        $hrPermissions = Permission::whereIn('name', [
            'manage career jobs',
            'manage career applications',
        ])->get();
        $hrRole->syncPermissions($hrPermissions);

        // 7. Viewer
        $viewerRole = Role::findOrCreate('Viewer', 'web');
        $viewerPermissions = Permission::whereIn('name', [
            'view analytics',
        ])->get();
        $viewerRole->syncPermissions($viewerPermissions);

        // Create Users & Assign Roles
        $usersData = [
            [
                'name' => 'KKSB Super Admin',
                'email' => 'superadmin@kksb.com',
                'role' => 'Super Admin',
            ],
            [
                'name' => 'KKSB Admin',
                'email' => 'admin@kksb.com',
                'role' => 'Admin',
            ],
            [
                'name' => 'KKSB Content Manager',
                'email' => 'manager@kksb.com',
                'role' => 'Content Manager',
            ],
            [
                'name' => 'KKSB Editor',
                'email' => 'editor@kksb.com',
                'role' => 'Editor',
            ],
            [
                'name' => 'KKSB Marketing',
                'email' => 'marketing@kksb.com',
                'role' => 'Marketing',
            ],
            [
                'name' => 'KKSB HR Specialist',
                'email' => 'hr@kksb.com',
                'role' => 'HR',
            ],
            [
                'name' => 'KKSB Viewer',
                'email' => 'viewer@kksb.com',
                'role' => 'Viewer',
            ],
        ];

        foreach ($usersData as $userData) {
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make('password'),
                ]
            );
            $user->syncRoles([$userData['role']]);
        }
    }
}
