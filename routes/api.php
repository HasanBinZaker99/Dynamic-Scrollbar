<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRM\CartController;

use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\MenuPermission\MenuPermissionController;

use App\Http\Controllers\CRM\QuotationController;
use App\Http\Controllers\CRM\MeasureController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Labour\LabourController;
//leave
use App\Http\Controllers\Hrm\Leave\HolidayController;
use App\Http\Controllers\Hrm\Leave\ApplyLeaveController;
//payroll
use App\Http\Controllers\Hrm\Payroll\PayrollGenerateController;
use App\Http\Controllers\Hrm\Payroll\GeneratePayslipController;
//project
use App\Http\Controllers\Project\ProjectDealController;
use App\Http\Controllers\Account\AccountController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});
Route::get('/quotations',[CartController::class,'getQuotations'])->name('quotations');
Route::get('/houseTypes',[CartController::class,'getHouseTypes'])->name('houseTypes');
Route::get('/decorTypes',[CartController::class,'getDecorTypes'])->name('decorTypes');
Route::get('/description',[CartController::class,'getDescription'])->name('description');
Route::get('/sub',[CartController::class,'getSubject'])->name('sub');
Route::post('/create-cart',[QuotationController::class,'createCart'])->name('create-cart');
Route::get('/getBanks',[AccountController::class,'getBanks'])->name('get.Banks');

Route::get('/measureTypes',[MeasureController::class,'getMeasureTypes'])->name('measureTypes');
Route::get('/measure-struct',[MeasureController::class,'getMeasureStruct'])->name('measure-struct');
Route::get('/rate',[MeasureController::class,'getRate'])->name('rate');

Route::post('/create-measure-cart',[MeasureController::class,'createMeasureCart'])->name('create-measure-cart');

Route::get('/menuList',[MenuController::class,'menuApi'])->name('menu');
Route::post('/submenu-req',[MenuController::class,'submenuReq'])->name('submenuReq');

Route::get('/userlist',[UserController::class,'userlistApi'])->name('user');
Route::get('/menu-permission',[MenuPermissionController::class,'MenuPermitView'])->name('MenuPermitView');
Route::post('/menu-permission',[MenuPermissionController::class,'givepermission'])->name('menupermission');
Route::get('/previous-permission',[MenuPermissionController::class,'previousPermission'])->name('previousPermission');
Route::get('/selected-permission',[MenuPermissionController::class,'selectedPermission'])->name('selectedPermission');
Route::post('/update-menu-permission/{id}',[MenuPermissionController::class,'updatePermission'])->name('updatePermission');
Route::get('/subMenuList',[MenuController::class,'getSubMenus'])->name('getSubMenus');

Route::post('/menu-permission',[MenuPermissionController::class,'givepermission'])->name('menupermission');
Route::post('/user-menu-permission',[MenuPermissionController::class,'getUserMenuInformation'])->name('getUserMenuInformation');

//for purchase
Route::get('/table-data',[PurchaseController::class,'getTables'])->name('table-data');
Route::get('/client-data',[PurchaseController::class,'getClients'])->name('client-data');
Route::get('/product-data',[PurchaseController::class,'getProducts'])->name('product-data');
Route::get('/unit-data', [PurchaseController::class, 'getUnits'])->name('unit-data');
Route::get('/supp-data', [PurchaseController::class, 'getSuppAttribute'])->name('supp-data');
Route::get('/branch-data', [PurchaseController::class, 'getBranch'])->name('branch-data');
Route::get('/purchaseType-data', [PurchaseController::class, 'getPurchaseType'])->name('purchaseType-data');
route::post('/store-purchase',[PurchaseController::class,'storePurchase'])->name('store-purchase');
route::post('/edit-purchase',[PurchaseController::class,'editPurchase'])->name('edit-purchase');
Route::get('/user-data', [PurchaseController::class, 'getAuth'])->name('user-data');
Route::get('/prefill-data', [PurchaseController::class, 'showPurchase'])->name('prefill-data');
Route::get('/prefill-sup', [PurchaseController::class, 'showSupplier'])->name('prefill-sup');
Route::get('/prefill-purchaseType', [PurchaseController::class, 'showPurchaseType'])->name('prefill-purchaseType');
Route::get('/prefill-client', [PurchaseController::class, 'showClient'])->name('prefill-client');
Route::get('/prefill-branch', [PurchaseController::class, 'showBranch'])->name('prefill-branch');
Route::get('/prefill-user', [PurchaseController::class, 'showUser'])->name('prefill-user');
Route::get('/prefill-product', [PurchaseController::class, 'showProduct'])->name('prefill-product');
Route::get('/prefill-product-name', [PurchaseController::class, 'showProductName'])->name('prefill-product-name');
//for labour
Route::get('/labourname-data',[LabourController::class,'getLabourNames'])->name('labourname-data');
Route::get('/labourtype-data',[LabourController::class,'getLabourTypes'])->name('labourtype-data');
Route::get('/purchase-type-data',[LabourController::class,'getPurchaseType'])->name('purchase-type-data');
Route::get('/product-data',[LabourController::class,'getProductData'])->name('product-data');
Route::get('/purchase-data',[LabourController::class,'getPurchaseData'])->name('purchase-data');
Route::post('/store-labour',[LabourController::class,'storeLabourBill'])->name('store-labour');

//leave-status
Route::post('/holiday-status-update',[HolidayController::class,'statusUpdate'])->name('statusUpdate');
Route::post('/applyLeave-status-update',[ApplyLeaveController::class,'statusUpdate'])->name('ApplyLeaveStatusUpdate');
//payroll
Route::get('/get-emp-info',[PayrollGenerateController::class,'GetEmployee'])->name('GetEmployee');
Route::get('/all-payroll-types',[PayrollGenerateController::class,'payrollType'])->name('payrollType');
Route::get('/payroll-generator',[GeneratePayslipController::class,'slipSearch'])->name('slipSearch');
//project
//Route::post('/project-status-update',[ProjectDealController::class,'statusUpdate'])->name('statusUpdate');







