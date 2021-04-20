<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ModifyFilterQuery
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $result = [];
        $query = $request->all();
        if (!$request->has('filter')) {
            $request->filter = [];
        }

        foreach ($request->all() as $key => $value) {
            switch ($key) {
                case 'dien-tich':
                    $result['realty.area_between'] = $value;
                    break;
                case 'loai-tin-dang':
                    $result['loai-tin-dang'] = $value;
                    break;
                case 'gia':
                    $result['price_between'] = $value;
                    break;
                case 'loai-bds':
                    $result['loai-bds'] = $value;
                    break;
                case 'huong':
                    $result['huong'] = $value;
                    break;
                case 'tinh':
                    $result['tinh'] = $value;
                    break;
                case 'huyen':
                    $result['huyen'] = $value;
                    break;
                case 'xa':
                    $result['xa'] = $value;
                    break;
                case 'dia-chi':
                    $result['realty.full_address'] = $value;
                    break;
                default:
                    break;
            }
        }
        $request->request->set('filter', array_merge($request->filter, $result));
        return $next($request);
    }
}