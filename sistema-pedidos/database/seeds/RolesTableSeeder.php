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
        $superadmin_users = Permiso::where('slug', 'edit-users')->first();

		$admin_rol = new Rol();
		$admin_rol->slug = 'admin';
		$admin_rol->descrip = 'Administrador del sitema';
		$admin_rol->save();
		$admin_rol->permisos()->attach($admin_permisos);

		$superadmin_rol = new Rol();
		$superadmin_rol->slug = 'superadmin';
		$superadmin_rol->descrip = 'Superadmin del sistema';
		$superadmin_rol->save();
		$superadmin_rol->permisos()->attach($superadmin_users);

		$admin_rol = Rol::where('slug','admin')->first();
		$superadmin_rol = Rol::where('slug', 'superadmin')->first();

		$createPermisos = new Permiso();
		$createPermisos->slug = 'crear-permiso';
		$createPermisos->descrip = 'Crear permiso';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$editUsers = new Permiso();
		$editUsers->slug = 'edit-users';
		$editUsers->descrip = 'Editar Usuarios';
		$editUsers->save();
		$editUsers->roles()->attach($superadmin_rol);

		$admin_rol = Rol::where('slug','admin')->first();
		$superadmin_rol = Rol::where('slug', 'superadmin')->first();
		$admin_per = Permiso::where('slug','crear-permiso')->first();
		$superadmin_perm = Permiso::where('slug','edit-users')->first();

		$admin = new User();
		$admin->name = 'Juan Perez';
		$admin->email = 'juan@juan.com';
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
