<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\MpesaTransaction;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class MpesaController extends Controller
{
 
  
        public function index(Request $request)
    {

       $userid = Auth::user()->id;
        $user = Auth::user();
        $userRole = $user->roles->pluck('name')->all();

        $userRole = $userRole[0];

        if ($userRole == 'Super Admin' || $userRole == 'System Admin' || $userRole == 'Employee') {
      $data = MpesaTransaction::orderBy('created_at','DESC')->get();
           
        }else{

        $phone = $user->phone;

        $phone = (substr($phone, 0, 1) == "+") ? str_replace("+", "", $phone) : $phone;
        $phone = (substr($phone, 0, 1) == "0") ? preg_replace("/^0/", "254", $phone) : $phone;
        $phone = (substr($phone, 0, 1) == "7") ? "254{$phone}" : $phone;

        $data = MpesaTransaction::where('account','=',$phone)->orderBy('created_at','DESC')->get();

        }

        

        return view('savings.index',compact('data'));
    }
    
       public function collectionUrl(Request $request)
    {
        //  $data = json_decode($request->getContent());
        
        $data = $request->getContent();
        $mpesa_transaction = new MpesaTransaction();
        
        $data = json_decode($data, true);
        
        $mpesa_transaction->TransactionType = $data['provider'];
        $mpesa_transaction->TransID = $data['mpesa_reference'];
        // $mpesa_transaction->BillRefNumber =  $request->getContent();
        $mpesa_transaction->TransID = $data['mpesa_reference']; 
        $mpesa_transaction->TransTime = $data['created_at']; 
        $mpesa_transaction->invoice_id = $data['invoice_id']; 
        $mpesa_transaction->state = $data['state'];  
        $mpesa_transaction->charges = $data['charges']; 
        $mpesa_transaction->net_amount = $data['net_amount']; 
        $mpesa_transaction->currency =$data['currency']; 
        $mpesa_transaction->value =$data['value']; 
        $mpesa_transaction->account = $data['account']; 
        $mpesa_transaction->api_ref = $data['api_ref']; 
        
        if(!empty($data['clearing_status'])){
            $mpesa_transaction->clearing_status = $data['clearing_status'];
        }
         
        $mpesa_transaction->host = $data['host']; 
        $mpesa_transaction->retry_count =$data['retry_count'];  
        $mpesa_transaction->failed_reason =$data['failed_reason']; 
        $mpesa_transaction->failed_code =$data['failed_code'];   
        $mpesa_transaction->failed_code_link = $data['failed_code_link']; 
        $mpesa_transaction->challenge = $data['challenge'];  
        $mpesa_transaction->trans_updated_at =$data['updated_at']; 
        $mpesa_transaction->save();

          if (!empty($data->['state'])) {

            $registration = Registration::where('id','=',$date['api_ref'])->first();
             
             $registration->update(['invoice_id'=>$date['invoice_id']]);
        }

        if ($data->['state'] == 'COMPLETE') {

            $registration = Registration::where('id','=',$date['api_ref'])->first();
             
             $registration->update(['mpesa_transaction_id' => $mpesa_transaction->id ]);
        }
    }
 
 
 

    public function createValidationResponse($result_code, $result_description){
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new Response();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        // return $response;
    }
   
    public function mpesaValidation(Request $request)
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }
}