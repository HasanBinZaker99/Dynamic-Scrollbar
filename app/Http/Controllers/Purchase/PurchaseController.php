<?php

namespace App\Http\Controllers\Purchase;
use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\CRM\Leeds;
use App\Models\Purchase\PurchaseType;
use App\Models\Supplier\Supplier;
use App\Models\Purchase\purchase;
use App\Models\Product\Unit;
use App\Models\Settings\CompanyInfo;
use PDF;
use Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Symfony\Component\String\length;

class PurchaseController extends Controller
{
    public function addingPurchase(){

        return view('purchase.adding-purchase');
    }
//    public function addPurchase(){
//
//        return view('purchase.createpurchase');
//    }
    public function getTables(){
//        $data = Product::all();
        $user = Supplier::all();
//        $leeds = Leeds::all();
//        $supp = User::all()->where('id', '=', session('id'));
        return response()->json($user) ;
    }
    public function getClients(){
        $leeds = Leeds::all();
        return response()->json($leeds) ;
    }
    public function getProducts(){
        $data = Product::all();
        return response()->json($data) ;
    }
    public function getBranch(){
        $data = CompanyInfo::all();
        return response()->json($data) ;
    }
    public function getPurchaseType(){
        $data = PurchaseType::all();
        return response()->json($data) ;
    }
    public function getUnits(){
        $productId = request('id');
        $data = Product::where('id',$productId)->first();
        $unit = Unit::where('id',$data->unitId)->first();
        return response()->json($unit);

    }
    public function getSuppAttribute(){
        $user = request('id');
        $data = Supplier::where('id',$user)->first();
        return response()->json($data);
    }

//    public function __construct(){
//        $this->middleware('auth');
//    }
    public function getAuth(){
        $supp = Auth::user();
        return response()->json($supp) ;
    }
    public function updatePurchase($id){
//        $data = purchase::find($id);
        return view('purchase.updatepurchase',compact('id'));
    }
    public function showPurchase(){
        $user = request('id');
        $data = purchase::where('id',$user)->first();
//        $supp = Supplier::where('id',$data->supplierId)->first();
//        $data = DB::table('purchases')
//            ->where('id',$pur)
//            ->join('suppliers','purchases.supplierId','=','suppliers.id')
//            ->select('purchases.*','suppliers.companyOrStoreName as supplierId')
//            ->get();

        return response()->json($data);
    }
    public function showSupplier(){
        $suppId = request('id');
        $data = purchase::where('id',$suppId)->first();
        $supp = Supplier::where('id',$data->supplierId)->first();
        return response()->json($supp);
    }
    public function showPurchaseType(){
        $pTypeId = request('id');
        $data = purchase::where('id',$pTypeId)->first();
        $purchaseType = PurchaseType::where('id',$data->purchaseCategory)->first();
        return response()->json($purchaseType);
    }
    public function showClient(){
        $clientId = request('id');
        $data = purchase::where('id',$clientId)->first();
        $client = Leeds::where('id',$data->clientId)->first();
        return response()->json($client);
    }
    public function showBranch(){
        $companyId = request('id');
        $data = purchase::where('id',$companyId)->first();
        $company = CompanyInfo::where('id',$data->branch)->first();
        return response()->json($company);
    }
    public function showUser(){
        $userId = request('id');
        $data = purchase::where('id',$userId)->first();
        $user = User::where('id',$data->userId)->first();
        return response()->json($user);
    }
    public function showProduct(){
        $productId = request('id');
        $data = purchase::where('id',$productId)->first();
        $products = json_decode($data->products);
//        Log::info($products->productId);
//        foreach($products as $product){
//            $good = $product->productId;
//        }
//        $name = Product::where('id',$products->productId)->first();
       return response()->json($products);
    }
   public function showProductName(){
        $itemId = request('id');
        $data = Product::where('id',$itemId)->first();
        return response()->json($data);
    }
    public function storePurchase(Request $req){
        $purchase = $req->id;
        $data = new purchase;
        $data->purchaseCategory = $req->purchaseCategory;
        $data->userId = $req->userId;
        $data->clientId = $req->clientId;
        $data->supplierId = $req->supplierId;
        $data->products = json_encode($req->products);
        $data->grandTotal = $req->grandTotal;
        $data->paid = $req->paid;
        $data->due = $req->due;
        $data->date = $req->date;
        $data->branch = $req->branch;
        $data->paymentStatus= $req->paymentStatus;
        $data->status = $req->status;
        $data->save();

       return response('purchase-list');
    }
    public function editPurchase(Request $req){

        $data = purchase::find($req->id);
        $data->purchaseCategory = $req->purchaseCategory;
        $data->userId = $req->userId;
        $data->clientId = $req->clientId;
        $data->supplierId = $req->supplierId;
        $data->products = json_encode($req->products);
        $data->grandTotal = $req->grandTotal;
        $data->paid = $req->paid;
        $data->due = $req->due;
        $data->date = $req->date;
        $data->branch = $req->branch;
        $data->paymentStatus= $req->paymentStatus;
        $data->status = $req->status;
        $data->save();

        return response('purchase-list');
    }
    public function purchaseList(){
        $data = purchase::where('status', 0)->get();

//        $data = DB::table('purchases')
//            ->join('users', 'purchases.userId', '=', 'users.id')
//            ->select('purchases.*','users.name as userId')
//            ->get();
//            ->leftjoin('leeds', 'purchases.clientId', '=', 'leeds.id')
//            ->leftjoin('suppliers', 'purchases.supplierId', '=', 'suppliers.id')
//            ->select('purchases.*', 'users.name as userId', 'leeds.clientName as clientId', 'suppliers.companyOrStoreName as supplierId')
//            ->get();
        return view('purchase.purchaselist',['purchases'=>$data]);
    }
    public function getPurchaseInformation(Request $request){
        $user = purchase::where('id',$request->id)->first();
        return $user;
    }
    function purchaseDelete(Request $request){
        purchase::where('id',$request->id)->delete();
        return redirect()->back()->with('Delete_Message', 'Purchase Deleted Successfully');
    }
    public function purchaseInvoice(Request $req){
         $purchases = purchase::where('id',$req->id)->first();
         $leeds = Leeds::where('id',$purchases->clientId)->first();
        if($purchases->clientId === null){
            $leeds = Leeds::all('clientName')->first();
        }
         $suppliers = Supplier::where('id',$purchases->supplierId)->first();
        if($purchases->supplierId === null){
            $leeds = Supplier::all('companyOrStoreName')->first();
        }
        return view('purchase.purchaseinvoice',['purchases'=>$purchases,'leeds'=>$leeds,'suppliers'=>$suppliers]);
    }
    public Function purchasePDF(Request $req){
        $purchases = purchase::where('id',$req->id)->first();
        $leeds = Leeds::where('id',$purchases->clientId)->first();
        $suppliers = Supplier::where('id',$purchases->supplierId)->first();
        $pdf = PDF::loadview('purchase.purchasePDF',['purchases'=>$purchases,'leeds'=>$leeds,'suppliers'=>$suppliers]);
        return $pdf->setPaper('a4', 'letter')->setWarnings(false)->stream("view_purchase.pdf");
    }
    public Function purchaseDwnPDF(Request $req){
        $purchases = purchase::where('id',$req->id)->first();
        $leeds = Leeds::where('id',$purchases->clientId)->first();
        $suppliers = Supplier::where('id',$purchases->supplierId)->first();
        $pdf = PDF::loadview('purchase.purchasePDF',['purchases'=>$purchases,'leeds'=>$leeds,'suppliers'=>$suppliers]);
        return $pdf->download("view_purchase.pdf");
    }
    public Function purchaseMailPDF(Request $req){
        $purchases = purchase::where('id',$req->id)->first();
        $leeds = Leeds::where('id',$purchases->clientId)->first();
        $suppliers = Supplier::where('id',$purchases->supplierId)->first();
        $pdf = PDF::loadview('purchase.purchasePDF',['purchases'=>$purchases,'leeds'=>$leeds,'suppliers'=>$suppliers]);
        Mail::send('purchase.purchasePDF',['purchases'=>$purchases,'leeds'=>$leeds,'suppliers'=>$suppliers],
        function ($message) use ($leeds, $purchases, $pdf){
            $message
                ->to($leeds->email)
                ->subject($purchases->purchaseCategory)
                ->attachData($pdf->output(),'view_purchase.pdf');
        });
        return redirect()->back();
    }
    public function purchaseTotal(){
//        $user = purchase::all();
        $data = purchase::where('status', 2)->get();
        return view('purchase.totalpurchase',['purchases'=>$data]);
//        return response()->json($data);
    }
    public function approvalView(){
        $data = purchase::where('status', 1)->get();
        return view('purchase.approvepurchase',['purchases'=>$data]);
    }
    public function purchaseApproved($id){
        $data = purchase::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('message','Purchase Approved');
    }

}
