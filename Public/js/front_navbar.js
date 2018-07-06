var Navbar = {
	url: location.href,
	linkElts: null,
	homeElt: null,
	billListElt: null,
	indexRegex: /index\.php/,
	actionRegex: /\?action=/,
	billListRegex: /billList(&page=(\d){1,}){0,1}$/,

	init() {
		this.linkElts = document.getElementsByClassName('navbar-link');
		this.homeElt = document.getElementById('accueil');
		this.billListElt = document.getElementById('billList');
	},

	activeLink() {
		if (this.indexRegex.test(this.url)) {
			if (this.actionRegex.test(this.url)) {
				if (this.billListRegex.test(this.url)) {
					this.billListElt.setAttribute("class", "active");
				}
			} else {
				this.homeElt.setAttribute("class", "active");
			}
		} else {
			if (!this.actionRegex.test(this.url)) {
				this.homeElt.setAttribute("class", "active");
			}
		}
	}
};

Navbar.init();
Navbar.activeLink();