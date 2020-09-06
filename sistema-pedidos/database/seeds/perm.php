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


// roles
		$admin_rol = new Rol();
		$admin_rol->slug = 'admin';
		$admin_rol->descrip = 'Administrador del sitema';
		$admin_rol->save();

		$superadmin_rol = new Rol();
		$superadmin_rol->slug = 'superadmin';
		$superadmin_rol->descrip = 'Superadmin del sistema';
		$superadmin_rol->save();
// fin roles
// permisos permisos
		$createPermisos = new Permiso();
		$createPermisos->slug = 'vista-permisos';
		$createPermisos->descrip = 'vista permisos';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'listar-permiso';
		$createPermisos->descrip = 'Listar permisos';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'crear-permisos';
		$createPermisos->descrip = 'Crear permisos';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'actualizar-permisos';
		$createPermisos->descrip = 'Actualizar permisos';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'eliminar-permisos';
		$createPermisos->descrip = 'Eliminar permisos';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);
// fin permisos

// permisos roles
		$createPermisos = new Permiso();
		$createPermisos->slug = 'vista-roles';
		$createPermisos->descrip = 'vista roles';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'listar-permiso';
		$createPermisos->descrip = 'Listar roles';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'crear-roles';
		$createPermisos->descrip = 'Crear roles';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'actualizar-roles';
		$createPermisos->descrip = 'Actualizar roles';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);


		$createPermisos = new Permiso();
		$createPermisos->slug = 'eliminar-roles';
		$createPermisos->descrip = 'Eliminar roles';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);
// fin permisos roles
// fin de los permisos de admin


		$admin_ver_permisos = Permiso::where('slug','vista-permisos')->first();
        $admin_listar_permisos = Permiso::where('slug','listar-permisos')->first();
		$admin_crear_permisos = Permiso::where('slug','crear-permisos')->first();
        $admin_actualizar_permisos = Permiso::where('slug','actualizar-permisos')->first();
        $admin_eliminar_permisos = Permiso::where('slug','eliminar-permisos')->first();

		$admin_ver_roles = Permiso::where('slug','vista-roles')->first();
        $admin_listar_roles = Permiso::where('slug','listar-roles')->first();
		$admin_crear_roles = Permiso::where('slug','crear-roles')->first();
        $admin_actualizar_roles = Permiso::where('slug','actualizar-roles')->first();
		$admin_eliminar_roles = Permiso::where('slug','eliminar-roles')->first();

        $superadmin_users = Permiso::where('slug', 'vista-usuarios')->first();


		$admin_rol = Rol::where('slug','admin')->first();
		$superadmin_rol = Rol::where('slug', 'superadmin')->first();


// permisos superadmin ver usuarios
		$editUsers = new Permiso();
		$editUsers->slug = 'ver-usuarios';
		$editUsers->descrip = 'Ver Usuarios';
		$editUsers->save();
		$editUsers->roles()->attach($superadmin_rol);
// fin permisos super admin

		$admin_rol = Rol::where('slug','admin')->first();
		$superadmin_rol = Rol::where('slug', 'superadmin')->first();
		$admin_per = Permiso::where('slug','crear-permisos','listar-permisos','actualizar-permisos','eliminar-permisos','vista-permisos','crear-roles','listar-roles','actualizar-roles','eliminar-roles','vista-roles')->first();
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
