<?PHP
	Class Vector {
		public static $verbose = False;
		private $_x = 0;
		private $_y = 0;
		private $_z = 0;
		private $_w = 0;

		public static function doc() {
			return file_get_contents( 'Vector.doc.txt' );
		}

		public function getX() { return $this->_x; }
		public function getY() { return $this->_y; }
		public function getZ() { return $this->_z; }
		public function getW() { return $this->_w; }

		public function setX($number) { $this->_x = $number; return; }
		public function setY($number) { $this->_y = $number; return; }
		public function setZ($number) { $this->_z = $number; return; }
		public function setW($number) { $this->_w = $number; return; }

		public function __construct( array $kwargs ) {
		if (array_key_exists( 'dest' , $kwargs ) )
		{
			if (!array_key_exists( 'orig' , $kwargs ) )
				$kwargs['orig'] = new Vertex( array( 'x' => 0, 'y' => 0, 'z' => 0, 'w' => 1) );
			$this->_x = $kwargs['dest']->getX() - $kwargs['orig']->getX();
			$this->_y = $kwargs['dest']->getY() - $kwargs['orig']->getY();
			$this->_z = $kwargs['dest']->getZ() - $kwargs['orig']->getZ();
		}
		if ( self::$verbose == True)
			print($this . ' constructed' . PHP_EOL);
		return;
		}

		public function __destruct() {
			if ( self::$verbose == True)
				print($this . ' destructed' . PHP_EOL);
			return;
		}

		public function __toString() {
			if ( self::$verbose == False )
			{
				$format = 'Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )';
				return sprintf($format, $this->getX(), $this->getY(), $this->getZ(), $this->getW());
			}
			$format = 'Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )';
			return sprintf($format, $this->getX(), $this->getY(), $this->getZ(), $this->getW());
		}

		public function magnitude() {
			return sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
		}

		public function normalize () {
			$newx = $this->getX() / $this->magnitude();
			$newy = $this->getY() / $this->magnitude();
			$newz = $this->getZ() / $this->magnitude();
			$newdest = new Vertex( array( 'x' => $newx, 'y' => $newy, 'z' => $newz) );
			return new Vector( array( 'dest' => $newdest) );
		}

		public function add ( Vector $rhs) {
			$newx = $this->getX() + $rhs->getX();
			$newy = $this->getY() + $rhs->getY();
			$newz = $this->getZ() + $rhs->getZ();
			$newdest = new Vertex( array( 'x' => $newx, 'y' => $newy, 'z' => $newz) );
			return new Vector( array( 'dest' => $newdest) );
		}

		public function sub ( Vector $rhs) {
			$newx = $this->getX() - $rhs->getX();
			$newy = $this->getY() - $rhs->getY();
			$newz = $this->getZ() - $rhs->getZ();
			$newdest = new Vertex( array( 'x' => $newx, 'y' => $newy, 'z' => $newz) );
			return new Vector( array( 'dest' => $newdest) );
		}
		
		public function opposite () {
			$newx = $this->getX() * -1;
			$newy = $this->getY() * -1;
			$newz = $this->getZ() * -1;
			$newdest = new Vertex( array( 'x' => $newx, 'y' => $newy, 'z' => $newz) );
			return new Vector( array( 'dest' => $newdest) );
		}

		public function scalarProduct ( $k) {
			$newx = $this->getX() * $k;
			$newy = $this->getY() * $k;
			$newz = $this->getZ() * $k;
			$newdest = new Vertex( array( 'x' => $newx, 'y' => $newy, 'z' => $newz) );
			return new Vector( array( 'dest' => $newdest) );
		}

		public function dotProduct ( Vector $rhs) {
			$newx = $this->getX() * $rhs->getX();
			$newy = $this->getY() * $rhs->getY();
			$newz = $this->getZ() * $rhs->getZ();
			$product = $newx + $newy + $newz;
			return $product;
		}

		public function cos ( Vector  $rhs) {
			$len1 = $this->magnitude(); 
			$len2 =  $rhs->magnitude();
			$dot = $this->dotProduct( $rhs);
			return $dot / ($len1 * $len2);
		}

		public function crossProduct ( Vector $rhs) {
			$newx = $this->getY() * $rhs->getZ() - $this->getZ() * $rhs->getY();
			$newy = $this->getZ() * $rhs->getX() - $this->getX() * $rhs->getZ();
			$newz = $this->getX() * $rhs->getY() - $this->getY() * $rhs->getX();
			$newdest = new Vertex( array( 'x' => $newx, 'y' => $newy, 'z' => $newz) );
			return new Vector( array( 'dest' => $newdest) );
		}
	}
?>