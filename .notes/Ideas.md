# ideas for chess-mates

(1) The purpose is the allow me and Alex to play together, like mates (friends).  Generally, the relationship will be teacher-student or mentor relationship, but the goal is to allow for two-player interaction in a game-mode framework with lessons, puzzles, and games (with potential computer support [currently with .js engines but eventually allow external heavy-hitter engines].  Such hints/recommendations are essential for the young player to grow their chess thinking outside of traditional human theory to start and understand the deeper nuances of position (\citep{Hikaru}).

(2) The goal is to make this web app in a minimalist form.  Static webpages with api.php calls that manages the user login / session so possibily REST APIs can be created in a pseudo-stateless sense.  The data structures will use file inodes and conf.ini (php) type systems.

FONTS:  I believe I prefer the Merida font for the pieces, but these can be selected in a cascading way.

GLOBAL.INI, first time user has to create user account [mshaffer] with default Avatar [Daddy] using sjcl nested md5 loops on a password that is never stored.  Two numbers, day of birth [22 or 23] and another number like a pin [2629] will be appended to internal global numbers [e.g., 9 and 999] in a certain way: addition, multiplication, or some special string append manner.

- GLOBAL
-- USER [mshaffer]
=== MATE [alex] 
==== SESSION (daily, weekly, or one interminable ongoing session)

GUEST ACCESS is a thing, it just autopopulates these other codes with random numbers [22 and 2629] and spits them out to the user so they can return and have sessions.  You can have a session with zero or more mates, with one being the default.  Zero mates maybe with mate = self? for the cascading tree to work.

[mshaffer] will have config options that customize some global options (board view and other game options).  It is possible that each avatar has its own options [mshaffer-Daddy] may be a different setup that [mshaffer-self] based on the needs.

FONTS are here: https://www.enpassant.dk/chess/fonteng.htm
* make a repository of various formats (ttf, woff) to make HTML5 compliant with cross-browser issues [IE9 and Safari]
* Allow Global, USER, SESSION, specific board options.  If [mshaffer] plays [alex] both players may see the board in the CSS and font they desire.

JS ENGINES: lozza, garbochess, js-stockfish

https://github.com/op12no2/lozza 
https://op12no2.github.io/lozza-ui/ (jquery, chessboard, chess, lib, lozza.js) ... 9 levels , 1 is easy, 9 is hard ... 10th level is called beth

https://github.com/glinscott/Garbochess-JS (jquery-ui, boardui)



The nature of the API will have some lag, so this is not designed for tournament-level SPEED CHESS.  But increment games should be allowed.

chessboard-element seems to use jquery-ui which is nice to implement the gameplay.  There also seems to be a link to a pretty stable chess.js library.

https://justinfagnani.github.io/chessboard-element/examples/5003-highlight-legal-moves/ (own things)... 

// NOTE: this example uses the chess.js library:
// https://github.com/jhlywa/chess.js

A TypeScript chess library for chess move generation/validation, piece placement/movement, and check/checkmate/draw detection

ONE FRAMEWORK TO RULE THEM ALL. Is this it?
https://github.com/jhlywa/chess.js
https://chessboardjs.com/

justinfagnani has jquery support?  Anyway, this is some of the minutia to build a nice chess-mates platform.

# key point

This is an open-paradigm resource, there is NO CHEATING.  At any stage a user can plugin a computer and see the best moves (even PvP).  The goal is for young players to learn more than archaic theory given them more data inputs to discover deeper strategies that learned by the great minds such as Hikaru Nakamura.  When he reviews a game and says "computer nonsense" he is articulating how his genius was developed.  The next generation of chess players will grow up with the engines.

As such, training-mode is the standard for this system.  Lessons and minigames will help all players, starting with Level 0.

4 pawns vs one Queen, white to play
pawn promotion game ... 8 pawns vs 8 pawns, first to Queen and kill other pawns wins.
checkmate with random position of two kings and one rook.
checkmate with random position of two kings and one knight/bishop pair for one side.
checkmate with random position of two kings and two knights for one player, one/two pawns for other player

Daily puzzles are a thing, but minigames are very important.  It needs to feel fun.

