<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        view()->composer('*', function($view){
            if ( Auth::check() ) {
                /**
                 * [$permisos description]
                 * Variable que almacenará las rutas
                 * a las que el usuario tendrá permitido
                 * ingresar por medio del menú de navegación
                 * @var array
                 */
                // $permisos = array();

                /**
                 * Primero se hace consulta para obtener
                 * los menús autorizados al usuario
                 */
                /**$menusAutorizados = DB::table('permisos')
                    ->join('submenus', 'permisos.submenu_id', '=', 'submenus.id')
                    ->join('menus', 'submenus.menu_id', '=', 'menus.id')
                    ->select('menus.id','menus.menu', 'menus.href')
                    ->distinct()
                    ->where('permisos.user_id', '=', Auth::user()->id)
                    ->whereNull('permisos.deleted_at')
                    ->get();*/

                /**
                 * Para poser recorrer los menus autorizados
                 * se pasa a array a la variable
                 */
                // $arrayMenus = json_decode($menusAutorizados, true);

                /**
                 * Se vuelve a hacer otra consulta
                 * para obtener los submenus autorizados
                 * al usuario
                 */
                /**$submenusAutorizados = DB::table('permisos')
                    ->join('submenus', 'permisos.submenu_id', '=', 'submenus.id')
                    ->select('submenus.submenu', 'submenus.href', 'submenus.menu_id')
                    ->where('permisos.user_id', '=', Auth::user()->id)
                    ->whereNull('permisos.deleted_at')
                    ->get();*/

                /**
                 * Se pasa a array para recorrer los resultados
                 */
                // $arraySubmenus = json_decode($submenusAutorizados, true);

                /**
                 * Se recorren los menús
                 * autorizados al usuario
                 */
                /**foreach ($arrayMenus as $m) {
                    $menu = array();
                    $submenu = array();
                    $submenus = array();


                    /**
                     * Se recorre cada elemento
                     * de los submenus, si el id
                     * del menú al que corresponde
                     * coincide con el del menú
                     * autorizado, se agrega a la
                     * lista de submenus
                     */
                    /**foreach ($arraySubmenus as $s) {
                        if( $s['menu_id'] == $m['id'] ){
                            $submenu['submenu'] = $s['submenu'];
                            $submenu['ruta'] = $s['href'];
                            array_push($submenus, $submenu);
                        }
                    }


                    $menu['menu'] = $m['menu'];
                    $menu['ruta'] = $m['href'];
                    $menu['submenus'] = $submenus;

                    // Se agrega a los permisos del usuario
                    array_push($permisos, $menu);
                }*/

                // $view->with(['currentUser' => Auth::user()->empleado->nombre, 'permisos' => $permisos]);
                $view->with(['usuario' => Auth::user()->empleado->nombre]);
            }
        });
    }
}
