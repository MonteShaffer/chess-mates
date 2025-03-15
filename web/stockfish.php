<?PHP
echo"<PRE>";
include("class.stockfish.php");
$stockfish = new stockfish();

$stockfish->evalPosition();
# sleep(5);
# $stockfish->now = microtime(true);


$stockfish->close();

print_r($stockfish);

echo"</PRE>";exit;

?>