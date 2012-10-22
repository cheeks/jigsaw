/*! puzzle_builder class
 * Put javascript plugin depedencies below (see main.js for an exmaple)
 * 
 */
var cool = cool || {};
cool.puzzle_builder = function(){
	// =================================================
	// = Private variables (example: var _foo = bar; ) =
	// =================================================

	var _thangs = [],
		stuff,
		_rows = 0,
		_cols = 0,
		_totalPieces = 0;
	
	
	// =================================================
	// = public functions                              =
	// =================================================
	var self = {
		
		init : function(){

			debug.group("# [puzzle_builder.js]");
			
			debug.log('- initialized'); 
			
			//--> sof private functions
				self.setupPuzzle();
			//--> eof private functions

			debug.groupEnd();

		},

		setupPuzzle: function() {
			for (var i=1; i<=25; i++) {
				stuff = new Element("Bitmap", {
					src:    'media/images/puzzles/' + i + '.jpg',
					drag:   drag_handler,
					x:      Math.floor(Math.random()*700),
					y:      Math.floor(Math.random()*500)
				});
				_thangs.push(stuff);
			}
			_setupGrid(5, 5);
		}

		
	};
	
	return self;
	
	// ================================================
	// = Private functionse (function _private() {} ) =
	// ================================================


	_thangs[0].collides(_thangs[1], function() {
		console.log('0 collided into 1');
	});

	function drag_handler (p_evt) {
		if (p_evt.eventType === "onFinished") {
			_setupSnaps(20);
		}	
		if (p_evt.eventType == "onStart") {
		}
	}

	function _setupSnaps(setSensitivity) {
		_sensitivity = setSensitivity;
		// snaps for x
		for (var i=0; i<_totalPieces-1; i++) {
			if (i % 5 != 4) {
				_checkForFitsX(_thangs[i], _thangs[i+1]);
			}
		}
		// snaps for y
		for (var i=0; i<_totalPieces; i++) {
			if (i < (_totalPieces - _cols)) {
				_checkForFitsY(_thangs[i], _thangs[i+_rows]);
			}
		}
	}


	function _checkForFitsX(a, b) {
		var fitX = b.x() > a.x() + a.width() - _sensitivity && 
		           b.x() < a.x() + a.width() + _sensitivity && 
		           b.y() < a.y() + _sensitivity && 
		           b.y() > a.y() - _sensitivity;

		if (fitX) _snapTo(a, b, 'x');
	}

	function _checkForFitsY(a, b) {
		var fitY = b.y() > a.y() + a.height() - _sensitivity && 
		           b.y() < a.y() + a.height() + _sensitivity && 
		           b.x() < a.x() + _sensitivity && 
		           b.x() > a.x() - _sensitivity;

		if (fitY) _snapTo(a, b, 'y');
	}
	
	function _snapTo(a, b, orientation) {
		if (orientation == 'x') {
			b.x(a.x() + a.width());
			b.y(a.y());	
		} else if (orientation == 'y') {
			b.x(a.x());
			b.y(a.y() + a.height());
		}
	}

	function _setupGrid(cols, rows) {
		_cols = cols;
		_rows = rows;
		_totalPieces = _cols * _rows;
	}

}();
cool.main.queue(cool.puzzle_builder.init);


