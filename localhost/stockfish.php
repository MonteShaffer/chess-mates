<?PHP
echo"<PRE>";
# https://stackoverflow.com/questions/31817146/running-stockfish-chess-engine-under-php-script
// ok, define the pipes
$descr = array(

    0 => array("pipe", "r"),
    1 => array("pipe", "w"),
    2 => array("pipe", "w")
);

$pipes = array();

// open the process with those pipes
$process = proc_open("C:\stockfish\stockfish.exe", $descr, $pipes);

// check if it's running
if (is_resource($process)) {

    // send first universal chess interface command
    fwrite($pipes[0], "uci\n");
	// send position
    #fwrite($pipes[0], "position startpos\n");
	fwrite($pipes[0], "position startpos moves e2e4 e7e5 g1f3\n");
	// isready?
    fwrite($pipes[0], "isready\n");
	fwrite($pipes[0], "d\n");
	// send analysis (depth 10) command
    fwrite($pipes[0], "go depth 15\n");
	fwrite($pipes[0], "isready\n");
    #// send analysis (5 seconds) command
    #fwrite($pipes[0], "go movetime 5000");
sleep(2);  # make this a function of the contents containing "bestmove"???
    // close read pipe or STDOUTPUT can't be read
    fclose($pipes[0]);
	
function getContentsFromPipe($pipe)
	{
	$str = "";
    // read and print all output comes from the pipe
    while (!feof($pipe)) 
		{
		$str .= fgets($pipe)."\n";
		}
	return $str;
	}

$out = getContentsFromPipe($pipes[1]);
print_r($out);

echo"MONTE\n\n";
$out = "";
    // read and print all output comes from the pipe
    while (!feof($pipes[1])) {
		$out .= fgets($pipes[1])."\n";
        #echo fgets($pipes[1]);

    }

    // close the last opened pipe
    fclose($pipes[1]);

    // at the end, close the process
    proc_close($process);

echo"<PRE>";print_r($out);exit;
}

?>