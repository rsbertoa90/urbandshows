@extends('mails.base')

@section('content')
    <div>
        <p>
            {{$order->client}}!,
            Te enviamos una copia del presupuesto que solicitaste.
        </p>
        <p>
            Uno de  nuestros representantes se comunicara con vos a la brevedad para confirmar disponibilidad y darte los detalles para el pago.
        </p>
        <p>Gracias por elegir Mates Fabi!</p>

        <table class="table table-bordered table-striped"  >
                  <thead>
                      <tr>
                          <td>Codigo</td>
                          <td>Producto</td>
                          <td>Precio</td>
                      </tr>
                    
                  </thead>
                  
                  <tbody>
                      
                      @foreach ($order->orderItems as $product)
                  
                      <tr>
                          <td> {{$product->code}} </td>
                          <td> {{$product->name}} </td>
                          <td> ${{number_format($product->price,2)}} </td>
                      </tr>
                      @endforeach
                    </tbody>
        </table>
        <span class="font-weight-bold text-warning">TOTAL: {{$order->total}}</span>


    </div>
@endsection