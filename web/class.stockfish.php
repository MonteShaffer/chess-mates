<?PHP

class stockfish
	{
	private $process;
	private $pipes;
	private $offset;
	public $out;
	
	public function __construct($EXE = "C:/stockfish/stockfish.exe")
		{		
		$this->EXE		= $EXE;
		$descr = array	(
						0 => array("pipe", "r"), 	#iStream as stdin
						1 => array("pipe", "w"),	#oStream as stdout
						2 => array("pipe", "w")		#eStream as stderr
						);
		$this-> STDOUT = dirname(__FILE__). "/". "stdout.txt";
		
		$descr = array	(
						0 => array("pipe", "r"), 	#iStream as stdin
						1 => array("file", $this-> STDOUT, "w"),	#oStream as stdout
						2 => array("pipe", "w")		#eStream as stderr
						);
						
						
						
		$this->pipes 	= array();
		$this->offset 	= array(0,0,0);
		$this->out 		= array(
								"commands" 	=>	array(),
								"stream"	=>	array(),
								"payload"	=>	array()
								);
		$this->stream 	= "";
		$this->process 	= proc_open($this->EXE, $descr, $this->pipes);
		
		# https://www.php.net/manual/en/function.stream-get-contents.php
		# stream_set_blocking($this->pipes[1], 0);
		
		
		$this->timeout 	= 5; # isComplete timeout (in seconds)
		$this->start 	= microtime(true);
		$this->now		= microtime(true);
		}
	
	public function isComplete($what="bestmove",$micro=10000)
		{
		$this->now = microtime(true); 
		$this->time = $this->now - $this->start;
		if($this->time > $this->timeout) { return false; }
		# isready returns "ok" even when search is still ongoing
		while (strpos($this->stream, $what) === false) 
			{
			# set a delay before checking again
			usleep($micro);
			$this->getStream();
			}
		return true;
		}
	public function getStream()
		{
			/*
		$contents = "";
		while ( fgets($this->pipes[1]) !== false ) 
			{
			$contents .= fgets($this->pipes[1])."\n";
			}	
		print_r($contents); exit;
		*/
		/*
		$this->out["stream"][microtime(true).""] = stream_get_contents	
												(	$this->pipes[1],
													-1,
													$this->offset[1]
												);
		# update latest marker from stdout 
		$this->offset[1] = ftell(this->pipes[1]);	
		*/
		#$this->stream = stream_get_contents($this->pipes[1]);
		$this->stream = file_get_contents($this-> STDOUT);
		print_r($this);  #exit;
		
		}
		
	public function setOption($option="UCI_LimitStrength",$value="true")
		{
		$cmd = "setoption name {option} value {value}";
		$cmd = str_replace("{option}", $option, $cmd);
		$cmd = str_replace("{value}",  $value,  $cmd);
		$this->sendCommand($cmd);
		}
	public function sendCommand($cmd="uci")
		{
		$this->now = microtime(true);
		# if (is_resource($this->process)) {
		$this->out["commands"][$this->now.""] = $cmd; # log activity
		
		fwrite($this->pipes[0], $cmd."\n");
		fflush($this->pipes[0]);
		
		# file_put_contents($this -> STDOUT,"\n\n##### cmd[".$this->now."]: ".$cmd." #####\n\n", FILE_APPEND);
		
		
		$this->getStream();
		# https://official-stockfish.github.io/docs/stockfish-wiki/UCI-&-Commands.html
		# position startpos
		# position startpos moves e2e4 e7e5 g1f3
		# position fen 8/1B6/8/5p2/8/8/5Qrq/1K1R2bk w - - 0 1
		# position fen 8/3P3k/n2K3p/2p3n1/1b4N1/2p1p1P1/8/3B4 w - - 0 1 moves g4f6 h7g7 f6h5 g7g6 d1c2
			# rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1
			# rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1
			# rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2
			# rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2
		# isready
		# d 
		# eval 					# NNUE and Final
		# setoption name <id> [value <x>] 
		# setoption name UCI_LimitStrength value true 
		# setoption name UCI_Elo value 1500  # min is 1320, max is 3190 
		# setoption name Skill Level value 5 # min is 0, max is 20?
		# go depth 15 
		# go movetime 5000
		}
		
	#public evalPosition = function($fen ="rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1")
	public function evalPosition ($fen = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1")
		{
		$this->sendCommand("uci");
		$this->sendCommand("position fen ".$fen);
		$this->sendCommand("eval");
		$this->isComplete("Final evaluation");
		
		
		}
	public function findBestMove ($fen, $method = "depth 10")
		{
		$this->sendCommand("uci");
		$this->sendCommand("position fen ".$fen);
		$this->sendCommand("go ".$method);
		$this->isComplete("bestmove");
		
		} 
	
	public function parseBestMove($str)
		{		
		$data = array();
		
		return $data;
		}
	public function parseEval($str)
		{
		$data = array();
		
		return $data;
		}

	public function close()
		{
		fclose($this->pipes[0]);
		fclose($this->pipes[1]);
		fclose($this->pipes[2]);		
		
		proc_close($this->process);
		}
	
	}

?>