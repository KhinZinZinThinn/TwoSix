<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getWelcome(){
        $cats=Category::all();
        $pds=Product::OrderBy('id','desc')->paginate("8");
        return view('welcomeone')->with(['pds'=>$pds,'cats'=>$cats]);
    }

    public function getProductImage($img_name){
        $file=Storage::disk('product')->get($img_name);
        return response($file,200);
    }

    public function getProductCategory($id){
        $cats=Category::all();
        $pds=Product::OrderBy('id','desc')->where('category_id',$id)->paginate("8");
        return view('welcomeone')->with(['pds'=>$pds,'cats'=>$cats]);
    }

    public function getSearch(Request $request){
        $q=$request['q'];
        $cats=Category::all();
        $pds=Product::OrderBy('id','desc')->where('product_name',"LIKE","%$q%")->paginate("8");
        return view('welcomeone')->with(['pds'=>$pds,'cats'=>$cats]);
    }

    public function getAddCart($id){
        $pd=Product::whereId($id)->firstOrFail();
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->addCart($pd->id,$pd);
        Session::put('cart',$cart);
        return redirect()->back();

    }

    public function getCart(){
        if(Session::has('cart')){
            $cart=Session::get('cart');
            return view('cart')->with(['cart'=>$cart->items,'totalAmount'=>$cart->totalAmount]);
        }else

        return view('cart');
    }

    public function getIncreaseCart($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->increase($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function getDecreaseCart($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->decrease($id);
        if(count($cart->items) <=0){
            Session::forget('cart');
        }else{
            Session::put('cart',$cart);
        }
        return redirect()->back();
    }

    public function getCancelCart(){
        Session::forget('cart');
        return redirect()->back();
    }

    public function postMessage(Request $request){
        $this->validate($request,
        ['email'=>'required|email',
        'phone'=>'required',
            'message'=>'required'
        ]);
        $email=$request['email'];
        $phone=$request['phone'];
        $message=$request['message'];

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.co';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'khinzinzinthinn1@gmail.com';                 // SMTP username
            $mail->Password = 'dfzrzmahojweqhrl';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($email, $email);
            $mail->addAddress('khinzinzinthinn@gmail.com', 'Khinzinzinthinn');     // Add a recipient


            //Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = $message."<br>".$phone;


            $mail->send();
            return redirect()->back()->with('info','The message sent');
        } catch (Exception $e) {
            return redirect()->back()->with('err','Message has not been sent');
        }
    }
}
