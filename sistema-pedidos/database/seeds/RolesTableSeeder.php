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

		$negocio_rol = new Rol();
		$negocio_rol->slug = 'negocio';
		$negocio_rol->descrip = 'Rol para el negocio subscrito y aprovado';
		$negocio_rol->save();

		$superadmin_rol = new Rol(); 
		$superadmin_rol->slug = 'superadmin';
		$superadmin_rol->descrip = 'Superadmin del sistema';
		$superadmin_rol->save();
// fin roles

// permisos permisos
		$createPermisos = new Permiso();
		$createPermisos->slug = 'ver-permisos';
		$createPermisos->descrip = 'ver permisos';
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

// permisos permisos usuarios
		$createPermisos = new Permiso();
		$createPermisos->slug = 'ver-usuarios';
		$createPermisos->descrip = 'ver usuarios';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'crear-usuarios';
		$createPermisos->descrip = 'Crear usuarios';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'actualizar-usuarios';
		$createPermisos->descrip = 'Actualizar usuarios';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'eliminar-usuarios';
		$createPermisos->descrip = 'Eliminar usuarios';
		$createPermisos->save();
		$createPermisos->roles()->attach($admin_rol);
// fin permisos usuarios

// permisos roles
		$createPermisos = new Permiso();
		$createPermisos->slug = 'ver-roles';
		$createPermisos->descrip = 'ver roles';
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

// permisos negocio
		$createPermisos = new Permiso();
		$createPermisos->slug = 'ver-negocio';
		$createPermisos->descrip = 'ver negocio';
		$createPermisos->save();
		$createPermisos->roles()->attach($negocio_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'crear-negocio';
		$createPermisos->descrip = 'Crear negocio';
		$createPermisos->save();
		$createPermisos->roles()->attach($negocio_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'actualizar-negocio';
		$createPermisos->descrip = 'Actualizar negocio';
		$createPermisos->save();
		$createPermisos->roles()->attach($negocio_rol);

		$createPermisos = new Permiso();
		$createPermisos->slug = 'eliminar-negocio';
		$createPermisos->descrip = 'Eliminar negocio';
		$createPermisos->save();
		$createPermisos->roles()->attach($negocio_rol);
// fin permisos negocio

// fin de los permisos de admin

		$admin_ver_permisos = Permiso::where('slug','ver-permisos')->first();
		$admin_crear_permisos = Permiso::where('slug','crear-permisos')->first();
        $admin_actualizar_permisos = Permiso::where('slug','actualizar-permisos')->first();
        $admin_eliminar_permisos = Permiso::where('slug','eliminar-permisos')->first();

		$admin_ver_roles = Permiso::where('slug','ver-roles')->first();
		$admin_crear_roles = Permiso::where('slug','crear-roles')->first();
        $admin_actualizar_roles = Permiso::where('slug','actualizar-roles')->first();
		$admin_eliminar_roles = Permiso::where('slug','eliminar-roles')->first();

		$negocio_ver_negocio = Permiso::where('slug','ver-negocio')->first();
		$negocio_crear_negocio = Permiso::where('slug','crear-negocio')->first();
        $negocio_actualizar_negocio = Permiso::where('slug','actualizar-negocio')->first();
		$negocio_eliminar_negocio = Permiso::where('slug','eliminar-negocio')->first();

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
		$admin_per = Permiso::all();
		$regocio_rol = Rol::where('slug', 'negocio')->first();

		$admin = new User();
		$admin->name = 'Juan Perez';
		$admin->email = 'juan@juan.com';
		$admin->password = bcrypt('123456789');
		$admin->save();
		$admin->roles()->attach($admin_rol);
		$admin->permisos()->attach($admin_per);

		$negocio = new User();
		$negocio->name = 'kush';
		$negocio->email = 'kush@gmail.com';
		$negocio->plan = 'anual';
		$negocio->password = bcrypt('123456789');
		$negocio->save();
		$negocio->roles()->attach($negocio_rol);
		$negocio->permisos()->attach([$negocio_ver_negocio->id, $negocio_crear_negocio->id, $negocio_actualizar_negocio->id, $negocio_eliminar_negocio->id]);
    }
}
