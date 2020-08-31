<?php
use App\User;
use App\Permiso;
use Illuminate\Database\Seeder;
use App\Rol;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permisos = Permiso::where('slug','crear-permiso')->first();
        $superadmin_permisos = Permiso::where('slug', 'edit-users')->first();
        
		$admin_rol = new Rol();
		$admin_rol->slug = 'admin';
		$admin_rol->nombre = 'Administrador del sitema';
		$admin_rol->save();
		$admin_rol->permisos()->attach($admin_permisos);

		$superadmin_rol = new Rol();
		$superadmin_rol->slug = 'superadmin';
		$superadmin_rol->nombre = 'Superadmin del sistema';
		$superadmin_rol->save();
		$superadmin_rol->permisos()->attach($superadmin_permisos);

		$admin_rol = Rol::where('slug','admin')->first();
		$superadmin_rol = Rol::where('slug', 'superadmin')->first();

		$createTasks = new Permiso();
		$createTasks->slug = 'crear-permiso';
		$createTasks->nombre = 'Crear permiso';
		$createTasks->save();
		$createTasks->roles()->attach($admin_rol);

		$editUsers = new Permiso();
		$editUsers->slug = 'edit-users';
		$editUsers->nombre = 'Editar Usuarios';
		$editUsers->save();
		$editUsers->roles()->attach($superadmin_rol);

		$admin_rol = Rol::where('slug','admin')->first();
		$superadmin_rol = Rol::where('slug', 'superadmin')->first();
		$admin_per = Permiso::where('slug','crear-permiso')->first();
		$superadmin_perm = Permiso::where('slug','edit-users')->first();

		$admin = new User();
		$admin->name = 'Juan Perez';
		$admin->email = 'juan@gmail.com';
		$admin->password = bcrypt('123456789');
		$admin->save();
		$admin->roles()->attach($admin_rol);
		$admin->permisos()->attach($admin_per);

		$superadmin = new User();
		$superadmin->name = 'mike';
		$superadmin->email = 'mike@gmail.com';
		$superadmin->password = bcrypt('123456789');
		$superadmin->save();
		$superadmin->roles()->attach($superadmin_rol);
		$superadmin->permisos()->attach($superadmin_perm);
    }
}
