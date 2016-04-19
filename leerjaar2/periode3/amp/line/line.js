function line() {
	this.rc = 1;
	this.offset = 0;

	this.y = function(x) {
		return this.rc * x + this.offset;
	}
}