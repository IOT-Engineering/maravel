<?php

namespace App\Http\Controllers;

use App\Config;
use App\Dashboard;
use App\Events\BlockCreated;
use App\Maravel\Blocks\Block;
use App\Maravel\BlockItem;
use App\Maravel\Blocks\BlockComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Module;
use Modules\Accounting\Http\Controllers\CategoriesController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $config     = Config::getKeyArrayForModule('maravel','maravel', Auth::user()->id);
        
        $block = new Block();
        $block->make('maravel-dashboard');
        $blockDashboard = $block->get('maravel-dashboard');
        $blockDashboard->add(HomeController::class, 'testHTMLInjection', 'Usuarios', 'Cuento los Usuarios del sistema');

        event(new BlockCreated($block));

        $avaibleDashboardComponents = $blockDashboard;
        
        $selectedComponents = Dashboard::where('user_id', Auth::user()->id)->orderBy('row','ASC')->get();
        return view('dashboard.home.welcome', compact('config', 'modules', 'avaibleDashboardComponents', 'selectedComponents'));
    }
    
    static public function  testHTMLInjection()
    {
        return '<div class="small-box bg-aqua no-margin">
                    <div class="inner">
                        <h3>Maravel</h3>
                        <p>testHTMLInjection</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>';
    }
    /**
     * Config the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function config(Request $request)
    {
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required'
        ]);

        $requestData = $request->all();

        $search = ['vendor' => 'maravel',
            'module' => 'maravel',
            'key' => $requestData['key'],
            'user_id' => Auth::user()->id];

        $config = ['vendor' => 'maravel',
            'module' => 'maravel',
            'key' => $requestData['key'],
            'value' => $requestData['value'],
            'user_id' => Auth::user()->id];

        try
        {
            Config::updateOrCreate($search, $config);
        }
        catch (\Exception $e)
        {
            Log::debug(__CLASS__.':'.__FUNCTION__);
            Log::debug($e);
        }

        return back();
    }
    
    public function addBlock(Request $request)
    {
        Log::info(__CLASS__.__FUNCTION__);

        $this->validate($request, [
            'controller' => 'required',
            'function' => 'required',
            'vendor' => 'required',
            'module' => 'required'
        ]);
        
        $requestData = $request->all();

        Log::info($requestData);
        
        Dashboard::create(['user_id' => Auth::user()->id, 
            'vendor'=> $requestData['vendor'],
            'module'=> $requestData['module'],
            'controller'=> $requestData['controller'],
            'function'=> $requestData['function'],
            'row' => 1,
            'col' => 1]);

        return back();
    }

    public function deleteBlock($id)
    {
        Log::info(__CLASS__.'/'.__FUNCTION__);
        Dashboard::destroy($id);

        return json_encode(['okay' => 1]);
    }

    public function updateBlock(Request $request, $id)
    {
        Log::info(__CLASS__.'/'.__FUNCTION__);
    
        $this->validate($request, [
            'col' => 'required',
            'row' => 'required',
        ]);
        
        $requestData = $request->all();
        
        Log::info($requestData);
        Dashboard::where('id',$id)->update($requestData);
    
        return json_encode(['okay' => 1]);
    }
    
}
