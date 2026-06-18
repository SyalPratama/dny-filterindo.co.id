<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response;

class VisitorTracker
{
    public function handle(Request $request, Closure $next): Response
    {
        $agent = new Agent();


        Visitor::updateOrCreate(

            [
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ],

            [
                'browser' => $agent->browser(),

                'browser_version' => $agent->version(
                    $agent->browser()
                ),

                'platform' => $agent->platform(),

                'platform_version' => $agent->version(
                    $agent->platform()
                ),

                'device' => $agent->device(),

                'is_mobile' => $agent->isMobile(),

                'is_tablet' => $agent->isTablet(),

                'is_desktop' => $agent->isDesktop(),

                'is_robot' => $agent->isRobot(),
            ]
        );


        return $next($request);
    }
}