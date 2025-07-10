<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBookingUnit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $productId = $request->query('product_id') ?? $request->input('product_id');

        if (!$productId) {
            return redirect()->route('frontend.unit_bisnis.all-katalog')->withErrors('Produk tidak ditemukan.');
        }

        $product = Product::find($productId);
        if (!$product || !in_array($product->unit_bisnis_id, [1, 2])) {
            return redirect()->route('frontend.unit_bisnis.all-katalog')->withErrors('Produk bukan bagian dari unit bisnis Ruangan/Inventaris.');
        }

        return $next($request);
    }
}
