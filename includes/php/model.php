<?php
class model
{
	

	/*protected $_host = "179.188.16.17"; 
	protected $_user = "bgnewsite";
	protected $_pass = "php@2016";
	protected $_base = "bgnewsite";*/
	
	protected $_host = "localhost"; 
	protected $_user = "root";
	protected $_pass = "";
	protected $_base = "bgnewsite";

	
	
	public function __construct()
	{
		session_start();
	}
	
	private function conecta()
	{
	
		$myconn = @mysqli_connect($this->_host,$this->_user,$this->_pass) or die (mysqli_error($myconn));
		$seldb = @mysqli_select_db($this->_base,$myconn) or die (mysqli_error($myconn));
		mysqli_query("SET NAMES 'utf8'");
		mysqli_query('SET character_set_connection=utf8');
		mysqli_query('SET character_set_client=utf8');
		mysqli_query('SET character_set_results=utf8');
	}
	
	private function exeQuery($srtQuery)
	{
		$this->conecta();
		//echo $srtQuery;
		$dbResult = mysqli_query($srtQuery) or  die ("Error ao executar query");		
		return $dbResult;
		mssqli_close();
	}	
	public function tradaDados($var,$tamanho)
	{
		return htmlentities(utf8_decode(substr(strip_tags(trim($var)),0,$tamanho))); 	
	}
	
	public function enviaMail($emaild,$nomed,$nomer,$emailr,$assunto,$mensagem)
	{
		$emaild =  $emaild;
		$nomed = $nomed;
		$nomer = $nomer;
		$emailr = $emailr;
		$assunto = $assunto;
		$mensagem = $mensagem; 
		
		include_once("class.phpmailer.php");
		$usuario = 'fale.conosco@escolamontessori.com.br';
		$senha = 'Mudar@1234';
		$Host = 'smtp.gmail.com';
		$Username = $usuario;
		$Password = $senha;
		$Port = "587";
		
		$mail = new PHPMailer();
		//$body = $Message;
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host = $Host; // SMTP server
		$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)

		// 1 = errors and messages
		// 2 = messages only
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->Port = $Port; // set the SMTP port for the service server
		$mail->SMTPSecure = 'tls';
		$mail->Username = $Username; // account username
		$mail->Password = $Password; // account password
		
		$mail->SetFrom($usuario, 'CONTATO FALE CONOSCO SITE');
		$mail->Subject = $assunto;;
		$mail->MsgHTML($mensagem);
		$mail->AddReplyTo($emailr,$nomer);
		$mail->AddAddress($emaild, $nomed);
		
		
		if(!$mail->Send()) {
			die('Erro ao enviar e-mail: '. print($mail->ErrorInfo));
		} else {
		$mensagemRetorno = 'OK';
		}
		return $mensagemRetorno;	
	}
	
	
	
	
	
	
	
	public function enviaContato($arDados)
	{	
		$arRetorno = array();
		$arRetorno[0] = true;
		$arRetorno[1] = '';
		
	
		$nome = $this->tradaDados(strtoupper($arDados['faleNome']),100);
		$email = $this->tradaDados($arDados['faleEmail'],50);
		$telefone = $this->tradaDados($arDados['faleTelefone'],20);		
		$assunto = $this->tradaDados($arDados['faleAssunto'],100);		
		$mensagem = $this->tradaDados($arDados['faleMensagem'],10000);
		$com = $this->tradaDados($arDados['faleLocal'],2);
		
		
		 
		
		$html  =  "<b>Contato - pelo site</b><br>".chr(13).chr(10);
		$html .= "<b>Com os seguintes dados:</b><br>".chr(13).chr(10).chr(10);
		$html .= "<b>Assunto:</b> ".$assunto."<br>".chr(13).chr(10);
		$html .= "<b>Nome:</b> ".$nome."<br>".chr(13).chr(10);
		$html .= "<b>E-mail:</b> ".$email."<br>".chr(13).chr(10);
		$html .= "<b>Telefone:</b> ".$telefone."<br>".chr(13).chr(10);
		$html .= "<b>Mensagem:</b> ".$mensagem."<br>".chr(13).chr(10);
		
		
		$dbQuery = "insert into contatos values('','$nome','$email','$telefone','$assunto','$mensagem','$com')";
		$this->exeQuery($dbQuery);
		
		$dbRowEmails = mysqli_fetch_array($this->selectFalarCom($com));
		$arEmails = explode(';', $dbRowEmails['emails']);
		foreach($arEmails as $emailB){
			$this->enviaMail($emailB,'ESCOLA MARIA MONTESSORI',$nome,$email,'CONTATO PELO SITE - '.utf8_decode($arDados['faleAssunto']),$html);	
		}

		return 'ok';
	}
	
	
	public function enviaArquivo($local_temp,$local_salva)
	{
		$arRetorno = array();
		$arRetorno[0] = true;
		$arRetorno[1] = '';
		
		$finfo = new finfo(FILEINFO_MIME_TYPE);
        $tipoArquivo =  $finfo->file($local_temp);
		
		if (empty($tipoArquivo))
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Nenhum arquivo selecionado';
		}
		else if($tipoArquivo != 'application/pdf')	
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Tipo de Arquivo não permitido '.$tipoArquivo.' SOMENTE PDF';	
		}
		else if	(!move_uploaded_file($local_temp,$local_salva))
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Não foi possivel enviar o arquivo ';		
		}
		return $arRetorno;
	}

	public function cadastraCurriculo($arDados,$arFile)
	{
		$retorno = 'OK';
		
		if(strlen($arDados['nome']) < 3 || strlen($arDados['email']) < 3)
		{
			$retorno =  'Dados Ausentes';
		}
		else
		{
			$arTemp = $arFile['curriculo']['tmp_name'];
			$nameFile = md5($arDados['email'].time()).'.pdf';
			$arLocal = "../uploads/".$nameFile;
			$arEnvio = $this->enviaArquivo($arTemp,$arLocal);
		
			if(!$arEnvio[0])
			{
				$retorno = $arEnvio[1];		
			}
			else
			{
				$nome = $this->tradaDados($arDados['nome'],150);
				$telefone = $this->tradaDados($arDados['telefone'],150);
				$email = $this->tradaDados($arDados['email'],150);
				$sexo = $this->tradaDados($arDados['sexo'],1);
				$nascimento = $this->formataData($arDados['dataNasc'],'banco');
				$escolaridade = $this->tradaDados($arDados['grau'],100);
				$endereco = $this->tradaDados($arDados['endereco'],150);
				$mensagem = $this->tradaDados($arDados['mensagem'],1000);
				$cargo = intval($arDados['cargo']);

				$dbRowCargo = mysqli_fetch_array($this->exeQuery("SELECT * FROM cargo where cargo_id = '$cargo'"));
				
				$html  =  "<b>Currículo - pelo site</b><br>".chr(13).chr(10);
				$html .= "<b>Com os seguintes dados:</b><br>".chr(13).chr(10).chr(10);			
				$html .= "<b>Nome:</b> ".$nome."<br>".chr(13).chr(10);
				$html .= "<b>E-mail:</b> ".$email."<br>".chr(13).chr(10);
				$html .= "<b>Sexo:</b> ".$sexo."<br>".chr(13).chr(10);
				$html .= "<b>Data de Nascimento:</b> ".$arDados['dataNasc']."<br>".chr(13).chr(10);
				$html .= "<b>Cargo Pretendido:</b> ".$dbRowCargo['nome']."<br>".chr(13).chr(10);
				$html .= "<b>Telefone:</b> ".$telefone."<br>".chr(13).chr(10);
				$html .= "<b>Endereco:</b> ".$endereco."<br>".chr(13).chr(10);
				$html .= "<b>Mensagem:</b> ".$mensagem."<br>".chr(13).chr(10);
				$html .= "<b>Currículo:</b> <a href='http://www.escolamontessori.com.br/uploads/".$nameFile."'>Clique aqui para visualizar o currículo</a><br>".chr(13).chr(10);

				$this->enviaMail('trabalheconosco@escolamontessori.com.br','ESCOLA MARIA MONTESSORI',$nome,$email,utf8_decode('NOVO CURRÍCULO PELO SITE'),$html);	

				
				$dbQuery = '
				 insert into curriculo
				 values( "","'.$nome.'","'.$email.'","'.$telefone.'","'.$sexo.'","'.$nascimento.'","'.$escolaridade.'","'.$endereco.'","'.$cargo.'","'.$nameFile.'","'.$mensagem.'","1" )';
				$this->exeQuery($dbQuery);	
			}						
		}
		return $retorno;
	}

	
	public function formataData($data,$tipo)
	{
		$dataf = "";
		if ($tipo == "banco")
		{
			if ($data[2] == "/")
			{
				$dia = substr($data,0,2);
				$mes = substr($data,3,2);
				$ano = substr($data,6,4);
				$dataf = $ano."-".$mes."-".$dia;
			}
			else
				$dataf = $data;			
		}
		if ($tipo == "exibir")
		{
			if ($data[4] == "-")
			{
				$dia = substr($data,8,2);
				$mes = substr($data,5,2);
				$ano = substr($data,0,4);
				$dataf = $dia."/".$mes."/".$ano;
			}
			else
				$dataf = $data;			
		}
		return $dataf;	
	}
	
	
	
	public function formataLink($link,$separador)
	{
		$link = str_replace(" ",$separador, $link);
  		return preg_replace('/[^A-Za-z0-9\-]/', '', $link);
	}
	public function formataAcento( $texto ) 
	{ 
	  $array1 = array(   "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç" 
						 , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" ); 
	  $array2 = array(   "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c" 
						 , "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" ); 
	  return  str_replace( $array1, $array2, $texto); 
	}
	public function selectTextos($id)
	{
		$dbQuery = 'select * from pags where pags_id = '.intval($id);
		$dbResult = $this->exeQuery($dbQuery);
		if(mysqli_num_rows($dbResult) != 0)
		{
			$dbRow = mysqli_fetch_array($dbResult);
			return $dbRow;
		}
				
	}


	public function selectColaboradores($id)
	{
		$dbQuery = 'select * from colaborador where status = 1 ';
			if($id == 1)
		 	 	$dbQuery .= ' and ensino_infantil = 1';
		 	if($id == 2)
		 	 	$dbQuery .= ' and ensino_fundamental = 1';
		
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;

				
	}


	public function selectProjetos($id)
	{
		$dbQuery = 'select * from projetos where status = 1';
			if($id == 1)
		 	 	$dbQuery .= ' and ensino_infantil = 1';
		 	if($id == 2)
		 	 	$dbQuery .= ' and ensino_fundamental = 1';
		
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}


	public function selectNoticias($busca = null,$idD = null,$idF = null,$limit = null)
	{
		$dbQuery = 'select * from noticias where status = 1';
	    	if(!empty($idD)) 
	    		$dbQuery .= ' and noticias_id = "'.$idD.'"';
	    	if(!empty($idF)) 
	    		$dbQuery .= ' and noticias_id <> "'.$idF.'"';
			if(!empty($busca)) 
		 	 	$dbQuery .= ' and titulo like "%'.$busca.'%" and texto like "%'.$busca.'%" ';
		 	 
		 	 $dbQuery .= ' order by ordem';

		 	 if(!empty($limit)) 
		 	 	$dbQuery .= ' limit 0,'.$limit;
		 	

		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}
	


	public function selectTV($busca = null,$idD = null,$idF = null,$limit = null)
	{
		$dbQuery = 'select * from tv where status = 1';
	    	if(!empty($idD)) 
	    		$dbQuery .= ' and tv_id = "'.$idD.'"';
	    	if(!empty($idF)) 
	    		$dbQuery .= ' and tv_id <> "'.$idF.'"';
			if(!empty($busca)) 
		 	 	$dbQuery .= ' and titulo like "%'.$busca.'%" and texto like "%'.$busca.'%" ';
		 	 
		 	  $dbQuery .= ' order by ordem';

		 	if(!empty($limit)) 
		 	 	$dbQuery .= ' limit 0,'.$limit;
		 	

		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}

	public function selectFalarCom($id = null)
	{
		$dbQuery = 'select * from assuntos where status = 1';
	    	if(!empty($id)) 
	    		$dbQuery .= ' and assuntos_id = "'.$id.'"';   
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}

	public function selectArea()
	{
		$dbQuery = 'select * from area where status = 1';
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}

	public function selectCargo($area_id)
	{
		$dbQuery = 'select * from cargo  where area_id = '.$area_id.'  and status = 1';
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}

	public function selectBanner()
	{
		$dbQuery = 'select * from banner  where status = 1 order by ordem';
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}

	public function selectDepoimentos()
	{
		$dbQuery = 'select * from depoimentos  where status = 1 order by rand() limit 0,1';
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}

	public function selectListaMaterial()
	{
		$dbQuery = 'select * from  lista_material  where status = 1 order by ordem';
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}

	public function selectMatriculas($tipo)
	{
		$dbQuery = "SELECT * FROM arquivo_matricula where tipo = '$tipo' and status = 1 order by ordem";
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}

	public function selectArquivo($id)
	{
		$dbQuery = "select * from  arquivos  where arquivos_id = '$id'";
		$dbRow = mysqli_fetch_array($this->exeQuery($dbQuery));
		return $dbRow['arquivo'];	
	}

	public function selectGaleria($idD = null,$limit = null)
	{
		$dbQuery = 'select * from galeria where status = 1';
	    	if(!empty($idD)) 
	    		$dbQuery .= ' and galeria_id = "'.$idD.'"';
		 
		 $dbQuery .= ' order by ordem';

		 	if(!empty($limit)) 
		 	 	$dbQuery .= ' limit 0,'.$limit;
		 	

		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}
	
	
	public function selectImgsGalerias($id){
		$dbQuery = "SELECT * FROM  img_galeria where galeria_id = '$id'";
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}
	
	
	
	
	
	
	
}
?>