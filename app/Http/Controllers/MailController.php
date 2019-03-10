<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Cotizacion;
use App\Mail\RegalosEmpresariales;
use App\Mail\Franquicia;
use App\Mail\Contacto;
use Carbon\Carbon;
class MailController extends Controller
{

       public function imageEmbed($image)
    {
       

        // Read image path, convert to base64 encoding
        $imageData = base64_encode(file_get_contents($image));

        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data:'.mime_content_type($image).';base64,'.$imageData;

        // Echo out a sample image
       return $src;
    }

    public function postulacion(){
        return;
    }

    public function regalosEmpresariales(Request $request)
    {
        
        $image = $request->file('image');
        $image = $this->imageEmbed($image->path());
        
        $mail = new RegalosEmpresariales(
            $request->phone,
            $request->email,
            $image,
            
            $request->products,
            $request->name,
            $request->qty,
           Carbon::parse($request->date)->format('d/m/Y')
        );

        MailController::mailAdmin($mail);

        return redirect('/');
        

    }

    public function franquicia(Request $request)
    {
        $mail = new Franquicia(
            $request->name,
            $request->mail,
            $request->phone,
            $request->msg
        );

        MailController::mailAdmin($mail);
        return redirect('/');
    }

    public function contacto(Request $request)
    {
        $mail = new Contacto(
            $request->name,
            $request->mail,
            $request->subject,
            $request->msg
        );

        MailController::mailAdmin($mail);
        return redirect('/');
    }

     private static function mailAdmin($email){
        Mail::to('matesfabi@gmail.com')
    ->cc('roominagii@gmail.com')
    ->cc('rsbertoa90@gmail.com')
    ->send($email);
    }


    public static function mailOrderToClient($order)
    {
        Mail::to($order->email)
            ->send(new Cotizacion($order));
    }
}
