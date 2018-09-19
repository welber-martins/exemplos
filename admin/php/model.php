<?php
class model
{
	protected $_host = "172.21.0.4"; 
	protected $_user = "GETECWEB";
	protected $_pass = "!GW10@#%L1D2V3&*";
	protected $_base = "dbleonardo";	
	
	public function __construct()
	{
		session_start();
	}
	
	private function conecta()
	{
		$conexao = mssql_connect($this->_host,$this->_user,$this->_pass) or die ("Nao foi possível conectar ao Banco de dados."); 	
		mssql_select_db($this->_base)  or die ("Nao foi possível conectar ao Banco.");
	}
	
	private function exeQuery($srtQuery)
	{
		$this->conecta();
		mssql_query("SET CONCAT_NULL_YIELDS_NULL  ON");
		mssql_query("SET ANSI_PADDING  ON");
		mssql_query("SET ANSI_WARNINGS  ON");
		$dbResult = mssql_query($srtQuery) or  die ("Error ao executar query");		
		return $dbResult;
		mssql_close();
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
		$usuario = 'site@leonardoonline.com.br';
		$senha = 'Leo@2013';
		$Host = 'smtp.'.substr(strstr($usuario, '@'), 1);
		$Username = $usuario;
		$Password = $senha;
		$Port = "587";
		
		$mail = new PHPMailer();
		$body = $Message;
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host = $Host; // SMTP server
		$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
		// 1 = errors and messages
		// 2 = messages only
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->Port = $Port; // set the SMTP port for the service server
		$mail->Username = $Username; // account username
		$mail->Password = $Password; // account password
		
		$mail->SetFrom($usuario, $nomeDestinatario);
		$mail->Subject = $assunto;;
		$mail->MsgHTML($mensagem);
		$mail->AddAddress($emaild, $nomed);
		$mail->AddReplyTo($emailr,$nomer);
		
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
		if(strlen($arDados['faleNome']) < 3 || strlen($arDados['faleEmail']) < 3  || strlen($arDados['faleMensagem']) < 3 )
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Dados Ausentes';
		}
		else if(strtolower($arDados['code']) != strtolower($_SESSION['random_number']))
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Código de Segurança Inválido';		
		}
		else
		{
			$nome = $this->tradaDados(strtoupper($arDados['faleNome']),100);
			$email = $this->tradaDados($arDados['faleEmail'],50);
			$telefone = $this->tradaDados($arDados['faleTelefone'],20);
			$local = $this->tradaDados($arDados['faleLocal'],1);
			$assunto = $this->tradaDados($arDados['faleAssunto'],50);
			$mensagem = $this->tradaDados($arDados['faleMensagem'],100000);
			
			if($local == 'T')
				$local2 = 'Unidade Taguatinga';
			if($local == 'N')
				$local2 = 'Unidade Norte';
			if($local2 == 'S')
				$local2 = 'Unidade Sul';
			 
			
			$html  =  "<b>Contato - pelo site</b><br>".chr(13).chr(10);
			$html .= "<b>Com os seguintes dados:</b><br>".chr(13).chr(10).chr(10);
			$html .= "<b>Assunto:</b> ".$local2." - ".$assunto."<br>".chr(13).chr(10);
			$html .= "<b>Nome:</b> ".$nome."<br>".chr(13).chr(10);
			$html .= "<b>E-mail:</b> ".$email."<br>".chr(13).chr(10);
			$html .= "<b>Telefone:</b> ".$telefone."<br>".chr(13).chr(10);
			$html .= "<b>Mensagem:</b> ".$mensagem."<br>".chr(13).chr(10);
			
			
			if($arDados['faleAssunto'] == 'Dúvida Sobre o Site')
			{
				$this->enviaMail('getec@leonardoonline.com.br','Leonardo da Vinci',$nome,$email,$local2." - ".utf8_decode($arDados['faleAssunto']),$html);
				$this->enviaMail('tiago.batista@leonardoonline.com.br','Tiago Batista',$nome,$email,$local2." - ".$assunto,$html);
			}
			else if($arDados['faleAssunto'] == 'Financeiro')
			{
				$this->enviaMail('jair.rosso@leonardoonline.com.br','Leonardo da Vinci',$nome,$email,$local2." - ".utf8_decode($arDados['faleAssunto']),$html);
				$this->enviaMail('tiago.batista@leonardoonline.com.br','Tiago Batista',$nome,$email,$local2." - ".$assunto,$html);
			}
			else if($arDados['faleAssunto'] == 'Recursos Humanos')
			{
				$this->enviaMail('edna.botelho@leonardoonline.com.br','Leonardo da Vinci',$nome,$email,$local2." - ".utf8_decode($arDados['faleAssunto']),$html);
				$this->enviaMail('tiago.batista@leonardoonline.com.br','Tiago Batista',$nome,$email,$local2." - ".$assunto,$html);
			}
			else
			{
				$this->enviaMail('comunicacao@leonardoonline.com.br','Leonardo da Vinci',$nome,$email,$local2." - ".utf8_decode($arDados['faleAssunto']),$html);
				$this->enviaMail('michelle.manzur@leonardoonline.com.br','MICHELLE  MANZUR ',$nome,$email,$local2." - ".utf8_decode($arDados['faleAssunto']),$html);
				$this->enviaMail('tiago.batista@leonardoonline.com.br','Tiago Batista',$nome,$email,$local2." - ".$assunto,$html);
			}
			$dbQuery = 'SP_WEB_ContatosSite "","'.$nome.'","'.$email.'","'.$telefone.'","'.$local.'","'.$assunto.'","'.$mensagem.'","","C"';
			$this->exeQuery($dbQuery);				
		}
		return $arRetorno;
	}
	
	public function verificaTipo($arquivo)
	{
		$finfo = finfo_open(FILEINFO_MIME,'C:\wamp\bin\php\php5.2.5\extras\magic'); 
		$tipo = finfo_file($finfo, $arquivo); 
		finfo_close($finfo); 
		if($tipo == 'application/pdf')
			return 'pdf';			
	}
	
	public function enviaArquivo($local_temp,$local_salva)
	{
		$arRetorno = array();
		$arRetorno[0] = true;
		$arRetorno[1] = '';
		
		$tipoArquivo = $this->verificaTipo($local_temp);
		
		if (empty($tipoArquivo))
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Nenhum arquivo selecionado';
		}
		else if($tipoArquivo != 'pdf')	
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Tipo de Arquivo não permitido '.$tipoArquivo;	
		}
		else if	(!move_uploaded_file($local_temp,$local_salva))
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Não foi possivel enviar o arquivo ';		
		}
		return $arRetorno;
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
	
	public function cadastraCurriculo($arDados,$arFile)
	{
		$arRetorno = array();
		$arRetorno[0] = true;
		$arRetorno[1] = '';
		if(strlen($arDados['trabalheNome']) < 3 || strlen($arDados['trabalheEmail']) < 3  || strlen($arDados['trabalheNascimento']) < 3 || strlen($arDados['trabalheSexo']) < 1 || strlen($arDados['trabalheDeficiente']) < 1  || strlen($arDados['trabalheEndereco']) < 3 || strlen($arDados['trabalheEscolariedade']) < 3 )
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Dados Ausentes';
		}
		else if(strtolower($arDados['code']) != strtolower($_SESSION['random_number']))
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Código de Segurança Inválido';		
		}		
		else
		{
			$arTemp = $arFile['trabalheCurriculo']['tmp_name'];
			$arLocal = "../uploads/".$arDados['trabalheEmail'].'.pdf';
			$arEnvio = $this->enviaArquivo($arTemp,$arLocal);
			if(!$arEnvio[0])
			{
				$arRetorno[0] = false;
				$arRetorno[1] = $arEnvio[1];		
			}
			else
			{
				$nome = $this->tradaDados($arDados['trabalheNome'],150);
				$telefone = $this->tradaDados($arDados['trabalheTelefone'],150);
				$email = $this->tradaDados($arDados['trabalheEmail'],150);
				$sexo = $this->tradaDados($arDados['trabalheSexo'],1);
				$nascimento = $this->formataData($arDados['trabalheNascimento'],'banco');
				$escolaridade = $this->tradaDados($arDados['trabalheEscolariedade'],100);
				$endereco = $this->tradaDados($arDados['trabalheEndereco'],150);
				$deficiente = $this->tradaDados($arDados['trabalheDeficiente'],1);
				$cargo = intval($arDados['trabalheCargo']);
				
				$dbQuery = 'SP_WEB_Curriculos "","'.$nome.'","'.$sexo.'","'.$nascimento.'","'.$escolaridade.'","'.$endereco.'","'.$telefone.'","'.$email.'","'.$email.'.pdf'.'","'.$deficiente.'","","","'.$cargo.'","C"';
				//echo str_replace('"',"'",$dbQuery);
				$this->exeQuery($dbQuery);	
			}						
		}
		return $arRetorno;
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
	public function cadComentario($arDados)
	{
		$arRetorno = array();
		$arRetorno[0] = true;
		$arRetorno[1] = '';
		
		if(strlen($arDados['COM_Nome']) < 3 || strlen($arDados['COM_Email']) < 3  || strlen($arDados['COM_Texto']) < 6 )
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Dados Ausentes';
		}
		else if(strtolower($arDados['code']) != strtolower($_SESSION['random_number']))
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Código de Segurança Inválido';		
		}
		else
		{
			$PST_Id = intval($arDados['PST_Id']);
			$nome = $this->tradaDados(strtoupper($arDados['COM_Nome']),100);
			$email = $this->tradaDados($arDados['COM_Email'],50);			
			$texto = $this->tradaDados($arDados['COM_Texto'],1000);
			
			$dbQuery = 'SP_WEB_Comentarios "","'.$PST_Id.'","'.$nome.'","'.$email.'","'.$texto.'","","C"';
			//echo str_replace('"',"'",$dbQuery);
			$dbRow = mssql_fetch_array($this->exeQuery($dbQuery));
			if($dbRow['Res'] == 'OK')
			{
				$arRetorno[0] = true;
				$arRetorno[1] = '';		
			}
			else
			{
				$arRetorno[0] = false;
				$arRetorno[1] = 'Dados Ausentes';			
			}
		}
		return $arRetorno;
	}
	
	public function enviaAgenda($arDados)
	{	
		$arRetorno = array();
		$arRetorno[0] = true;
		$arRetorno[1] = '';
		if(strlen($arDados['AGV_Nome']) < 3 || strlen($arDados['AGV_Telefone']) < 3  || strlen($arDados['AGV_Email']) < 3 || strlen($arDados['AGV_Unidade']) != 1 || strlen($arDados['AGV_DataHora']) < 3 )
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Dados Ausentes';
		}
		else if(strtolower($arDados['code']) != strtolower($_SESSION['random_number']))
		{
			$arRetorno[0] = false;
			$arRetorno[1] = 'Código de Segurança Inválido '.$_SESSION['random_number'].' - '.$arDados['code'];		
		}
		else
		{
			
			$AGV_Nome = $this->tradaDados($arDados['AGV_Nome'],150);
			$AGV_Telefone = $this->tradaDados($arDados['AGV_Telefone'],20);
			$AGV_Email = $this->tradaDados($arDados['AGV_Email'],150);
			$AGV_Unidade = $this->tradaDados($arDados['AGV_Unidade'],1);
			$AGV_DataHora = $this->formataData($arDados['AGV_DataHora'],'banco');
			$AGV_Mensagem = $this->tradaDados($arDados['AGV_Mensagem'],1000);
			
			
			if($AGV_Unidade == 'T')
				$local2 = 'Unidade Taguatinga';
			if($AGV_Unidade == 'N')
				$local2 = 'Unidade Norte';
			if($AGV_Unidade == 'S')
				$local2 = 'Unidade Sul';
			 
			
			$html  =  "<b>Agendamento de vista pelo site</b><br>".chr(13).chr(10);
			$html .= "<b>Com os seguintes dados:</b><br>".chr(13).chr(10).chr(10);
			$html .= "<b>Nome:</b> ".$AGV_Nome."<br>".chr(13).chr(10);
			$html .= "<b>E-mail:</b> ".$AGV_Email."<br>".chr(13).chr(10);
			$html .= "<b>Telefone:</b> ".$AGV_Telefone."<br>".chr(13).chr(10);
			$html .= "<b>Unidade:</b> ".$local2."<br>".chr(13).chr(10);
			$html .= "<b>Data da visita:</b> ".$arDados['AGV_DataHora']."<br>".chr(13).chr(10);
			$html .= "<b>Mensagem:</b> ".$AGV_Mensagem."<br>".chr(13).chr(10);
			
			$this->enviaMail('michelle.manzur@leonardoonline.com.br','MICHELLE  MANZUR ',$nome,$email,$local2." - Agendamento de visita pelo site ",$html);
			$this->enviaMail('tiago.batista@leonardoonline.com.br','Tiago Batista',$nome,$email,$local2." - Agendamento de visita pelo site ",$html);
			$dbQuery = 'SP_WEB_AgendaVista "","'.$AGV_Nome.'","'.$AGV_Email.'","'.$AGV_Telefone.'","'.$AGV_Unidade.'","'.$AGV_DataHora.'","'.$AGV_Mensagem.'","C"';
			$this->exeQuery($dbQuery);				
		}
		return $arRetorno;
	}
	public function verificaMobile()
	{
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		{
			return 'ok';	
		}
		else
		{
			return 'false';	
		}
			
	}
	public function exeProcedureCB()
	{
		$dbQuery = 'dbleonardo..SP_ACD_CBResultadoFinal ';
		for($i=0;$i<func_num_args();$i++)
		{
			$dbQuery .= '"'.$this->tradaDados(func_get_arg($i),200).'",';
		}
		$dbQuery = substr($dbQuery,0,-1);
		//echo str_replace('"',"'",$dbQuery)."<br/><br/>";
		$dbResult = $this->exeQuery($dbQuery);
		return $dbResult;
	}
	
	
}
?>