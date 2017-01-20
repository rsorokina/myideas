<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\Food;
use App\Models\Course;

class Telegram
{
	public $token;
	
	const BASE_API_URL = 'https://api.telegram.org/bot' ;

	/**
	 * @param String $hookUrl - адрес на нашем сервере, куда будут приходить обновления
	 * @return mixed|null
	 */
	public function setWebHook($hookUrl)
	{
		return $this->sendPost('setWebHook', ['url' => $hookUrl]) ;
	}

	/**
	 * @return mixed
	 */
	public function getUpdates()
	{
		$data = file_get_contents($this->buildUrl('getUpdates')) ;
		return json_decode($data, true) ;
	}

	/**
	 * @param int $chatId - ID чата, в который отправляем сообщение
	 * @param String $message - текст сообщения
	 * @param array $params - дом.параметры (опционально)
	 * @return mixed
	 */
	public function sendMessage($chatId, $message, $params = [])
	{
        if(!is_array($params)) {
            $params = array() ;
        }

        $params['chat_id'] = $chatId ;
        $params['text'] = strip_tags($message) ; // Telegram не понимает html-тегов

		$url = $this->buildUrl('sendMessage').'?'.http_build_query($params) ;
//echo $url; exit();
        $data = file_get_contents($url) ;
        return json_decode($data, true) ;
	}

	/**
	 * @param String $methodName - имя метода в API, который вызываем
	 * @param array $data - параметры, которые передаем, необязательное поле
	 * @return mixed|null
	 */
	private function sendPost($methodName, $data = [])
	{
		$result = null;
		
		if(is_array($data))
		{
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $this->buildUrl($methodName));
			curl_setopt($ch,CURLOPT_POST, count($data));
			curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
			$result = curl_exec($ch);
			curl_close($ch);
		}
		
		return $result;
		
	}

	/**
	 * @param String $methodName - имя метода в API, который вызываем
	 * @return string - Софрмированный URL для отправки запроса
	 */
	private function buildUrl($methodName)
	{
		return self::BASE_API_URL.$this->token.'/'.$methodName ;
	}
	
	
} // end class

class AdminController extends Controller
{
    private function getCurrentCourseId() {
        if (Session::has('menu')) {
            $menu = Session::get('menu');
            $cid = array_keys($menu)[0];
            unset($menu[$cid]);
            if (count($menu)>0)
                Session::put('menu', $menu);
            else
                Session::flush();
            return $cid;
        }
    }
    
    private function randomMenu() {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Main page
        $foods = Food::orderBy('name', 'asc')->get();
        $courses = Course::getAllCourse(); 
        $menu = array();
        $composition = array();
        
        if (Session::has('menu')) {
            $menu = Session::get('menu');
            $composition = Session::get('composition');
        } else {
            
            //Menu
            $id = collect($courses->lists('id'));
            if (count($id) > 0) {
                while (count($menu) < 3) {
                    $cid = rand($id ->min(), $id ->max());
                    $menu[$cid] = Course::getCourse($cid);
                    $composition[$cid] = $menu[$cid]->getCompositionInfo();
                    
                }
            }
            
            Session::put('menu', $menu);
            Session::put('composition', $composition);
        }
             
        //print_r($composition);
        
        return view('main', [
            'foods' => $foods,
            'courses' => $courses,
            'menu' => $menu,
            'composition' =>$composition
        ]);
    }
    
    
    public function course()
    {
      //  $course = Course::getCourse($this->getCurrentCourseId());
       // $composition = $course->getCompositionInfo();
       // $api = new Telegram() ;
     //   $api->token = '240418987:AAEfUHQzDng5brKdyoaDISSe1vU9HK2FYKM';
    //   $api->sendMessage(290257681, $menu->name);
        
        
       // return Response()->json([
      //      'courseName' => $course->name,
          ///  'composition' => $composition
       // ]);
        return 'courselist';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFood(Request $request)
    {
        //Create food
        //Food::truncate();
        //Course::truncate();
        $food = new Food;
        $food->name = $request->name;
        $food->kcal = $request->kcal;
        $food->weight = $request->weight;
        $food->save();
        
        $course = new Course;
        $course->name = $request->name;
        $course->composition = json_encode([$food->id => round(10000/$request->kcal)]);
        $course->save();
        return redirect('/');
    }
    
    public function createCourse(Request $request) {
        $course = new Course;
        $course->name = $request->name;
        foreach ($request->fid as $key => $fid) {
            $recipe[$fid] = [
                'u'=> $request->unit[$key],
                'w' => $request->weight[$key] 
            ];
                        
            
            $composition[$fid] = round(10000/Food::find($fid)->kcal);
        }
        
        $course->recipe = json_encode($recipe);
        $course->composition = json_encode($composition);
        $course->save();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
