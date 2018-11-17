@if (count($shoppingCart) > 0)         
    @php
        $total = 0;                    
    @endphp  
    @foreach($shoppingCart as $article)     
        @php
            $product = \App\Product::getProductById(array_keys($article)[0]);
            $total += $product->price * array_sum($article);
        @endphp
        <tr>
            <td style="border-left-width: 0;">
                <h5>{!! $product->name !!}</h5>
            </td>
            <td>
                <h5>{!! array_sum($article) !!}</h5>
            </td>
            <td>
                <h5>$ {!! number_format($product->price, 2, ",", ".") !!}</h5>
            </td>
            <td>
                <h5>$ {!! number_format($product->price * array_sum($article), 2, ",", ".") !!}</h5>
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3" style="border-left-width: 0;">
            <h5>Sub-total</h5>
        </td>
        <td colspan="2"><h5>$ {!! number_format($total, 2, ",", ".") !!}</h5></td>
    </tr>
    {{-- 
    <tr>
        <td colspan="3" style="border-left-width: 0;">
            <h5>Costo de envío</h5>
        </td>
        <td colspan="2"><h5>$ 10.000,00</h5></td>
    </tr>
    --}}
    <tr>
        <td colspan="3" style="border-left-width: 0;">
            <h5>Total a pagar</h5>
        </td>
        <td colspan="2">
            <h5>
                <strong>$ {!! number_format($total, 2, ",", ".") !!}</strong>
            </h5>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">
            <h5>No hay artículos agregados al carrito de compras</h5>
        </td>
    </tr>
@endif
