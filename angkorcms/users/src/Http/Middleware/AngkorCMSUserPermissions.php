<?php namespace AngkorCMS\Users\Http\Middleware;

use AngkorCMS\Users\Repositories\Eloquent\AngkorCMSUserRepository;
use AngkorCMS\Users\Repositories\Eloquent\AngkorCMSGroupRepository;
use Closure;
use Config;
use Illuminate\Contracts\Auth\Guard;
use App;
use Session;
use Illuminate\Support\Str;

class AngkorCMSUserPermissions {

    protected $user_repository;
    protected $group_repository;
    protected $auth;

    public function __construct(AngkorCMSUserRepository $user_repository, AngkorCMSGroupRepository $group_repository, Guard $auth) {
        $this->user_repository = $user_repository;
        $this->group_repository = $group_repository;
        $this->auth = $auth;
    }


    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next, $groupName) {
        if (!$this->auth->guest()) {
            if ($this->auth->user()->admin == 1) {
                //admin can access everything
                return $next($request);
            }

            $group = $this->auth->user()->group;
            while($group!= null) {
                if(Str::slug($groupName) ==  Str::slug($group['name'])){
                    //If group is in group hierachy => authorize the request
                    return $next($request);
                }
                $group = $group['relations']["parentRecursive"];
            }
        }
        return $this->error($request);
    }

    public function error($request) {
        if ($request->ajax()) {
            return response('Unauthorized.', 403);
        } else {
            return App::abort(403, 'Unauthorized action.');
        }
    }

}
