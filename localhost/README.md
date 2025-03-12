# chess-mates localhost

A user can install stockfish to their local computer.  Using XAMPP, we will create a simple RESTFUL API 

http://localhost/stockfish.php?a=best-move&depth=1,5,10&position=...

https://stockfishchess.org/download/

rename long file to stockfish.exe and place at your pleasure, such as c:\stockfish\stockfish.exe

run SHELL (CMD, GIT BASH, POWERSHELL)

stockfish.exe
uci
position startpos
// https://official-stockfish.github.io/docs/stockfish-wiki/UCI-&-Commands.html
go depth 1
...
bestmove e2e4

go depth 5
...
bestmove e2e4

go depth 10
...
bestmove e2e4 ponder e7e5

// cp is centipawns ... divide by 100 gives an evaluation score.  Different depths have different evaluations.

// position startpos moves e2e4 e7e5 g1f3

// mathematically depth 10 contains depth 5 response ...
cp = 35

go movetime 1000 # search for 1 second and stop, a function of the machine's computing power, laptop = depth 18

d # displays the current board ... 

position fen rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNRKBNR1 w KQkq - 0 1


## error handling
If xampp not installed, if Apache server not running.

## skill level and ELO_limit in UCI options.