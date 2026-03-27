<?php

namespace App\Http\Middleware;

use App\Models\Subscription;
use App\Models\Vcard;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    public function handle(Request $request, Closure $next): Response
    {
        $request = $next($request);

        $subscription = Subscription::with('plan')
            ->where('status', Subscription::ACTIVE)
            ->where('tenant_id', getLogInUser()->tenant_id)
            ->first();
            
        if (
            $subscription &&
            $subscription->payment_type === null &&
            now()->diffInMinutes($subscription->created_at) > 30
        ) {
                return redirect(route('subscription.upgrade'))
                ->withErrors(__('messages.subscription.subscription_expired'));
        }

        if (! $subscription) {
            Vcard::where('tenant_id', getLogInUser()->tenant_id)->update([
                'status' => 0,
            ]);

            return redirect(route('subscription.upgrade'))
                ->withErrors(__('messages.subscription.subscription_expired'));
        }

        if ($subscription->isExpired()) {
            Vcard::where('tenant_id', getLogInUser()->tenant_id)->update([
                'status' => 0,
            ]);

            return redirect(route('subscription.upgrade'))
                ->withErrors(__('messages.subscription.subscription_expired'));
        }

        return $request;
    }
}
