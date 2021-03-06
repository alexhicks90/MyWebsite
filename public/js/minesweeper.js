
// TIMER 
var timer = document.getElementById("timer");
var time = 0;
var tick = setInterval(function() {
	
	var hours = ("0" + Math.floor(time / 3600)).slice(-2);
	var minutes = ("0" + Math.floor(time / 60)).slice(-2);
	var seconds = ("0" + Math.floor(time % 60)).slice(-2);

	timer.innerHTML = hours + ":" + minutes + ":" + seconds;
	time++;
}, 1000); 
// END TIMER

//MINE COUNTER
var counter = document.getElementById("mineCount");
var mineCount = mines;
counter.innerHTML = mineCount;



var board = document.getElementById("boardContainer");
var byId = function( id ) { return document.getElementById( id ); };
// disable context menu on game board to free up R-click for flags
board.oncontextmenu = function(ev) {ev.preventDefault();};


var tilesClicked = 0;

// creates and places tiles and mines based on input
var map = function addTiles(height, width, mines) {
	var tileCount = 0; 
	
	for (var i = 0; i < height; i++) {
		newLine();

		for (var j = 0; j < width; j++) {
			tileCount++;
			placeTile(tileCount, height, width);
		}
	}
	placeMines(mines, height, width);
	placeNonMines(height, width);
}


// function to add a single tile to map
function placeTile(tileCount, height, width) {	
	var tile = document.createElement("div");
	tile.className = "tile";
	tile.id = tileCount;
	board.appendChild(tile);
	tile.onmousedown = function(ev) {
		if(mineArray.indexOf(tileCount) == -1) {
			tileClick(tileCount, height, width, ev.button);
		} else {
			mineClick(tileCount, ev.button);
		}
	}
}

function mineClick(tileCount, button) {
	var tile = byId(tileCount);

	if (button == 0 && !tile.classList.contains("flag")) {
		tile.firstChild.style.visibility = "visible";
		tile.onmousedown = new function(){return false};
		setTimeout(function() {
			gameOver(0);
		}, 700);

	} else if (button == 2) {
		tile.classList.toggle("tile");
		tile.classList.toggle("flag");

		if (tile.classList.contains("flag")) {
			mineCount--;		
		} else {
			mineCount++;
		}
		counter.innerHTML = mineCount;
		checkWin(tilesClicked);
	}
}

function tileClick(tileCount, height, width, button) {

console.log("Tilecount: " + tileCount);
var tile = byId(tileCount);

//left click - reveal tile
if (button == 0 && !tile.classList.contains("flag")) {
	var adjacentMines = 0;
	var checkTiles = [];
	
	// Populate checktiles array based on the position of the tile clicked
	// Not on perimeter
	if (tileCount <= (height * width) - width && tileCount > width && tileCount % width != 0 && tileCount % width != 1) {
		checkTiles = [tileCount -1, tileCount - parseInt(width) -1, parseInt(tileCount) + parseInt(width) -1
				, (parseInt(tileCount) + parseInt(width)), parseInt(tileCount) + parseInt(width) +1,  tileCount - parseInt(width) +1
				, tileCount - parseInt(width) , (parseInt(tileCount) + 1)];

	// bottom row, exclude corners
	} else if (tileCount > (height * width) - width && tileCount % width != 0 && tileCount % width != 1) {
		checkTiles = [tileCount -1, parseInt(tileCount) + 1
			, tileCount - width, tileCount - width -1, parseInt(tileCount) - parseInt(width) +1];
	
	// top row, exclude corners
	} else if (tileCount <= width && tileCount % width != 0 && tileCount % width != 1) {
		checkTiles = [tileCount -1, parseInt(tileCount) +1
				, parseInt(tileCount) + parseInt(width), parseInt(tileCount) + parseInt(width) -1, parseInt(tileCount) + parseInt(width) + 1];
	
	// right column, exclude corners
	} else if (tileCount % width == 0 && tileCount <= (height * width) - width && tileCount > width) {
		checkTiles = [tileCount -1, tileCount - width -1, parseInt(tileCount) + parseInt(width) -1
				, parseInt(tileCount) + parseInt(width), tileCount - width];
	
	// left column, exclude corners
	} else if (tileCount % width == 1 && tileCount <= (height * width) - width && tileCount > width) {
		checkTiles = [parseInt(tileCount) + parseInt(width), parseInt(tileCount) + parseInt(width) +1,  parseInt(tileCount) - parseInt(width) +1
				, tileCount - width , parseInt(tileCount) + 1];
	
	// bottom-left corner
	} else if (tileCount % width == 1 && tileCount > (height * width) - width) {
		checkTiles = [parseInt(tileCount) - parseInt(width) +1
				, tileCount - width , parseInt(tileCount) + 1];

	// top-left corner
	} else if (tileCount % width == 1 && tileCount <= width) {
		checkTiles = [parseInt(tileCount) + parseInt(width), parseInt(tileCount) + parseInt(width) +1, parseInt(tileCount) + 1];

	// bottom-right corner
	} else if (tileCount % width == 0 && tileCount > (height * width) - width) {
		checkTiles = [tileCount - width, tileCount - width - 1, tileCount - 1];

	// top-right corner
	} else if (tileCount % width == 0 && tileCount <= width) {
		checkTiles = [parseInt(tileCount) + parseInt(width), parseInt(tileCount) + parseInt(width) - 1, tileCount - 1];
	}

	console.log("CheckTiles: " + checkTiles);
	for (var num = 0; num < checkTiles.length; num++) {
		var t = byId(checkTiles[num]);
		//console.log(t);
		
		if(t.firstChild.classList.contains("mine")) {
			adjacentMines++;
		}		
	}

	switch (adjacentMines) {
		case 1: 
			tile.firstChild.style.color = "lightskyblue";
			break;		
		case 2: 
			tile.firstChild.style.color = "lightgreen";
			break;
		case 3: 
			tile.firstChild.style.color = "red";
			break;
		case 4: 
			tile.firstChild.style.color = "mediumpurple";
			break;	
		case 5: 
			tile.firstChild.style.color = "sandybrown";
			break;	
		case 6: 
			tile.firstChild.style.color = "turquoise";
			break;
		case 7: 
			tile.firstChild.style.color = "black";
			break;
		case 8: 
			tile.firstChild.style.color = "gray";
			break;	
		default: 
			break;
	}

	if (adjacentMines != 0) {
		tile.firstChild.textContent = adjacentMines;
	}

	tile.firstChild.style.visibility = "visible";
	tilesClicked++;
	checkWin(tilesClicked);

	// Recursive Tileclicks for all adjacent tiles with 0 adjacent mines
	if (adjacentMines == 0) {
		//console.log("Adjacent mines are 0 on tile " + tile.id);
		for (var i = 0; i < checkTiles.length; i++) {
			var t = byId(checkTiles[i]);
			
			if(t.firstChild.style.visibility != "visible") {
				tileClick(t.id, height, width, button);
				//console.log("recursive tileclick");
			}
		}
	}

// right click - place flag
} else if (button == 2) {

	if (tile.firstChild.style.visibility != "hidden") {

		tile.classList.toggle("tile");
		tile.classList.toggle("flag");

		if (tile.classList.contains("flag")) {
			mineCount--;		
		} else {
			mineCount++;
		}
		counter.innerHTML = mineCount;
	}	
}

}

var mineArray = [];

// Generates an array of random numbers from 1 to the number of tiles on the board 
// Adds a "mine" to each tile with a matching id to numbers in the array
function placeMines(mines, height, width) {	

	for (var n = 0; n < mines; n++) {
		var tileNum = Math.floor(Math.random() * (height * width)) + 1;

		if(mineArray.indexOf(tileNum) == -1) {
			mineArray[n] = tileNum;
			var tile = byId(tileNum);
			var mine = document.createElement("div");
			mine.className = "mine";
			mine.textContent = "*";
			tile.appendChild(mine);
		} else {
			n--;
		}
	}
	console.log(mineArray);
}

function placeNonMines(height, width) {
	var tileCount = 0;

	for (var i = 0; i < height; i++) {

		for (var j = 0; j < width; j++) {	
			tileCount++;

			if(mineArray.indexOf(tileCount) == -1) {		
				var tile = byId(tileCount);
				var n = document.createElement("div");
				n.className = "clean";
				//console.log("Appending child: " + tileCount + "   height, width: " + height + ", " + width);
				tile.appendChild(n);
			}
		}
	}
}

// Checks if win conditions are satisfied - displays win screen if they are
function checkWin(tilesClicked) {
	var nonMines = document.getElementsByClassName("clean");

	if(tilesClicked == nonMines.length && mineCount == 0) {
		//console.log("win");
		setTimeout(function() {
			gameOver(1);
		}, 700);
	}
}

function gameOver(status) {

	clearInterval(tick);
	if(status == 0) {
		board.classList.add("lose");
		board.innerHTML = "<div id='lose'><h2>Game Over!</h2><button id='playAgain'></button></div>";
	
	} else if (status == 1) {
		board.classList.add("win");
		board.innerHTML = "<div id='win'><h2>You Won!</h2><button id='playAgain'></button></div>";

		// POST 'time' and 'difficulty' to Laravel Score form	
		var finishTime = parseInt(time) - 1;
		//if (difficulty != 'custom') {
			var form = document.createElement("form");
			form.setAttribute("method", "post");
			form.setAttribute("action", "/minesweeper/scores/form");
			form.innerHTML = 
			"<input id='time' name='time' type='hidden'>" +
			"<input id='difficulty' name='difficulty' type='hidden'>" +
			//"<input type='hidden' name='_csrf' value='$('meta[name=csrf-token]').attr('content')'>"
			"<button class='btn btn-primary' id='scoreSubmit' type='submit'>Submit Score</button>";
			board.appendChild(form);
			document.getElementById("time").value = finishTime;
			document.getElementById("difficulty").value = difficulty;


	}

	var playAgain = document.getElementById("playAgain");
	playAgain.textContent = "Click to Play Again";
	playAgain.onclick = function() {
		location.reload();
	}
}

// newline function
function newLine() {
	var br = document.createElement("br");
	board.appendChild(br);
}


function main() {

	var title = document.createElement("h2");
	var node = document.createTextNode("Alex's Pure Javascript Minesweeper");
	title.appendChild(node);
	//board.appendChild(title);

	// placeholder values for intermediate. Will add extra difficulty options.
	map(parseInt(height),parseInt(width),parseInt(mines));
}

window.onload = main;