<?PHP
	require_once 'Color.class.php';
	
	Class Vertex {
		public static $verbose = False;
		private $_x = 0;
		private $_y = 0;
		private $_z = 0;
		private $_w = 1;
		private $_color;

		public static function doc() {
			return file_get_contents( 'Vertex.doc.txt' );
		}

		public function getX() { return $this->_x; }
		public function getY() { return $this->_y; }
		public function getZ() { return $this->_z; }
		public function getW() { return $this->_w; }
		public function getColor() { return $this->_color; }

		public function setX($number) { $this->_x = $number; return; }
		public function setY($number) { $this->_y = $number; return; }
		public function setZ($number) { $this->_z = $number; return; }
		public function setW($number) { $this->_w = $number; return; }
		public function setColor( Color $number ) { $this->_color = $number; return; }

		public function __construct( array $kwargs) {
			if (array_key_exists( 'x' , $kwargs ) )
				$this->setX( $kwargs['x'] );
			if (array_key_exists( 'y' , $kwargs ) )
				$this->setY( $kwargs['y'] );
			if (array_key_exists( 'z' , $kwargs ) )
				$this->setZ( $kwargs['z'] );
			if (array_key_exists( 'w' , $kwargs ) )
				$this->setW( $kwargs['w'] );
			if (array_key_exists( 'color' , $kwargs ) )
				$this->setColor( $kwargs['color'] );
			else
				$this->_color = new Color ( array ( 'rgb' => 0xFFFFFF ) );
			if ( self::$verbose == True)
				print($this . ' constructed' . PHP_EOL);
			return;
		}

		public function __destruct() {
			if (self::$verbose == TRUE)
				printf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed' . PHP_EOL, $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
			return;
		}

		public function __toString() {
			if (self::$verbose == TRUE)
				return (sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )', $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor()));
			else
				return (sprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )', $this->getX(), $this->getY(), $this->getZ(), $this->getW()));
		}
	}
?>
