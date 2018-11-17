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
            <td>
                <a href="{{ route('more', $product->id) }}?quantity=1">
                    {!! $product->name !!}
                </a>
            </td>
            <td>
                <div class="d-none d-md-block d-lg-block d-xl-block">
                    x {!! Form::number('quantity'.$product->id, array_sum($article), ['class' => 'control-label quantity', 'min' => 1, 'maxlength' => 3, 'style' => 'max-width: 50px;', 'id' => 'quantity'.$product->id, isset($show) ? 'disabled' : '']) !!}
                    {!! Form::hidden('product_id', $product->id, ['class' => 'product']) !!}
                    &nbsp;
                    @if (!isset($show))
                    <a href="javascript:void(0);" onclick="setToCart({{ $product->id }});" data-toggle="tooltip" data-placement="left" title="Actualizar este artículo">
                        <span style="font-size: 1.0rem;">
                            <i class="fas fa-sync"></i>
                        </span>
                    </a>
                    @endif                                          
                </div>
                <div class="d-block d-md-none d-lg-none d-xl-none">
                    x {!! Form::number('quantity'.$product->id, array_sum($article), ['class' => 'control-label quantity', 'min' => 1, 'maxlength' => 3, 'style' => 'max-width: 50px;', 'id' => 'quantity'.$product->id, isset($show) ? 'disabled' : '']) !!}
                    {!! Form::hidden('product_id', $product->id, ['class' => 'product']) !!}
                    &nbsp;
                </div>
            </td>
            <td>
                <span class="d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    $ {!! number_format($product->price, 2, ",", ".") !!}
                </span> 
                <span class="d-block d-sm-block d-md-none d-lg-none d-xl-none">
                    ${!! number_format($product->price, 0, ",", ".") !!}
                </span>                             
            </td>
            <td>
                <span class="d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    $ {!! number_format($product->price * array_sum($article), 2, ",", ".") !!}
                </span> 
                <span class="d-block d-sm-block d-md-none d-lg-none d-xl-none">
                    ${!! number_format($product->price * array_sum($article), 0, ",", ".") !!}
                </span>                             
            </td>
            @if (!isset($show))
            <td class="text-center">
                <h5 class="d-none d-md-block d-lg-block d-xl-block">                    
                    <a href="/substract-from-cart?quantity={{ array_sum($article) }}&product_id={{ $product->id }}" data-toggle="tooltip" data-placement="left" title="Eliminar del carrito" class="text-danger">
                        <i class="fas fa-times-circle"></i>
                    </a>                                
                </h5>
                <h5 class="d-block d-md-none d-lg-none d-xl-none">                    
                    <a href="javascript:void(0);" onclick="setToCart({{ $product->id }});" data-toggle="tooltip" data-placement="left" title="Actualizar este artículo">
                        <span style="font-size: 1.0rem;">
                            <i class="fas fa-sync"></i>
                        </span>
                    </a>                                                        
                    &nbsp;                    
                    <a href="/substract-from-cart?quantity={{ array_sum($article) }}&product_id={{ $product->id }}" data-toggle="tooltip" data-placement="left" title="Eliminar del carrito" class="text-danger">
                        <i class="fas fa-times-circle"></i>
                    </a>                                
                </h5>
                {{--  
                <h5 class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                    <a href="/add-to-cart?quantity=1&product_id={{ $product->id }}" data-toggle="tooltip" data-placement="left" title="Añadir unidad" class="text-success">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                    &nbsp;
                    <a href="/substract-from-cart?quantity=1&product_id={{ $product->id }}" data-toggle="tooltip" data-placement="left" title="Restar unidad" class="text-warning">
                        <i class="fas fa-minus-circle"></i>
                    </a>
                    &nbsp;
                    <a href="/substract-from-cart?quantity={{ array_sum($article) }}&product_id={{ $product->id }}" data-toggle="tooltip" data-placement="left" title="Eliminar del carrito" class="text-danger">
                        <i class="fas fa-times-circle"></i>
                    </a>
                </h5>
                <p class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
                    <a href="/add-to-cart?quantity=1&product_id={{ $product->id }}" data-toggle="tooltip" data-placement="left" title="Añadir unidad" class="text-success">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                    &nbsp;
                    <a href="/substract-from-cart?quantity=1&product_id={{ $product->id }}" data-toggle="tooltip" data-placement="left" title="Restar unidad" class="text-warning">
                        <i class="fas fa-minus-circle"></i>
                    </a>
                    &nbsp;
                    <a href="/substract-from-cart?quantity={{ array_sum($article) }}&product_id={{ $product->id }}" data-toggle="tooltip" data-placement="left" title="Eliminar del carrito" class="text-danger">
                        <i class="fas fa-times-circle"></i>
                    </a>
                </p>
                --}}
            </td>
            @endif
        </tr>
    @endforeach
    <tr>
        <td colspan="3">
            <h5>Sub Total</h5>
        </td>
        <td colspan="2">$ {!! number_format($total, 2, ",", ".") !!}</td>
    </tr>
    {{--  
    <tr>
        <td colspan="3">
            <h5>Costo de envío</h5>
        </td>
        <td colspan="2">--</td>
    </tr>
    --}}
    <tr>
        <td colspan="3">
            <h5>Total a pagar (no incluye costo de envío)</h5>
        </td>
        <td colspan="2">
            <h4>
                <strong>$ {!! number_format($total, 2, ",", ".") !!}</strong>
            </h4>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">
            <h5>No hay artículos agregados al carrito de compras</h5>
        </td>
    </tr>
@endif
