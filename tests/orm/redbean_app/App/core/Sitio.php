<?php

require 'lib/dictionary.php';

class Sitio {
	
	public $datosSite = array();
	
	public function __construct()
    {
		$this->datosSite['datos'] = '';
		$this->datosServ('url', $_SERVER['SERVER_NAME']);
		$this->datosServ('uri', parse_url(ltrim($_SERVER['REQUEST_URI'], '/')));
		#$this->datosServ('uri', $_GET['url']);
		$this->datosSite['params'] = $this->getParamsPost();
		$this->datosSite['idioma'] = $this->setLang(parse_url($_SERVER['REQUEST_URI']));
		$this->setControlPath();
		$this->getTemplate();
		
	}
	
	private function datosServ($clave, $valor)
    {
		if (is_array($valor))
        {
			$this->datosSite[$clave] = $valor['path'];
		}
		else
        {
			$this->datosSite[$clave] = $valor;
		}
		
	}
	
	private function getParamsPost()
    {
		$params = '';
		
        if (!empty($_REQUEST))
			$params = $_POST;
		
		return $params;
	}
	
	private function setLang($uri)
    {
		if (is_array($uri))
        {
			$path = explode('/', $uri['path']);
			
            switch ($path[1])
            {
				case 'eng':
					$idioma = 'eng';
                    $this->datosSite['homePag'] = 'eng';
				break;
				default:
					$idioma = 'esp';
                    $this->datosSite['homePag'] = '';
				break;
			}
		}
		else
        {
			$idioma = 'esp';
            $this->datosSite['prefix'] = '';
		}
		
		return $idioma;
	}
	
	private function redirecciona($pagina = '')
    {
        $pag = $pagina;
        
        if (empty($pagina))
            $pag = ADMIN . $this->datosSite['homePag'];
		
        header('Location: ' . $pag);
		exit;
	}
	
	public function getTemplate()
    {
		$rutaArchivo = RES . $this->datosSite['template'];
		
		if (is_array($this->datosSite['datos']) && array_key_exists('errorPage', $this->datosSite['datos']) || (empty($this->datosSite['datos'])))
        {
			$this->redirecciona();
        }
        elseif (!empty($this->datosSite['datos']['redirecciona']))
        {
            $this->redirecciona($this->datosSite['datos']['redirecciona']);
        }
        else
        {
            if (file_exists( $rutaArchivo ))
            {
                $plantilla = file_get_contents( $rutaArchivo );
                $this->datosSite['pagina'] = $this->getDataTemplate($plantilla);
            }
			$this->printPage();
        }
		
	}
	
	private function getDataTemplate($plantilla)
    {
		if (!empty($this->datosSite['datos']))
        {
			foreach ($this->datosSite['datos'] as $clave => $valor)
            {
				$plantilla = @str_replace('{{' . $clave . '}}', $valor, $plantilla);
			}
			
			return $plantilla;
		}
		else
			return false;
		
	}
	
	public function printPage()
    {
        if (!empty($this->datosSite['pagina']))
            print $this->datosSite['pagina'];
	}
	
}
