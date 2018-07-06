var Comments = {
	pseudoElt: null,
	contentElt: null,
	submitElt: null,

	init() {
		this.pseudoElt = document.getElementById('pseudo');
		this.contentElt = document.getElementById('comment');
		this.submitElt = document.getElementById('submit');
		if (this.submitElt !== null) {
			this.submitElt.addEventListener('submit', function(e) {
				
			});
		}
	},

	activeLink() {
		console.log(this.pseudoElt);
		console.log(this.contentElt);
		console.log(this.submitElt);
	}
};

Comments.init();
Comments.activeLink();