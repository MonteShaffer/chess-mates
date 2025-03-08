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

This seems to be the primary framework.  chessboardjs only has one CSS file without any variances on screen sizes.  Disappointing.  border: 2px on all screen sizes?

Should I implement jquery-ui THEMES to roll up a nice CSS framework?

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

# From 3/5/2025

computer hints (partial, this peice, full).  Allow levels of hints 1-9,beth of lozza.

decompose elements into fundamental blocks or units.

/php/session.php
/php/admin/globals.php
/php/system/nonce.php login.php signup.php nonce.php pre-authenticate(hash/key pre-include for AJAX calls).php
/php/game/mates.php (matching) play.php?a=is_my_turn or play_turn  training-session.php (lesson, not to be confused with system session.php) lesson.php puzzle.php 

Separate page logic from user-data logic.  Use compile myPage of templates to build static pages (page-logic templating system).  AJAX will maintain session/state and deliver RESTFUL like APIs, but the state maintainenance is preserved at the page level (using session.php)

maybe throw in other games ... minigames such as pawn rush (that may not have a king?)  also mysumgame 12x12 printables ... wizard.mypatentideas.com should have sjcl library and login without password storage === don't get bogged down in minutia and features, focus on main capabilities.

develop for a 800x600 playing area with 500x500 for the board with room above/below for user info (clock, eval, piece eval, name/avatar) ... bottom corner (maybe left) have a mouseover event display the board position a6 and is blank if not moused over the board.  map ONMOUSEDOWN to ONTOUCHDOWN etc so the behaviors will work on phone.  right area (portrait mode) will have moves etc.

PGN => JSON => CHSON.  We need longer notation so in game review with forward/backward arrows we can just move.

USE: show arrows.  Move p:e2-e4 or Move p:e4x[p]d5 ... that is, action as "move", what is "pawn" [p], from where [-] as to [x] as to with capture where and what.  Now think about rewind.  With the information, I can rebuild the board and show the moves and restore the correct piece.  
USE: update board to allow eval engine and review.  The short board notation can be stored for each half-move, so that one can click and have the pieces fly around the board to their appropriate position.
USE: game details using 3NF and relational data understanding.  The goal is to capture all sufficient statistics yet easily degrade into the PGN format.  Chess notation verbose (cvn).  I believe CHSON (Chess JSON) is a better structure.

Game info: opponent [user] and avatar ... 
Game setup: color chosen random, round robin, rotating match, whatever.
[userX] is white, [userY] is black
Puzzle mode: "black"/"white" to play (whose turn is it when I don't have the game history)
Mode: "puzzle", "lesson", "game"
Game: [array] = {before: comments, eval, notes, time, board-position-notation, diagram options}, {white: p:e2-e4}, {after: comments, eval, notes, time, board-position-notation, diagram options}, {black: p:d7-d5}, {eval-last, notes, time, board-position-notation, diagram options}
	[array+1] = {white: p:e4x[p]d5}, ...
	
	[1] = white:  	{before: info}
					{move: info}
					{after: info}
	[1] = black:  	{before: info}
					{move: info}
					{after: info}
					
	maybe notes has "considers" certain moves in the logs... fast and responsive but allow for deep dives... how did Kasparov annotate games in his private study?  Hikaru?
	
	
	
[array] is linear and represents the move count.  Certainly short notation can evolve from this long notation, but why?  The purpose of the short notation was pre-computer and used as a compression algorithm.  A good chess player is converting that to a meaningful event which is fully articulated in the long notation.  Ergo, QED.

# 3/8/2025
https://talkchess.com/viewtopic.php?t=78626
There has been talk of Chess JSON as JGN with a discussion of additional optional fields.  Same basic idea.

For Fisher Random (960), initial board would be under info of game.  By default, we assume the class board position for initialization.

Setup XAMP locally to allow the beginning of the build.

welcome.html (landing) ... (is the system setup, if not wizard) ... is the user setup, then login else signup.  Allow Guest is a system option ...

home.html is a simple tabular system.  Friends or Chess Mates is primary tab and has datables pulling data from inodes.  Other tabs may be Account and Setttings and ???

When I click on a "friend" (with SELF being the default, I can see an expansion of sessions that is a nested subtable using datatables (so I can sort/search/filter) - again an inode pull default sort by date).

The friend making and play a friend may need some external storage in the INODES in case the friend doesn't have an account yet, like a TRANSACTION/ROLLBACK in SQL.

A friend session will open in a new window/tab with the session name:  [mshaffer-alex_2025-03-08_12:22:03.123] which would be the folder name.  That folder would have an info.json file that says things like [mshaffer: Daddy, alex: Alexander, Session Name Daddy Invites Alex]

/games/ would have traditional games 
/minigames/
/lessons/
/puzzles/

? do we redundantly store puzzeles at the global level or key at global so they are aliases locally.

It seems that storing globally makes sense 

/mshaffer/games/ ... organized by session 
/mshaffer/puzzles... organized by session 

Chessbase has two formats for PGN: CBH and CBF 

FEN (Forsyth-Edwards-Notation) string.

rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1

board , whose move, castling options, is half move, move number 
upper is BLACK, lower is white 

{white: p:e4x[p]d5} => {white: p:e4x[P]d5}
	
castling options requires chess.js validation - is this simple to implement?

