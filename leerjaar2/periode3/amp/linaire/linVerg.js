function linVerg() {
	helling:0;
	offset:0;
	this.y = function(x) {
		return this.rc * x + this.offset;
	}
}