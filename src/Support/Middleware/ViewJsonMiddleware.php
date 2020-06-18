<?php

namespace TheComet\Common\Support\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ViewJsonMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!config('app.debug') || !$this->shouldConvert($request, $response)) {
            return $response;
        }

        if ($response->isSuccessful()) {
            $originalContent = $response->getOriginalContent();
            $data = $originalContent->getData();
            return response()->json($data);
        }

        $flash = $this->getFlashData($request);

        if (count($flash) > 0) {
            return response()->json($flash, $response->getStatusCode());
        }

        return $response;
    }

    private function shouldConvert(Request $request, $response): bool
    {
        if ($response instanceof JsonResponse) {
            return false;
        }

        if ($response->isServerError()) {
            return false;
        }

        if ($response->isSuccessful() && !method_exists($response->getOriginalContent(), 'getData')) {
            return false;
        }

        return $request->ajax() || $request->wantsJson() || $request->get('view') === 'json';
    }

    private function getFlashData(Request $request)
    {
        $sessionData = collect($request->session()->all());
        $keys = $request->session()->get('flash.new');
        $data = $sessionData->only($keys);
        $request->session()->forget($keys);

        return $data;
    }
}
