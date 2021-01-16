<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\videos;
use App\videosmodelos;
use App\acompanhantes;
use App\termosdebusca;
use App\fotosmodelos;
use App\videoscomprados;
use \Torann\GeoIP\Facades\GeoIP;
Use \Illuminate\Support\Str;

class apiController extends Controller
{
  /*  public function getCsv(videos $vids)
    {
        ini_set('max_execution_time', 0); 
        $file = public_path('xhamster-29.csv');
        
        $customerArr = $this->csvToArray($file);
        $dis = [];
        
        foreach ($customerArr as $key=>$cos) {
          
          
                $vid = new videos();
                $vid->link = $cos[1];
                $vid->titulo = $cos[2];
                $vid->tempo = $cos[3];
                $vid->thumbnail = $cos[5];
                $vid->iframe = 'uselink';
                $vid->tags = $cos[6];
                $vid->tags2 = $cos[6];
                $vid->id_site = $cos[0];
                $vid->categoria = substr($cos[6], 0, strpos($cos[6], ';'));
                $vid->save(); 
               
        }
    }
    */
    
    public function __construct(videos $vids) {
        
        
        $cats = $vids->getCategories();
        session()->put('categories',$cats);
         
    }
    
    public function getHome(videos $vids, acompanhantes $acompanhantes) {
       
        $modelos = $acompanhantes->getByCity((geoip()->getLocation('201.43.152.34')->city));
        ini_set('max_execution_time', 0); 
        $cats = $vids->getCategories();
        $videos = $vids->getAll();
        
       
       
        return view('home')->with('videos',$videos)->with('models',$modelos)->with('cidade',geoip()->getLocation('201.43.152.34')->city);

    }
    
    
    
 
    
    public function sitemap(videos $vids) {
        // create new sitemap object
        ini_set('max_execution_time', 0); 
        ini_set('memory_limit', '100000M');
	$sitemap = App::make('sitemap');

	// get all products from db (or wherever you store them)
	$videos = $vids->orderBy('created_at', 'desc')->get();

	// counters
	$counter = 0;
	$sitemapCounter = 0;

	// add every product to multiple sitemaps with one sitemap index
	foreach ($videos as $vid) {
		if ($counter == 50000) {
			// generate new sitemap file
			$sitemap->store('xml', 'sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			$counter = 0;
			// count generated sitemap
			$sitemapCounter++;
		}
                $path = 'https://closesex.com.br/detalhes/'. Str::slug($vid['titulo']) .'/'. $vid['id'];
		// add product to items array
		$sitemap->add($path, $vid['updated_at'], 1, 'daily');
		// count number of elements
		$counter++;
	}

	// you need to check for unused items
	if (!empty($sitemap->model->getItems())) {
		// generate sitemap with last items
		$sitemap->store('xml', 'sitemap-' . $sitemapCounter);
		// add sitemap to sitemaps array
		$sitemap->addSitemap(secure_url('sitemap-' . $sitemapCounter . '.xml'));
		// reset items array
		$sitemap->model->resetItems();
	}

	// generate new sitemapindex that will contain all generated sitemaps above
	$sitemap->store('sitemapindex', 'sitemap');
    }
    /* public function getUselink(videos $vids) {
        ini_set('max_execution_time', 0); 
        ini_set('memory_limit', '5000M');
        $uselink = $vids->where('iframe','uselink')->get();
       
        foreach($uselink as $use) {
            
            $testevide = $vids->findOrfail($use->id);
            $testevide->categoria = substr($use->tags, 0, strpos($use->tags, ';'));
            $testevide->update();
        }
        
        
    }
    */


    public function getDetalhes(videos $vid, Request $request) {
        $det = $vid->getDetalhe($request->id);
        return view('detalhes')->with('detalhes',$det);
    }
    public function getDetalhesmodelo(acompanhantes $acompanhantes, Request $request,fotosmodelos $fotosmodelos, videosmodelos $videosmodelos, videoscomprados $videoscomprados) {
        if (session()->get('usuario') != null) {
            $iduser = session()->get('usuario')->id_usuario;
            $idmodelo = $request->id_modelo;
            $videosusuario = $videoscomprados->getByUser($iduser, $idmodelo);
            $vidcollect = collect($videosmodelos->getVideos($request->id_modelo));
                
                foreach($vidcollect as $v) {
                    foreach ($videosusuario as $vuser) {
                        if ($v->id_videomodelo == $vuser->id_videomodelo) {
                            $v->creditos = $v->creditos - $vuser->creditos;
                        }
                    }
                }
                $videos = $vidcollect;
                
           
        }
        else {
            $videos = $videosmodelos->getVideos($request->id_modelo);
        }
        $fotos = $fotosmodelos->getFotos($request->id_modelo);
        
        $det = $acompanhantes->getDetalhe($request->id_modelo);
        return view('detalhesmodelo')->with('detalhes',$det)->with('fotos',$fotos)->with('videos',$videos);
    }
    public function getPorcategoria(videos $vids, Request $request) {
        
        $vid = $vids->getporcategoria($request->nomecategoria);
        return view('categoria')->with('video',$vid);
    }

    public function getBusca(videos $vids, Request $request, termosdebusca $termos) {
        
        
        $vid = $vids->getBusca($request->search);
        
        $term = new termosdebusca();
        $term->termo = $request->search;
        $term->save();
        return view('categoria')->with('video',$vid);
    }


    
    function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
           array_push($data, $row);
        }
        fclose($handle);
    }

    return $data;
}
}
